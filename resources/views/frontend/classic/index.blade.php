@extends('frontend.layouts.app')

@section('content')
    <div class="aiz-main-wrapper d-flex flex-column">
        <div class="home-banner-area mb-4">
            <!-- <div class=" col-lg-12 pt-2">
                <div class="px-1 py-1 px-md-1 py-md-1 bg-white shadow-sm rounded">
                    <div class="d-flex mb-1 align-items-baseline">                        
                        <div class="bg-white border-gray-200 py-1">
                            <div class="col-lg-3 position-static d-none d-lg-block">
                                @include('frontend.partials.category_menu_new')
                            </div>
                        </div> 
                    </div>    
                </div>
            </div> -->
            <!-- <div class=" col-lg-12 ">&nbsp;</div> -->
            <!-- <div class="container">
                <div class="row gutters-10 position-relative"> -->
                    @php $lang = get_system_language()->code; @endphp
                    @if (get_setting('home_slider_images', null, $lang) != null)
                        <div class=" col-lg-12 pt-2">
                            <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                                @php
                                    $decoded_slider_images = json_decode(
                                    get_setting('home_slider_images', null, $lang),
                                    true,
                                    );
                                    $sliders = get_slider_images($decoded_slider_images);
                                    $home_slider_links = get_setting('home_slider_links', null, $lang);
                                @endphp
                                @foreach ($sliders as $key => $slider)
                                    <div class="carousel-box" style="border:0px solid red !important;height:215px;">
                                        <a
                                            href="{{ isset(json_decode($home_slider_links, true)[$key]) ? json_decode($home_slider_links, true)[$key] : '' }}">
                                            <!-- Image -->
                                            <img class="d-block mw-100 img-fit overflow-hidden h-180px h-md-320px h-lg-460px overflow-hidden" style="border:0px solid red !important;height:215px;"
                                                src="{{ $slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                alt="{{ env('APP_NAME') }} promo"
                                                @if(count($featured_categories) == 0)
                                                height="257"
                                                @else
                                                height="215"
                                                @endif
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif                        
                <!-- </div>
            </div>    -->
            <!-- <div class=" col-lg-12 ">&nbsp;</div> -->
            <div class="col-lg-12 pt-2">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3">                        
                        <!-- New Products -->
                        <div id="section_newest"></div>
                    </div>    
                </div>
            </div>
            <!-- <div class=" col-lg-12 ">&nbsp;</div>
            <div class=" col-lg-12 ">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3">                        
                        <div id="section_featured_preorder_products"></div>
                    </div>    
                </div>
            </div> -->
           <!--  <div class=" col-lg-12 ">&nbsp;</div> -->
            <div class=" col-lg-12 pt-2">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3">                        
                        <!-- Best Selling  -->
                        <div id="section_best_selling"></div>
                    </div>    
                </div>
            </div>
            <!-- <div class=" col-lg-12 ">&nbsp;</div> -->
            <div class=" col-lg-12 pt-2">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3 align-items-baseline">                        
                        <style>
                            @media (max-width: 767px) {
                                #flash_deal .flash-deals-baner {
                                    height: 203px !important;
                                }
                            }
                        </style>
                        <!-- Flash Deal -->
                        @php
                        $flash_deal = get_featured_flash_deal();
                        @endphp
                        @if ($flash_deal != null)
                        <section class="mb-2 mb-md-3 mt-2 mt-md-3" id="flash_deal">
                            <div class="container">
                                <!-- Top Section -->
                                <div class="d-flex flex-wrap mb-2 mb-md-3 align-items-baseline justify-content-between">
                                    <!-- Title -->
                                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                                        <span class="d-inline-block">{{ translate('Flash Sale') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24"
                                            class="ml-1">
                                            <path id="Path_28795" data-name="Path 28795"
                                                d="M30.953,13.695a.474.474,0,0,0-.424-.25h-4.9l3.917-7.81a.423.423,0,0,0-.028-.428.477.477,0,0,0-.4-.207H21.588a.473.473,0,0,0-.429.263L15.041,18.151a.423.423,0,0,0,.034.423.478.478,0,0,0,.4.2h4.593l-2.229,9.683a.438.438,0,0,0,.259.5.489.489,0,0,0,.571-.127L30.9,14.164a.425.425,0,0,0,.054-.469Z"
                                                transform="translate(-15 -5)" fill="#fcc201" />
                                        </svg>
                                    </h3>
                                    <!-- Links -->
                                    <div>
                                        <div class="text-dark d-flex align-items-center mb-0">
                                            <a href="{{ route('flash-deal-details', $flash_deal->slug) }}"
                                                class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary mr-3">{{ translate('View All Products from This Flash Sale') }}</a>
                                            <!-- <span class=" border-left border-soft-light border-width-2 pl-3">
                                                <a href="{{ route('flash-deal-details', $flash_deal->slug) }}"
                                                    class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary">{{ translate('View All Products from This Flash Sale') }}</a>
                                            </span> -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile view Countdown -->
                                <div class="mobile-countdown-simple d-md-none w-100 mb-3"
                                    data-end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}">
                                    <div class="countdown-text text-center">
                                        Ends in:
                                        <span id="simple-days">00</span> days
                                        <span id="simple-hours">00</span> hrs
                                        <span id="simple-mins">00</span> min
                                        <span id="simple-secs">00</span> sec
                                    </div>
                                </div>
                                <div class="row gutters-5 gutters-md-16">
                                    <!-- Flash Deals Baner & Countdown -->
                                    <div class="flash-deals-baner col-xxl-4 col-lg-5 col-6 h-200px h-md-400px h-lg-475px">
                                        <a href="{{ route('flash-deal-details', $flash_deal->slug) }}">
                                            <div class="h-100 w-100 w-xl-auto"
                                                style="background-image: url('{{ uploaded_asset($flash_deal->banner) }}'); background-size: cover; background-position: center center;">
                                                <div class="py-5 px-md-3 px-xl-5 d-none d-md-block">
                                                    <div class="bg-white">
                                                        <div class="aiz-count-down-circle"
                                                            end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Flash Deals Products -->
                                    <div class="col-xxl-8 col-lg-7 col-6">
                                        @php
                                        $flash_deal_products = get_flash_deal_products($flash_deal->id);
                                        @endphp
                                        <div class="aiz-carousel border-top @if (count($flash_deal_products) > 8) border-right @endif arrow-inactive-none arrow-x-0"
                                            data-rows="2" data-items="5" data-xxl-items="5" data-xl-items="3.5" data-lg-items="3"
                                            data-md-items="2" data-sm-items="2.5" data-xs-items="1.7" data-arrows="true" data-dots="false">
                                            @foreach ($flash_deal_products as $key => $flash_deal_product)
                                            <div class="carousel-box border-left border-bottom">
                                                @if ($flash_deal_product->product != null && $flash_deal_product->product->published != 0)
                                                @php
                                                $product_url = route('product', $flash_deal_product->product->slug);
                                                if ($flash_deal_product->product->auction_product == 1) {
                                                $product_url = route(
                                                'auction-product',
                                                $flash_deal_product->product->slug,
                                                );
                                                }
                                                @endphp
                                                <div
                                                    class="h-100px h-md-200px h-lg-auto flash-deal-item position-relative text-center has-transition hov-shadow-out z-1">
                                                    <a href="{{ $product_url }}"
                                                        class="d-block py-md-3 overflow-hidden hov-scale-img"
                                                        title="{{ $flash_deal_product->product->getTranslation('name') }}">
                                                        <!-- Image -->
                                                        <img src="{{ get_image($flash_deal_product->product->thumbnail) }}"
                                                            class="lazyload h-60px h-md-100px h-lg-140px mw-100 mx-auto has-transition"
                                                            alt="{{ $flash_deal_product->product->getTranslation('name') }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                        <!-- Price -->
                                                        <div
                                                            class="fs-11 fs-md-14 mt-md-3 text-center h-md-48px has-transition overflow-hidden pt-md-4 flash-deal-price lh-1-5">
                                                            <span
                                                                class="d-block text-primary fw-700">{{ home_discounted_base_price($flash_deal_product->product) }}</span>
                                                            @if (home_base_price($flash_deal_product->product) != home_discounted_base_price($flash_deal_product->product))
                                                            <del
                                                                class="d-block fw-400 text-secondary">{{ home_base_price($flash_deal_product->product) }}</del>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    </div>    
                </div>
            </div>
            <!-- <div class=" col-lg-12 ">&nbsp;</div> -->
            <div class=" col-lg-12 pt-2">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3 align-items-baseline">                        
                        <!-- Featured Categories -->
                        @if (count($featured_categories) > 0)
                        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                            <div class="container">
                                <div class="bg-white">
                                    <!-- Top Section -->
                                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                                        <!-- Title -->
                                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                                            <span class="">{{ translate('Featured Categories') }}</span>
                                        </h3>
                                        <!-- Links -->
                                        <div class="d-flex">
                                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                                href="{{ route('categories.all') }}">{{ translate('View All Categories') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Categories Section -->
                                <div class="bg-white px-3">
                                    <div class="mobile-category-slider row border-top border-left border-bottom">
                                        @foreach ($featured_categories->take(6) as $key => $category)
                                        @php
                                        $category_name = $category->getTranslation('name');
                                        @endphp
                                        <div class="col-xl-4 col-md-6  py-3 py-md-2rem category-slide border-right border-bottom">
                                            <div class="d-sm-flex text-center text-sm-left h-100 ">
                                                <div class="mb-3">
                                                    <img src="{{ isset($category->bannerImage->file_name) ? my_asset($category->bannerImage->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                        class="lazyload w-150px h-auto mx-auto has-transition"
                                                        alt="{{ $category->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </div>
                                                <div class="px-2 px-lg-4 flex-grow-1">
                                                    <h6 class="text-dark mb-0 text-truncate-2">
                                                        <a class="text-reset fw-700 fs-14 hov-text-primary"
                                                            href="{{ route('products.category', $category->slug) }}"
                                                            title="{{ $category_name }}">
                                                            {{ $category_name }}
                                                        </a>
                                                    </h6>
                                                    <div class="category-children-container">
                                                        @foreach ($category->childrenCategories->take(5) as $child_category)
                                                        <p class="mb-0 mt-2">
                                                            <a href="{{ route('products.category', $child_category->slug) }}"
                                                                class="fs-13 fw-300 text-reset hov-text-primary animate-underline-primary">
                                                                {{ $child_category->getTranslation('name') }}
                                                            </a>
                                                        </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                        </section>
                        @endif
                    </div>    
                </div>
            </div>
            <!-- Top Brands -->
            @if (get_setting('top_brands') != null)
            <!-- <div class=" col-lg-12 ">&nbsp;</div>
            <div class=" col-lg-12 ">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3 align-items-baseline border-bottom">                    
                    <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                        <div class="container">
                            <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">{{ translate('Top Brands') }}</h3>
                                <div class="d-flex">
                                    <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                        href="{{ route('brands.all') }}">{{ translate('View All Brands') }}</a>
                                </div>
                            </div>
                            <div class="bg-white px-sm-3 px-0">
                                <div
                                    class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left d-none d-sm-flex">
                                    @php
                                    $top_brands = json_decode(get_setting('top_brands'));
                                    $brands = get_brands($top_brands);
                                    @endphp
                                    @foreach ($brands as $brand)
                                    <div
                                        class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                                        <a href="{{ route('products.brand', $brand->slug) }}" class="d-block p-sm-3">
                                            <img src="{{ $brand->logo != null ? uploaded_asset($brand->logo) : static_asset('assets/img/placeholder.jpg') }}"
                                                class="lazyload h-100 h-md-100px mx-auto has-transition p-2 p-sm-4 mw-100"
                                                alt="{{ $brand->getTranslation('name') }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2">
                                                {{ $brand->getTranslation('name') }}
                                            </p>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-sm-none aiz-carousel arrow-x-0 arrow-inactive-none" data-items="5" data-xxl-items="5"
                                    data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="2.5"
                                    data-arrows="true" data-dots="false">
                                    @foreach ($brands as $brand)
                                    <div class="carousel-box text-center border hov-scale-img has-transition hov-shadow-out z-1">
                                        <a href="{{ route('products.brand', $brand->slug) }}" class="d-block p-2 p-sm-3">
                                            <img src="{{ $brand->logo != null ? uploaded_asset($brand->logo) : static_asset('assets/img/placeholder.jpg') }}"
                                                class="lazyload h-100 h-md-100px mx-auto has-transition p-1 p-sm-2 mw-100"
                                                alt="{{ $brand->getTranslation('name') }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-1 mt-sm-2">
                                                {{ $brand->getTranslation('name') }}
                                            </p>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    </div>    
                </div>
            </div> -->
            @endif
        </div>      
    </div>
    <!-- Today's deal -->
    <!-- <div id="todays_deal" class="mb-2 mb-md-3 mt-2 mt-md-3"></div> -->

<!-- Banner section 1 -->
@php $homeBanner1Images = get_setting('home_banner1_images', null, $lang); @endphp
@if ($homeBanner1Images != null)
<!-- <div class="mb-2 mb-md-3 mt-2 mt-md-3">
    <div class="container">
        @php
        $banner_1_imags = json_decode($homeBanner1Images);
        $data_md = count($banner_1_imags) >= 2 ? 2 : 1;
        $home_banner1_links = get_setting('home_banner1_links', null, $lang);
        @endphp
        <div class="w-100 w-100 pr-3 pr-md-0">
            <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15 home-banner-1"
                data-items="{{ count($banner_1_imags) }}" data-xxl-items="{{ count($banner_1_imags) }}"
                data-xl-items="{{ count($banner_1_imags) }}" data-lg-items="{{ $data_md }}"
                data-md-items="2.5" data-sm-items="2.5" data-xs-items="2.5" data-arrows="true"
                data-dots="false">
                @foreach ($banner_1_imags as $key => $value)
                <div class="carousel-box overflow-hidden hov-scale-img">
                    <a href="{{ isset(json_decode($home_banner1_links, true)[$key]) ? json_decode($home_banner1_links, true)[$key] : '' }}"
                        class="d-block text-reset overflow-hidden">
                        <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                            class="img-fluid lazyload w-100 has-transition"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> -->
@endif




@if (addon_is_activated('preorder'))

<!-- Preorder Banner 1 -->
@php $homepreorder_banner_1Images = get_setting('home_preorder_banner_1_images', null, $lang); @endphp
@if ($homepreorder_banner_1Images != null)
<!-- <div class="mb-2 mb-md-3 mt-2 mt-md-3">
    <div class="container">
        @php
        $banner_2_imags = json_decode($homepreorder_banner_1Images);
        $data_md = count($banner_2_imags) >= 2 ? 2 : 1;
        $home_preorder_banner_1_links = get_setting('home_preorder_banner_1_links', null, $lang);
        @endphp
        <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
            data-items="{{ count($banner_2_imags) }}" data-xxl-items="{{ count($banner_2_imags) }}"
            data-xl-items="{{ count($banner_2_imags) }}" data-lg-items="{{ $data_md }}"
            data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true"
            data-dots="false">
            @foreach ($banner_2_imags as $key => $value)
            <div class="carousel-box overflow-hidden hov-scale-img">
                <a href="{{ isset(json_decode($home_preorder_banner_1_links, true)[$key]) ? json_decode($home_preorder_banner_1_links, true)[$key] : '' }}"
                    class="d-block text-reset overflow-hidden">
                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                        data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                        class="img-fluid lazyload w-100 has-transition"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div> -->
@endif


<!-- Featured Preorder Products -->
<!-- <div id="section_featured_preorder_products">

</div> -->
@endif


<!-- Banner Section 2 -->
@php $homeBanner2Images = get_setting('home_banner2_images', null, $lang); @endphp
@if ($homeBanner2Images != null)
<!-- <div class="mb-2 mb-md-3 mt-2 mt-md-3">
    <div class="container">
        @php
        $banner_2_imags = json_decode($homeBanner2Images);
        $data_md = count($banner_2_imags) >= 2 ? 2 : 1;
        $home_banner2_links = get_setting('home_banner2_links', null, $lang);
        @endphp
        <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
            data-items="{{ count($banner_2_imags) }}" data-xxl-items="{{ count($banner_2_imags) }}"
            data-xl-items="{{ count($banner_2_imags) }}" data-lg-items="{{ $data_md }}"
            data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true"
            data-dots="false">
            @foreach ($banner_2_imags as $key => $value)
            <div class="carousel-box overflow-hidden hov-scale-img">
                <a href="{{ isset(json_decode($home_banner2_links, true)[$key]) ? json_decode($home_banner2_links, true)[$key] : '' }}"
                    class="d-block text-reset overflow-hidden">
                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                        data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                        class="img-fluid lazyload w-100 has-transition"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div> -->
@endif

<!-- Best Selling  -->
<!-- <div id="section_best_selling">

</div> -->

<!-- New Products -->
<!-- <div id="section_newest">

</div> -->

<!-- Banner Section 3 -->
@php $homeBanner3Images = get_setting('home_banner3_images', null, $lang); @endphp
@if ($homeBanner3Images != null)
<!-- <div class="mb-2 mb-md-3 mt-2 mt-md-3">
    <div class="container">
        @php
        $banner_3_imags = json_decode($homeBanner3Images);
        $data_md = count($banner_3_imags) >= 2 ? 2 : 1;
        $home_banner3_links = get_setting('home_banner3_links', null, $lang);
        @endphp
        <div class="w-100 pr-3 pr-md-0">
            <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15 home-banner-1"
                data-items="{{ count($banner_3_imags) }}" data-xxl-items="{{ count($banner_3_imags) }}"
                data-xl-items="{{ count($banner_3_imags) }}" data-lg-items="{{ $data_md }}"
                data-md-items="2.5" data-sm-items="2.5" data-xs-items="2.5" data-arrows="true"
                data-dots="false">
                @foreach ($banner_3_imags as $key => $value)
                <div class="carousel-box overflow-hidden hov-scale-img">
                    <a href="{{ isset(json_decode($home_banner3_links, true)[$key]) ? json_decode($home_banner3_links, true)[$key] : '' }}"
                        class="d-block text-reset overflow-hidden">
                        <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                            class="img-fluid lazyload w-100 has-transition"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> -->
@endif

<!-- Auction Product -->
@if (addon_is_activated('auction'))
<!-- <div id="auction_products">

</div> -->
@endif

<!-- Cupon -->
@if (get_setting('coupon_system') == 1)
<!-- <div class="mb-2 mb-md-3 mt-2 mt-md-3"
     style="background-color: {{ get_setting('cupon_background_color', '#292933') }}">
    <div class="container">
        <div class="row py-3 py-md-5">
            <div class="col-xl-8 text-xl-left">
                <div class="row no-gutters d-lg-flex">
                    <div class="col-2 d-flex justify-content-center align-items-center">
         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="109.602" height="93.34" viewBox="0 0 109.602 93.34">
                                    <defs>
                                        <clipPath id="clip-pathcup">
                                            <path id="Union_10" data-name="Union 10" d="M12263,13778v-15h64v-41h12v56Z"
                                                transform="translate(-11966 -8442.865)" fill="none" stroke="#fff"
                                                stroke-width="2" />
                                        </clipPath>
                                    </defs>
                                    <g id="Group_24326" data-name="Group 24326"
                                        transform="translate(-274.201 -5254.611)">
                                        <g id="Mask_Group_23" data-name="Mask Group 23"
                                            transform="translate(-3652.459 1785.452) rotate(-45)"
                                            clip-path="url(#clip-pathcup)">
                                            <g id="Group_24322" data-name="Group 24322"
                                                transform="translate(207 18.136)">
                                                <g id="Subtraction_167" data-name="Subtraction 167"
                                                    transform="translate(-12177 -8458)" fill="none">
                                                    <path
                                                        d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z"
                                                        stroke="none" />
                                                    <path
                                                        d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z"
                                                        stroke="none" fill="#fff" />
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_24321" data-name="Group 24321"
                                            transform="translate(-3514.477 1653.317) rotate(-45)">
                                            <g id="Subtraction_167-2" data-name="Subtraction 167"
                                                transform="translate(-12177 -8458)" fill="none">
                                                <path
                                                    d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z"
                                                    stroke="none" />
                                                <path
                                                    d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z"
                                                    stroke="none" fill="#fff" />
                                            </g>
                                            <g id="Group_24325" data-name="Group 24325">
                                                <rect id="Rectangle_18578" data-name="Rectangle 18578" width="8"
                                                    height="2" transform="translate(120 5287)" fill="#fff" />
                                                <rect id="Rectangle_18579" data-name="Rectangle 18579" width="8"
                                                    height="2" transform="translate(132 5287)" fill="#fff" />
                                                <rect id="Rectangle_18581" data-name="Rectangle 18581" width="8"
                                                    height="2" transform="translate(144 5287)" fill="#fff" />
                                                <rect id="Rectangle_18580" data-name="Rectangle 18580" width="8"
                                                    height="2" transform="translate(108 5287)" fill="#fff" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                    </div>

                    <div class="col-10 d-flex flex-column justify-content-center text-left">
                        <div class="ml-lg-3">
                            <h5 class="fs-20 fs-md-36 fw-400 text-white mb-3">{{ translate(get_setting('cupon_title')) }}</h5>
                            <h5 class="fs-15 fs-md-20 fw-400 text-gray mb-3">{{ translate(get_setting('cupon_subtitle')) }}</h5>
                            <a href="{{ route('coupons.all') }}"
                               class="btn text-white hov-bg-white hov-text-dark border border-width-2 fs-12 fs-md-16 px-4 d-xl-none"
                               style="border-radius: 28px;background: rgba(255, 255, 255, 0.2);box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);">{{ translate('View All Coupons') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-none d-xl-flex justify-content-end align-items-center mt-2 mt-md-4">
                <a href="{{ route('coupons.all') }}"
                   class="btn text-white hov-bg-white hov-text-dark border border-width-2 fs-12 fs-md-16 px-4"
                   style="border-radius: 28px;background: rgba(255, 255, 255, 0.2);box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);">{{ translate('View All Coupons') }}</a>
            </div>
        </div>
    </div>
</div> -->
@endif

<!-- Category wise Products/home-category -->
<!-- <div id="section_home_categories" class="mb-2 mb-md-3 mt-2 mt-md-3"></div> -->

@if (addon_is_activated('preorder'))
<!-- Newest Preorder Products -->
@include('preorder.frontend.home_page.newest_preorder')
@endif

<!-- Classified Product -->
@if (get_setting('classified_product') == 1)
@php
$classified_products = get_home_page_classified_products(6);
@endphp
@if (count($classified_products) > 0)
<!-- <section class="mb-2 mb-md-3 mt-3 mt-md-3">
    <div class="container">
        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
            <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                <span class="">{{ translate('Classified Ads') }}</span>
            </h3>
            <div class="d-flex">
                <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                    href="{{ route('customer.products') }}">{{ translate('View All Products') }}</a>
            </div>
        </div>
        @php
        $classifiedBannerImage = get_setting('classified_banner_image', null, $lang);
        $classifiedBannerImageSmall = get_setting('classified_banner_image_small', null, $lang);
        @endphp
        @if ($classifiedBannerImage != null || $classifiedBannerImageSmall != null)
        <div class="mb-3 overflow-hidden hov-scale-img d-none d-md-block">
            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ uploaded_asset($classifiedBannerImage) }}"
                alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
        </div>
        <div class="mb-3 overflow-hidden hov-scale-img d-md-none">
            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ $classifiedBannerImageSmall != null ? uploaded_asset($classifiedBannerImageSmall) : uploaded_asset($classifiedBannerImage) }}"
                alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
        </div>
        @endif
        <div class="bg-white d-none d-sm-block">
            <div class="row no-gutters border-top border-left">
                @foreach ($classified_products as $key => $classified_product)
                <div
                    class="col-xl-4 col-md-6 border-right border-bottom has-transition hov-shadow-out z-1">
                    <div class="aiz-card-box p-2 has-transition bg-white">
                        <div class="row hov-scale-img">
                            <div class="col-4 col-md-5 mb-3 mb-md-0">
                                <a href="{{ route('customer.product', $classified_product->slug) }}"
                                    class="d-block overflow-hidden h-auto h-md-150px text-center">
                                    <img class="img-fluid lazyload mx-auto has-transition"
                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ isset($classified_product->thumbnail->file_name) ? my_asset($classified_product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                        alt="{{ $classified_product->getTranslation('name') }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                </a>
                            </div>
                            <div class="col">
                                <h3
                                    class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-3 h-35px d-none d-sm-block">
                                    <a href="{{ route('customer.product', $classified_product->slug) }}"
                                        class="d-block text-reset hov-text-primary">{{ $classified_product->getTranslation('name') }}</a>
                                </h3>
                                <div class="fs-14 mb-3">
                                    <span
                                        class="text-secondary">{{ $classified_product->user ? $classified_product->user->name : '' }}</span><br>
                                    <span
                                        class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                </div>
                                @if ($classified_product->conditon == 'new')
                                <span
                                    class="badge badge-inline badge-soft-info fs-13 fw-700 p-3 text-info border-radius-20px">
                                    {{ translate('New') }}</span>
                                @elseif($classified_product->conditon == 'used')
                                <span
                                    class="badge badge-inline badge-soft-danger fs-13 fw-700 p-3 text-danger border-radius-20px">{{ translate('Used') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white d-sm-none ">
            <div class="aiz-carousel @if (count($classified_products) <= 8) arrow-inactive-none arrow-x-0 @endif"
                data-items="1.5" data-sm-items="1.5" data-arrows="true" data-dots="false" data-dots="false"
                data-autoplay="true" data-autoplay-speed="3000" data-rows="2">
                @foreach ($classified_products as $key => $classified_product)
                <div class="carousel-box classified-slider border has-transition hov-shadow-out bg-white ">
                    <div class="d-flex flex-row align-items-start p-2">
                        <a href="{{ route('customer.product', $classified_product->slug) }}"
                            class="flex-shrink-0 w-100px">
                            <img class="img-fluid lazyload has-transition w-100"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ isset($classified_product->thumbnail->file_name) ? my_asset($classified_product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                alt="{{ $classified_product->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                        <div class="flex-grow-1">
                            <h3 class="fw-400 fs-13 text-dark text-truncate-1 lh-1-4 mb-1">
                                <a href="{{ route('customer.product', $classified_product->slug) }}"
                                    class="text-reset hov-text-primary">{{ $classified_product->getTranslation('name') }}</a>
                            </h3>
                            <div class="fs-12 text-muted mb-1">
                                {{ $classified_product->user ? $classified_product->user->name : '' }}
                            </div>
                            <div class="fw-700 text-primary fs-13 mb-1">
                                {{ single_price($classified_product->unit_price) }}
                            </div>
                            <div>
                                @if ($classified_product->conditon == 'new')
                                <span
                                    class="badge-sm badge-soft-info fs-11 fw-600 px-2 py-1 text-info rounded-pill">{{ translate('New') }}</span>
                                @elseif($classified_product->conditon == 'used')
                                <span
                                    class="badge-sm badge-soft-danger fs-11 fw-600 px-2 py-1 text-danger rounded-pill">{{ translate('Used') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> -->
@endif
@endif
@endsection

@section('script')
<script>
    // Countdown for mobile view
    function startSimpleCountdown(endDate) {
        function update() {
            const now = new Date();
            const diff = endDate - now;
            if (diff > 0) {
                const totalSeconds = Math.floor(diff / 1000);
                const days = Math.floor(totalSeconds / (60 * 60 * 24));
                const hours = Math.floor((totalSeconds % (60 * 60 * 24)) / (60 * 60));
                const mins = Math.floor((totalSeconds % (60 * 60)) / 60);
                const secs = totalSeconds % 60;

                document.getElementById("simple-days").textContent = days.toString().padStart(2, '0');
                document.getElementById("simple-hours").textContent = hours.toString().padStart(2, '0');
                document.getElementById("simple-mins").textContent = mins.toString().padStart(2, '0');
                document.getElementById("simple-secs").textContent = secs.toString().padStart(2, '0');
            } else {
                document.querySelector(".mobile-countdown-simple").textContent = "Sale ended";
                clearInterval(timer);
            }
        }

        update();
        const timer = setInterval(update, 1000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        const countdownEl = document.querySelector('.mobile-countdown-simple');
        if (!countdownEl) return;

        const endDateStr = countdownEl.dataset.endDate;
        if (endDateStr) {
            const parsedEndDate = new Date(endDateStr.replace(/-/g, '/'));
            startSimpleCountdown(parsedEndDate);
        }
    });
</script>
@endsection