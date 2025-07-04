<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo p-0">
        <a class="app-brand-link mx-auto my-0" href="{{ route('home') }}" target="_blank">
            @if (get_field('site_main_logo'))
                <div style="width: 150px;">
                    {!! get_image(get_field('site_main_logo')) !!}
                </div>
            @else
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Visa Abroad</span>
            @endif
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'media') {{ 'active open' }} @endif">
            <a class="menu-link {{ Request::segment(2) == 'media' ? 'active' : '' }}" href="{{ route('media.index') }}">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Accordion">Media</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'menus') {{ 'active open' }} @endif">
            <a class="menu-link {{ Request::segment(2) == 'menus' ? 'active' : '' }}"
                href="{{ route('admin.menu.index') }}">
                <i class="menu-icon tf-icons bx bx-menu-alt-right"></i>
                <div data-i18n="Accordion">Menu</div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'contacts' || Request::segment(2) == 'application') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="General Setting">Form</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Request::segment(2) == 'contacts') {{ 'active open' }} @endif">
                    <a class="menu-link {{ Request::segment(2) == 'contacts' ? 'active' : '' }}"
                        href="{{ route('contacts.index') }}">
                        <i class="menu-icon tf-icons bx bxs-contact"></i>
                        <div data-i18n="Accordion">Inquiries</div>
                    </a>
                </li>
                <li class="menu-item @if (Request::segment(2) == 'application') {{ 'active open' }} @endif">
                    <a class="menu-link {{ Request::segment(2) == 'application' ? 'active' : '' }}"
                        href="{{ route('application.index') }}">
                        <i class="menu-icon tf-icons bx bxs-contact"></i>
                        <div data-i18n="Accordion">Applications</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li class="menu-item @if (Request::segment(2) == 'blog' || Request::segment(2) == 'blogcategory') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="General Setting">Posts</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('blog.index') }}">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div data-i18n="Accordion">All Posts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('blog.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Post</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'page') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="General Setting">Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('page.index') }}">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Accordion">All Pages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('page.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Page</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'review') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                <div data-i18n="General Setting">Reviews</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'review' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('review.index') }}">
                        <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                        <div data-i18n="Accordion">All Reviews</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'review' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('review.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Review</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'members') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="General Setting">Teams</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('members.index') }}">
                        <i class="menu-icon tf-icons bx bx-user-pin"></i>
                        <div data-i18n="Accordion">All Teams</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('members.create') }}">
                        <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                        <div data-i18n="Accordion">Create Team</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'services') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div data-i18n="General Setting">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'services' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('services.index') }}">
                        <i class="menu-icon tf-icons bx bx-analyse"></i>
                        <div data-i18n="Accordion">All Services</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'services' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('services.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Service</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'country') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-globe"></i>
                <div data-i18n="General Setting">Country</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'country' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('country.index') }}">
                        <i class="menu-icon tf-icons bx bx-globe"></i>
                        <div data-i18n="Accordion">All Country</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'country' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('country.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Country</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'faq') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="General Setting">Faqs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'faq' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('faq.index') }}">
                        <i class="menu-icon tf-icons bx bx-question-mark"></i>
                        <div data-i18n="Accordion">All Faqs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'faq' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('faq.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Faq</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'setting' ||
                Request::segment(2) == 'social' ||
                Request::segment(2) == 'counters' ||
                Request::segment(2) == 'popup' ||
                Request::segment(2) == 'branch' ||
                Request::segment(2) == 'technology' ||
                Request::segment(2) == 'progress') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Global Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'setting' ? 'active' : '' }}"
                        href="{{ route('admin.setting.index') }}">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Accordion">Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'social' ? 'active' : '' }}"
                        href="{{ route('social.index') }}">
                        <i class="menu-icon tf-icons bx bx-images"></i>
                        <div data-i18n="Accordion">Social Icons</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'branch' ? 'active' : '' }}"
                        href="{{ route('branch.index') }}">
                        <i class="menu-icon tf-icons bx bx-building-house"></i>
                        <div data-i18n="Accordion">Branch</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'progress' ? 'active' : '' }}"
                        href="{{ route('progress.index') }}">
                        <i class="menu-icon tf-icons bx bx-recycle"></i>
                        <div data-i18n="Accordion">Progress</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'counters' ? 'active' : '' }}"
                        href="{{ route('counters.index') }}">
                        <i class="menu-icon tf-icons bx bx-polygon"></i>
                        <div data-i18n="Accordion">Counters</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'popup' ? 'active' : '' }}"
                        href="{{ route('popup.index') }}">
                        <i class="menu-icon tf-icons bx bx-conversation"></i>
                        <div data-i18n="Accordion">Popups</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
