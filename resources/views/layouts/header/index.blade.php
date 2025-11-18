@php
    $total = 0;
    $qty = 0;
@endphp
@foreach ((array) session('cart') as $id => $details)
    @php
        $total += ($details['price'] - $details['price'] * ($details['discount'] / 100)) * $details['quantity'];
        $qty += $details['quantity'];
    @endphp
@endforeach
{{-- <div class="menubar w-100 text-center d-lg-none align-items-center scroll_down flex-tuan">
    <div>
         <a href="{{ route('home') }}" title="{{ $setting->company }}">
            <img alt="{{ $setting->company }}" src="{{ $setting->logo }}" class="img-fluid img-logo-top">
        </a></div>

</div> --}}
<div class="col-left d-flex flex-column pt-2 pb-2 d-none d-lg-block"
    style="background-image: url('{{ asset('frontend/images/topbanner.jpg') }}')">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-12 d-lg-none">
                <form action="{{ route('search_result') }}" method="post"
                    class="left-search-mobile position-relative mt-4 mt-lg-0 pt-2 pb-2 pt-lg-1 pb-lg-1">
                    @csrf
                    <input type="text" onkeyup="keyinputsearch()" class="typeahead form-control"
                        placeholder="Nội dung tìm kiếm..." name="keywordsearch"
                        class="rounded form-control pl-2 pl-lg-3 pr-5" required>
                    <button type="submit" class="position-relative buttonsearch">
                        <span uk-icon="search" class="uk-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                data-svg="search">
                                <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9"
                                    r="7"></circle>
                                <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z">
                                </path>
                            </svg>
                        </span>
                        <div class="uk-position-cover uk-padding-small title1__box1 uk-visible@m">
                            <img class="uk-position-top-left"
                                src="https://quaqueviet.vn/includehome/images/component/icon_top_left.png"
                                alt="icon 1">
                            <img class="uk-position-top-right"
                                src="https://quaqueviet.vn/includehome/images/component/icon_top_right.png"
                                alt="icon 2">
                            <img class="uk-position-bottom-left"
                                src="https://quaqueviet.vn/includehome/images/component/icon_bottom_left.png"
                                alt="icon 3">
                            <img class="uk-position-bottom-right"
                                src="https://quaqueviet.vn/includehome/images/component/icon_bottom_right.png"
                                alt="icon 4">
                        </div>
                    </button>
                    {{-- <input type="submit" class="border-0 position-absolute p-0"> --}}
                    <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                        <div class="overflow-auto search-result-warpper">
                            <div class="searchResult_products"> </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-3 d-none d-lg-block flex-tuan">
                <div>

              
                <a href="{{ route('home') }}" title="{{ $setting->company }}" class="logo">
                    <img alt="{{ $setting->company }}" src="{{ $setting->logo }}" class="img-fluid img-logo-top">
                </a>
            </div>
              </div>
            <div class="col-12 col-lg-9 d-none d-lg-block">
                <div class="align-items-center position-static pr-menu">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="info-block mr-3">
                                        <a href="#" title="giao hàng nhanh" class="align-items-center d-flex">
                                            <span class="d-none d-xl-block">
                                                <img src="{{ url('frontend/images/giao_hang_nhanh.png') }}"
                                                    alt="giao hàng nhanh">
                                            </span>
                                            <b>GIAO HÀNG NHANH <br><small class="font-weight-bold">Chỉ trong
                                                    24h</small></b>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="info-block mr-3">
                                        <a href="#" title="Hoàn tiền" class="align-items-center d-flex">
                                            <span class="d-none d-xl-block">
                                                <img src="{{ url('frontend/images/hoan_tien.png') }}" alt="Hoàn tiền">
                                            </span>
                                            <b>HOÀN TIỀN <br><small class="font-weight-bold">150% phát hiện hàng giả
                                                </small></b>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="info-block mr-3">
                                        <a href="#" title="Liên hệ" class="align-items-center d-flex">
                                            <span class="d-none d-xl-block">
                                                <img src="{{ url('frontend/images/hotline-icon.png') }}"
                                                    alt="Liên hệ">
                                            </span>
                                            <b>LIÊN HỆ <br><small
                                                    class="font-weight-bold">{{ $setting->phone1 }}</small></b>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-lg-1">
                            <div class="navigation-bottom mt-auto mt-lg-0">
                                <div class="b_use d-none d-lg-flex align-items-stretch">
                                    <a class="p-1 btn-cart position-relative d-inline-flex head_svg justify-content-center align-items-center rounded-10"
                                        title="Giỏ hàng" href="{{ route('listCart') }}">
                                        <span
                                            class="b_ico_Cart text-center d-flex justify-content-center align-items-center position-relative">
                                            <svg width="20" height="20">
                                                <use href="#svg-cart" />
                                            </svg>
                                            <span
                                                class="btn-cart-indicator position-absolute font-weight-bold text-center text-white cart_count">{{ $qty }}</span>
                                        </span>
                                        <small class="d-none d-xl-block ml-lg-1" style="color:#ac0306;">Giỏ
                                            hàng</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navigation-block mr-lg-auto d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 position-relative " id="title_menus">
                <a href="javascript:;" title="Danh mục sản phẩm"
                    class=" align-items-center text-uppercase d-flex head_svg pl-xl-3 pr-xl-2  position-relative">
                    <div>
                        <img class="uk-position-top-left" src="{{ url('frontend/images/icon_top_left.png') }}"
                            alt="icon top">
                        <img class="uk-position-bottom-right"
                            src="{{ url('frontend/images/icon_bottom_right.png') }}" alt="icon bottom">
                    </div>
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bars" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="svg-inline--fa fa-bars fa-w-14">
                        <path fill="currentColor"
                            d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"
                            class=""></path>
                    </svg>
                    Danh mục sản phẩm
                </a>
                <div class="menu_hover col-lg-3">
                    @include('layouts.main.submenu')
                </div>
            </div>
            <div class="col-lg-3">
                <ul id="menu_pc" class="p-0 m-0 list-unstyled position-relative d-lg-flex">
                    <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                        <a href="{{ route('aboutUs') }}" title="Về chúng tôi" style="border-right:1px solid white;"
                            class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                            Về chúng tôi
                        </a>
                    </li>
                    <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                        <a href="{{ route('allListBlog') }}" title="Tin tức cập nhật"
                           
                            class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                            Tin tức cập nhật
                        </a>
                    </li>
                 
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="search-block mr-3">
                    <form action="{{ route('search_result') }}" method="post"
                        class=" left-search position-relative mt-4 mt-lg-0 pt-2 pb-2 pt-lg-1 pb-lg-1">
                        @csrf
                        <input type="text" onkeyup="keyinputsearch()" class="typeahead form-control"
                            placeholder="Nội dung tìm kiếm..." name="keywordsearch"
                            class="rounded form-control pl-2 pl-lg-3 pr-5" required>
                        <button type="submit" class="position-relative buttonsearch">
                            <span uk-icon="search" class="uk-icon">
                                <svg width="20" height="20" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" data-svg="search">
                                    <circle fill="none" stroke="#000" stroke-width="1.1" cx="9"
                                        cy="9" r="7"></circle>
                                    <path fill="none" stroke="#000" stroke-width="1.1"
                                        d="M14,14 L18,18 L14,14 Z"></path>
                                </svg>
                            </span>
                            <div class="uk-position-cover uk-padding-small title1__box1 uk-visible@m">
                                <img class="uk-position-top-left"
                                    src="https://quaqueviet.vn/includehome/images/component/icon_top_left.png"
                                    alt="icon 1">
                                <img class="uk-position-top-right"
                                    src="https://quaqueviet.vn/includehome/images/component/icon_top_right.png"
                                    alt="icon 2">
                                <img class="uk-position-bottom-left"
                                    src="https://quaqueviet.vn/includehome/images/component/icon_bottom_left.png"
                                    alt="icon 3">
                                <img class="uk-position-bottom-right"
                                    src="https://quaqueviet.vn/includehome/images/component/icon_bottom_right.png"
                                    alt="icon 4">
                            </div>
                        </button>
                        {{-- <input type="submit" class="border-0 position-absolute p-0"> --}}
                        <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                            <div class="overflow-auto search-result-warpper">
                                <div class="searchResult_products"> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="col-left position-fixed d-flex flex-column pt-lg-2 pb-lg-2 pt-0 pb-0 d-lg-none" id="col-left-mew">
    <div class="align-items-center menu_mobile h-100 position-relative">
        <ul id="menu-mew" class="p-0 m-0 list-unstyled d-lg-flex justify-content-lg-end">
            @foreach ($categoryhome as $item)
                @if (count($item->typeCate) > 0 || count($item->tagCate) > 0)
                    <li class="level0 d-block w-100 position-static ">
                        <a title="{{ languageName($item->name) }}"
                            class="position-relative d-flex js-submenu flex-column justify-content-center align-items-center text-center p-2">
                            <img class="lazy d-block pb-2 m-auto"
                                src="{{ url('frontend/images/placeholder_1x1.png') }}"
                                data-src="{{ $item->avatar }}" onerror="this.src='{{ url('' . $setting->favicon) }}'"
                                alt="{{ languageName($item->name) }}">
                            <span class="line_1 line_2">{{ languageName($item->name) }}</span>
                        </a>
                        <ul class="lv1 p-0 list-unstyled position-absolute m_chill m-0 position-relative">
                            <li class="level1 main position-sticky bg-white position-relative">
                                <a href="javascript:;"
                                    class="font-weight-bold d-flex pt-2 pb-2 border-bottom align-items-center w-100 justify-content-center text-main"
                                    title="Chi tiết danh mục">
                                    Chi tiết danh mục
                                </a>
                                <div class="uk-position-cover uk-padding-small title1__box1">
                                    <img class="uk-position-top-left"
                                        src="{{ url('frontend/images/icon_top_left.png') }}" alt="icon 1">
                                    <img class="uk-position-top-right"
                                        src="{{ url('frontend/images/icon_top_right.png') }}" alt="icon 2">

                                </div>
                            </li>
                            @foreach ($item->typeCate as $type)
                                <li class="level1 position-relative">
                                    <a href="{{ route('allListType', ['danhmuc' => $item->slug, 'loaidanhmuc' => $type->slug]) }}"
                                        class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                        title="{{ languageName($type->name) }}">
                                        {{ languageName($type->name) }}
                                    </a>
                                    @if (count($type->typetwo) > 0)
                                        <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                                            @foreach ($type->typetwo as $ttwo)
                                                <li class="level2 position-relative">
                                                    <a href="{{ route('allListTypeTwo', ['danhmuc' => $item->slug, 'loaidanhmuc' => $type->slug, 'loai2' => $ttwo->slug]) }}"
                                                        class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                                        title="{{ languageName($ttwo->name) }}">
                                                        {{ languageName($ttwo->name) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            @foreach ($item->tagCate as $tagcate)
                                @if ($tagcate->status == 1)
                                    <li class="level1 position-relative">
                                        <a href="javascript:;"
                                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                            title="{{ $tagcate->name }}">
                                            {{ $tagcate->name }}
                                        </a>
                                        @if (count($tagcate->tags) > 0)
                                            <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                                                @foreach ($tagcate->tags as $tag)
                                                    <li class="level2 position-relative">
                                                        <a href=""
                                                            class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                                            title="{{ $tag->name }}">
                                                            {{ $tag->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endif
                            @endforeach
                            <img class="uk-position-bottom-left"
                                src="{{ url('frontend/images/icon_bottom_left.png') }}" alt="icon 3">
                            <img class="uk-position-bottom-right"
                                src="{{ url('frontend/images/icon_bottom_right.png') }}" alt="icon 4">
                        </ul>
                    </li>
                @else
                    <li class="level0 d-block w-100 position-static">
                        <a href="{{ route('allListProCate', ['danhmuc' => $item->slug]) }}"
                            title="{{ languageName($item->name) }}"
                            class="position-relative d-flex flex-column justify-content-center align-items-center text-center p-2">
                            <img class="lazy d-block pb-2 m-auto loaded" src="{{ $item->avatar }}"
                                data-src="{{ $item->avatar }}" onerror="this.src='{{ url('' . $setting->favicon) }}'"
                                alt="{{ languageName($item->name) }}">
                            <span class="line_1 line_2">{{ languageName($item->name) }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

<div class="mew_mobi_bar d-lg-none position-fixed d-flex">
    <a id="js-menu-toggle" href="javascript:;" title="Danh mục"
        class="item align-content-center d-flex flex-column h-100 justify-content-center">
        <svg width="20" height="20">
            <use href="#svg-menu" />
        </svg>
        <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Danh mục</span>
    </a>
    <a href="{{ route('compareList') }}" title="So sánh"
        class="item align-content-center d-flex flex-column h-100 justify-content-center js-notify-container">
        <svg width="20" height="20">
            <use href="#svg-compare" />
        </svg>
        <span class="tit font-weight-bold d-block text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">So sánh <b
                class="js-compare-button"><span
                    class="tit comp">{{ !empty($compare) ? count($compare) : 0 }}</span></b></span>
    </a>
    @if (Route::currentRouteName() == 'allListTags' ||
            Route::currentRouteName() == 'allListProCate' ||
            Route::currentRouteName() == 'allListType' ||
            Route::currentRouteName() == 'allListTypeTwo' ||
            Route::currentRouteName() == 'detailProduct')
        <a href="javascript:;" title="Bộ lọc"
            class="item align-content-center d-flex flex-column h-100 justify-content-center open-filters"
            id="open-filters">
            <svg width="20" height="20">
                <use href="#svg-filter"></use>
            </svg>
            <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Bộ lọc</span>
        </a>
    @else
        <a href="tel:{{ $setting->phone1 }}" title="Liên hệ"
            class="item align-content-center d-flex flex-column h-100 justify-content-center" id="js-contact-toggle">
            <svg width="20" height="20">
                <use href="#svg-phone" />
            </svg>
            <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Liên hệ</span>
        </a>
    @endif

    <a class="item d-flex flex-column p-1 align-items-center justify-content-center btn-cart position-relative  "
        title="Giỏ hàng" href="{{ route('listCart') }}">
        <span class="position-relative flex-column d-flex">
            <svg width="20" height="20">
                <use href="#svg-cart" />
            </svg>
            <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Giỏ
                hàng</span>
            <span class="btn-cart-indicator position-absolute text-center">{{ $qty }}</span>
        </span>
    </a>
</div>
