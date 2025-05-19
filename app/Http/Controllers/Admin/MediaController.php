<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Media;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;

class MediaController extends Controller
{

    protected $sizes;

    public function __construct()
    {
        $this->sizes  = image_sizes();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::latest()->get();
        return view('admin.media.index', compact('medias'));
    }

    public function mediapopup()
    {
        $medias = Media::latest()->get();
        return view('admin.media.popup', compact('medias'));
    }

    public function medialist()
    {
        $medias = Media::latest()->get();
        return view('admin.media.list', compact('medias'));
    }

    public function gallerymedialist($id)
    {
        $id = explode(',', $id);
        return view('admin.media.gallery.gallerylist', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($image = $request->file('file')) {
            $nameWithExtension = $image->getClientOriginalName();
            $names = pathinfo($nameWithExtension, PATHINFO_FILENAME);
            $originalExtension = strtolower($image->getClientOriginalExtension());

            // Ensure unique name
            $name = Media::where('name', $names)->exists() ? $names . '-' . date('YmdHis') : $names;
            $slugify = make_slug($name);
            $storagePath = public_path('storage/');

            // Convert PNG, JPG, JPEG to WebP
            if (in_array($originalExtension, ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'])) {
                $convertedFileName = $slugify . '.webp';
                $imageInstance = Image::read($image->getRealPath())->encode(new WebpEncoder()); // Use WebpEncoder
                $imageInstance->save($storagePath . $convertedFileName);
                $extension = 'webp';
            } else {
                // Keep original format for other files
                $convertedFileName = $slugify . '.' . $originalExtension;
                $image->move($storagePath, $convertedFileName);
                $extension = $originalExtension;
            }

            // Get image dimensions
            $imagePath = $storagePath . $convertedFileName;
            if (in_array($extension, ['webp', 'png', 'jpg', 'jpeg', 'heic'])) {
                list($width, $height) = getimagesize($imagePath);
            }

            $fileSize = filesize($imagePath) / 1024; // Convert bytes to KB

            // Image Resizing
            if (in_array($extension, ['webp', 'png', 'jpg', 'jpeg', 'heic']) && $this->sizes) {
                foreach ($this->sizes as $resize) {
                    if ($resize['width'] && $resize['height'] && $resize['width'] < $width && $resize['height'] < $height) {
                        $resizedImage = Image::read($imagePath)->cover((int)$resize['width'], (int)$resize['height']);
                        $resizedFilename = make_slug($name . '-' . $resize['width'] . 'x' . $resize['height']) . '.' . $extension;
                        $resizedImage->save($storagePath . $resizedFilename);
                    }
                }
            }

            // Save in database
            Media::create([
                'name' => $name,
                'url' => $slugify,
                'extention' => $extension,
                'fullurl' => '/storage/' . $convertedFileName,
                'alt' => $name,
                'width' => $width ?? '',
                'height' => $height ?? '',
                'size' => (int)$fileSize . 'KB',
                'date' => now(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Media $media)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Media $media)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium)
    {
        $medium->update($request->all());
        return redirect()->route('media.index')->with('message', 'Update Successfully');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Media $media)
    // {
    //     //
    // }

    public function mediadestroy($image_id)
    {
        $media = Media::findOrFail($image_id);
        removeFile($media->fullurl);

        if ($this->sizes) {
            foreach ($this->sizes as $resize) {
                if ($resize['width'] && $resize['height']) {
                    removeFile('/storage/' . $media->url . '-' . $resize['width'] . 'x' . $resize['height'] . '.' . $media->extention);
                }
            }
        }

        $media->delete();
    }
}
