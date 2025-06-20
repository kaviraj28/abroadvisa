<?php

use App\Models\Menu;
use App\Models\Media;
use App\Models\MenuLocation;
use App\Models\Setting;
use Illuminate\Support\Str;

function menuData($id)
{
    $nav = MenuLocation::where('location', $id)->first();
    if ($nav) {
        $sitemenu = json_decode($nav->content);
        $sitemenu = $sitemenu[0];
        foreach ($sitemenu as $menu) {
            $menu->title = Menu::where('id', $menu->id)->value('title');
            $menu->name = Menu::where('id', $menu->id)->value('name');
            $menu->slug = Menu::where('id', $menu->id)->value('slug');
            $menu->target = Menu::where('id', $menu->id)->value('target');
            $menu->type = Menu::where('id', $menu->id)->value('type');
            if (!empty($menu->children[0])) {
                foreach ($menu->children[0] as $child) {
                    $child->title = Menu::where('id', $child->id)->value('title');
                    $child->name = Menu::where('id', $child->id)->value('name');
                    $child->slug = Menu::where('id', $child->id)->value('slug');
                    $child->target = Menu::where('id', $child->id)->value('target');
                    $child->type = Menu::where('id', $child->id)->value('type');

                    if (!empty($child->children[0])) {
                        foreach ($child->children[0] as $subchild) {
                            $subchild->title = Menu::where('id', $subchild->id)->value('title');
                            $subchild->name = Menu::where('id', $subchild->id)->value('name');
                            $subchild->slug = Menu::where('id', $subchild->id)->value('slug');
                            $subchild->target = Menu::where('id', $subchild->id)->value('target');
                            $subchild->type = Menu::where('id', $subchild->id)->value('type');

                            if (!empty($subchild->children[0])) {
                                foreach ($subchild->children[0] as $newchild) {
                                    $newchild->title = Menu::where('id', $newchild->id)->value('title');
                                    $newchild->name = Menu::where('id', $newchild->id)->value('name');
                                    $newchild->slug = Menu::where('id', $newchild->id)->value('slug');
                                    $newchild->target = Menu::where('id', $newchild->id)->value('target');
                                    $newchild->type = Menu::where('id', $newchild->id)->value('type');
                                }
                            }
                        }
                    }
                }
            }
        }

        return $sitemenu;
    }
}

include 'menu.php';

if (!function_exists('get_field')) {
    function get_field($key = null)
    {
        if ($key == null) {
            return null;
        }

        $settings = Setting::pluck('value', 'key')->toArray();
        if ($settings == []) {
            return null;
        }

        if (array_key_exists($key, $settings)) {
            return $settings[$key];
        } else {
            return null;
        }
    }
}

if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        return Str::slug($string);
    }
}

if (!function_exists('galleryfileUpload')) {
    function galleryfileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalName();
            $image->move(public_path('storage/' . $foldername . '/'), $image_new_name);

            $image = '/storage/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}

if (!function_exists('removeFile')) {
    function removeFile($file)
    {
        if (File::exists(public_path($file))) {
            File::delete(public_path($file));
        }
    }
}

if (!function_exists('stripLetters')) {
    function stripLetters($text, $number, $last = "")
    {
        if (!empty($text)) {
            if (strlen($text) < $number) {
                return strip_tags(html_entity_decode($text));
            } else {
                return substr(strip_tags(html_entity_decode($text)), 0, $number) . $last;
            }
        }
    }
}

if (!function_exists('image_sizes')) {
    function image_sizes()
    {
        $size = [
            'srvproject' => ['width' => 570, 'height' => 420],
            'banner' => ['width' => 550, 'height' => 490],
            'project' => ['width' => 478, 'height' => 576],
            'blog' => ['width' => 279, 'height' => 174],
            'review' => ['width' => 160, 'height' => 160],
            'process' => ['width' => 75, 'height' => 75],
        ];
        return  $size;
    }
}
if (!function_exists('get_image_size')) {
    function get_image_size($size)
    {
        if ($size) {
            $sizes  = image_sizes();
            if (array_key_exists($size, $sizes)) {
                return '-' . $sizes[$size]['width'] . 'x' . $sizes[$size]['height'];
            } else {
                return null;
            }
        }
    }
}
if (!function_exists('get_image')) {
    function get_image($id, $class = "", $size = "")
    {
        if ($id == null) {
            return null;
        }
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . ' loading="lazy">';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . ' loading="lazy">';
            }
        }
    }
}



if (!function_exists('get_banner')) {
    function get_banner($id, $class = "", $size = "")
    {
        if ($id == null) {
            return null;
        }
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . ' loading="lazy">';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . ' loading="lazy">';
            }
        } else {
            return '<img src="' . asset('frontend/assets/images/banner.jpg') . '" alt="Visa Abroad" loading="lazy">';
        }
    }
}


if (!function_exists('get_media')) {
    function get_media($id)
    {
        if ($id) {
            return Media::where('id', $id)->first();
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_media_url')) {
    function get_media_url($id, $fb = '')
    {
        if ($id) {
            $media = Media::where('id', $id)->first();
            return $media ? $media->fullurl : Null;
        } else {
            return $fb ? $fb : Null;
        }
    }
}

if (!function_exists('get_gallery')) {
    function get_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = get_media($new);
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}



if (!function_exists('get_show_gallery')) {
    function get_show_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = $new;
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}



if (!function_exists('get_the_date')) {
    function get_the_date($data, $format = 'd M, Y')
    {
        if ($data) {
            return date($format, strtotime($data));
        }
    }
}


if (!function_exists('fileUpload')) {
    function fileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/' . $foldername . '/'), $image_new_name);

            $image = '/storage/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}
