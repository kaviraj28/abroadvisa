<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-2.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <div class="title centred">
                <h1>{{ $name ?? '' }}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                @if ($parentname && $parentlink)
                    <li>
                        <a href="{{ $parentlink ?? '' }}">{{ $parentname ?? '' }}</a>
                    </li>
                @endif
                <li>{{ $name ?? '' }}</li>
            </ul>
        </div>
    </div>
</section>
