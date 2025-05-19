@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.global.seo', [
        'name' => $content->name ?? '',
        'title' => $content->seo_title ?? $content->name,
        'description' => $content->seo_description ?? '',
        'keyword' => $content->seo_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
        'seoimage' => $content->image ?? '',
        'created_at' => $content->created_at,
        'updated_at' => $content->updated_at,
    ])
@endsection

@section('content')
    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner ?? null,
        'parentname' => 'Careers',
        'parentlink' => '/careers',
    ])

    <div class="career-details-area pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="career-article">
                        <div class="article-content">
                            <div class="row">
                                <div class="col-12">
                                    <h2>{{ $content->name ?? '' }}</h2>
                                    <hr>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Job Type</h3>
                                        <p class="mt-1 mb-0">{{ $content->type ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Job Level</h3>
                                        <p class="mt-1 mb-0">{{ $content->level ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Location</h3>
                                        <p class="mt-1 mb-0">{{ $content->location ?? 'Thamel, Kathmandu' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Offered Salary</h3>
                                        <p class="mt-1 mb-0">{{ $content->salary ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Posted</h3>
                                        <p class="mt-1 mb-0">{{ get_the_date($content->created_at) ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h3>Deadline to Apply</h3>
                                        <p class="mt-1 mb-0">{{ $deadline ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 text-align">
                                    <hr>
                                    {!! $content->description ?? '' !!}
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items center">
                                    <a class="default-btn btn-bg-two border-radius-50" data-bs-target="#careerModal"
                                        href="javascript:void(0)"data-bs-toggle="modal">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-area">
                        @if ($careers->isNotEmpty())
                            <div class="side-bar-widget">
                                <h3 class="title">Other Vacancies</h3>
                                <hr class="m-0">
                                <div class="widget-popular-post">
                                    @foreach ($careers as $blog)
                                        <article class="item">
                                            <div class="info d-flex justify-content-between">
                                                <h4 class="title-text">
                                                    <a href="{{ route('careersingle', $blog->slug) }}">{{ $blog->name }}
                                                    </a>
                                                </h4>
                                                <h4 class="title-text">
                                                    <a class="btn btn-sm btn-primary btn-bg-two rounded-5 text-white"
                                                        href="{{ route('careersingle', $blog->slug) }}">View
                                                        Details
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if ($blogs->isNotEmpty())
                            <div class="side-bar-widget mt-3">
                                <h3 class="title">Latest Blog</h3>
                                <hr class="m-0">
                                <div class="widget-popular-post">
                                    @foreach ($blogs as $blog)
                                        <article class="item">
                                            <a class="thumb" href="{{ route('blogsingle', $blog->slug) }}">
                                                {!! get_image($blog->image, 'full-image cover', 'sidebar') !!}
                                            </a>
                                            <div class="info">
                                                <h4 class="title-text">
                                                    <a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name }}
                                                    </a>
                                                </h4>
                                                <p>{{ date('M d, Y', strtotime($content->created_at)) }}</p>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="careerModal" tabindex="-1" aria-labelledby="careerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title h1 fs-5" id="careerModalLabel">Apply for the Job</h2>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="careerform">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="control-label"for="name">Your Name<span
                                    class="required text-danger">*</span></label>
                            <input class="form-control br-8" id="name" type="text" name="name" value=""
                                placeholder="Your Name">
                            <span class="text-danger">
                                <span id="name-error"></span>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="email">Your Email<span
                                    class="required text-danger">*</span></label>
                            <input class="form-control br-8" id="email" type="email" name="email" value=""
                                placeholder="Your Email">
                            <span class="text-danger">
                                <span id="email-error"></span>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label"for="number">Contact Number<span
                                    class="required text-danger">*</span></label>
                            <input class="form-control br-8" id="number" type="text" name="number" value=""
                                placeholder="e.g. 9800000000">
                            <span class="text-danger">
                                <span id="number-error"></span>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label"for="url">Portfolio Url</label>
                            <input class="form-control br-8" id="url" type="url" name="url"
                                value="" placeholder="Online Portfolio, eg: http://www.domain.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label">Upload Resume<span class="required text-danger">*</span></label>
                            <input class="filestyle" id="file" type="file" name="file">
                            <br>
                            <small class="help-block">Supporting docs format: doc, pdf, docx, png, jpg, jpeg</small>
                            <span class="text-danger">
                                <br>
                                <span id="file-error"></span>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">About Yourself<span class="required text-danger">*</span></label>
                            <textarea class="form-control" id="message" title="Message is required." placeholder="Tell us about yourself"
                                name="message" rows="5"></textarea>
                            <span class="text-danger">
                                <span id="message-error"></span>
                            </span>
                        </div>
                        <input id="careerpage" type="hidden" name="careerpage" value="{{ $content->id ?? '' }}">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="default-btn btn-bg-two border-radius-50" id="career-submit" type="submit">Apply
                        Now<span class="d-none" id="loader"><i class="fas fa-sync fa-spin"></i></span></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#career-submit').click(function(e) {
            e.preventDefault();
            var careerformData = new FormData($('#careerform')[0]);
            $('#name-error').html("");
            $('#email-error').html("");
            $('#number-error').html("");
            $('#file-error').html("");
            $('#message-error').html("");

            $.ajax({
                url: "{{ route('recruitment') }}",
                method: 'POST',
                data: careerformData,
                processData: false,
                cache: false,
                contentType: false,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.email) {
                            $('#email-error').html(data.errors.email[0]);
                        }
                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }
                        if (data.errors.file) {
                            $('#file-error').html(data.errors.file[0]);
                        }
                        if (data.errors.message) {
                            $('#message-error').html(data.errors.message[0]);
                        }
                    }

                    if (data.success) {
                        $('#loader').hide();
                        toastr.success(data.success);
                        $('#staticBackdrop').modal('hide');
                        $('#careerform')[0].reset();
                    }

                },
                error: function() {
                    $('#loader').hide();
                    alert("Some Problems Occured");
                }
            });
        })
    </script>
@endsection
