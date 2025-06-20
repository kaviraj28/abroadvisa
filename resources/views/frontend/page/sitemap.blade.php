<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd"
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>2025-03-01T13:35:41+00:00</lastmod>
        @if ($setting['homepage_image'])
            <image:image>
                <image:loc>{{ asset(get_media_url($setting['homepage_image'])) }}
                </image:loc>
            </image:image>
        @endif
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($all_pages as $page)
        <url>
            <loc>{{ route('pagesingle', $page->slug) }}</loc>
            <lastmod>{{ $page->created_at->tz('UTC')->toAtomString() }}</lastmod>
            @if ($page->image)
                <image:image>
                    <image:loc>{{ asset(get_media_url($page->image)) }}</image:loc>
                </image:image>
            @endif
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($all_servs as $category)
        <url>
            <loc>{{ route('servicesingle', $category->slug) }}</loc>
            <lastmod>{{ $category->created_at->tz('UTC')->toAtomString() }}</lastmod>
            @if ($category->image)
                <image:image>
                    <image:loc>{{ asset(get_media_url($category->image)) }}</image:loc>
                </image:image>
            @endif
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($all_blogs as $blog)
        <url>
            <loc>{{ route('blogsingle', $blog->slug) }}</loc>
            <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
            @if ($blog->image)
                <image:image>
                    <image:loc>{{ asset(get_media_url($blog->image)) }}</image:loc>
                </image:image>
            @endif
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($all_blog_cats as $blog)
        <url>
            <loc>{{ route('categorysingle', $blog->slug) }}</loc>
            <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
            @if ($blog->image)
                <image:image>
                    <image:loc>{{ asset(get_media_url($blog->image)) }}</image:loc>
                </image:image>
            @endif
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($all_countrys as $blog)
        <url>
            <loc>{{ route('countrysingle', $blog->slug) }}</loc>
            <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
            @if ($blog->image)
                <image:image>
                    <image:loc>{{ asset(get_media_url($blog->image)) }}</image:loc>
                </image:image>
            @endif
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
