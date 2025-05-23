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
        'parentname' => '',
        'parentlink' => '',
    ])
    <section class="payments ptb-80">
        <div class="container">
            <div class="row p-2">
                <div class="col-lg-6 d-grid align-items-strech mt-4">
                    <div class="media-wrapper fonepay">
                        <img src="/storage/qr.webp" alt="scan">
                    </div>
                </div>
                <div class="col-lg-6 d-grid mt-4">
                    <div class="bank-card d-flex align-items-center bg-white mt-0">
                        <div class="media-wrapper">
                            <img src="/storage/sc.webp" alt="sc">
                        </div>
                        <div class="bank-card-detail">
                            <h2>Standard Chartered Bank</h2>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    Account Holder's Name:
                                    <b>Paradise IT Solution Pvt. Ltd.</b>
                                </li>
                                <li class="nav-item">Account Number: <b> 01351274601</b></li>

                                <li class="nav-item">
                                    Branch Address: <b>New Baneshwor, Kathmandu</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bank-card d-flex align-items-center bg-white">
                        <div class="media-wrapper">
                            <img src="/storage/global.webp" alt="global">
                        </div>
                        <div class="bank-card-detail">
                            <h2>Global IME Bank</h2>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    Account Holder's Name:
                                    <b>Paradise IT Solution Pvt. Ltd.</b>
                                </li>
                                <li class="nav-item">Account Number: <b> 0901010000606</b></li>

                                <li class="nav-item">
                                    Branch Address: <b>Thamel, Kathmandu</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bank-card d-flex align-items-center bg-white">
                        <div class="media-wrapper">
                            <img src="/storage/ss.webp" alt="sanima">
                        </div>
                        <div class="bank-card-detail">
                            <h2>Sanima Bank</h2>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    Account Holder's Name:
                                    <b>Paradise IT Solution Pvt. Ltd.</b>
                                </li>
                                <li class="nav-item">Account Number: <b> 075010010000209</b></li>

                                <li class="nav-item">
                                    Branch Address: <b>Kantipath, Kathmandu</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
