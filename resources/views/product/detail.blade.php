@extends('layouts.main.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ languageName($product->description) }}
@endsection
@section('image')
    @php
        $img = json_decode($product->images);
        $thongsokythuat = json_decode($product->size);
        $variant = json_decode($product->variant);
        $khuyenmai = json_decode($product->preserve);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('css')
    <link rel="preload" as="style" href="{{ asset('frontend/css/swatch_style.scss.css') }}" type="text/css">
    <link rel="preload" as="style" href="{{ asset('frontend/css/product_style.scss.css') }}" type="text/css">
    <link href="{{ asset('frontend/css/swatch_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/product_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="preload" as="style" href="{{ asset('frontend/css/magnific-popup.min.css') }}" type="text/css">
    <link href="{{ asset('frontend/css/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('js')
    <script src="{{ asset('frontend/js/main.js') }}" defer></script>
    <script src="{{ asset('frontend/js/mew_product.js') }}" defer></script>
    <script src="{{ asset('frontend/js/cart.js') }}" defer></script>
    <script>
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    </script>
@endsection
@section('content')
    <div class="contentWarp ">
        <div class="breadcrumbs bg-white">
            <div class="container position-relative">
                <ul class="breadcrumb align-items-center m-0 pl-0 pr-0 small pt-2 pb-2 bg-white">
                    <li class="home">
                        <a href="/" title="Trang chủ">
                            <svg width="12" height="10.633">
                                <use href="#svg-home" />
                            </svg>
                            Trang chủ
                        </a>
                        <span class="slash-divider ml-2 mr-2">/</span>
                    </li>
                    <li>
                        <a href="{{ route('allListProCate', ['danhmuc' => $product->cate->slug]) }}"
                            title="{{ languageName($product->cate->name) }}">{{ languageName($product->cate->name) }}</a>
                        <span class="slash-divider ml-2 mr-2">/</span>
                    </li>
                    @if ($product->typeCate)
                        <li>
                            <a href="{{ route('allListType', ['danhmuc' => $product->cate->slug, 'loaidanhmuc' => $product->typeCate->slug]) }}"
                                title="{{ languageName($product->typeCate->name) }}">{{ languageName($product->typeCate->name) }}</a>
                            <span class="slash-divider ml-2 mr-2">/</span>
                        </li>
                    @endif
                    <li><span>{{ $product->name }}</span>
                    <li>
                </ul>
            </div>
        </div>

        <div>
            <div class="container mt-3 mb-3">
                <div class="rounded p-2 p-md-3 bg-white">
                    <section class="product-layout product-layout2 ">
                        <div class="row">
                            <div class="col-12 h_pr mb-3">
                                <h1 class="product-name font-weight-bold mb-2 d-inline-flex mr-3">{{ $product->name }}</h1>
                                <label
                                    class="align-items-center border compare-label d-inline-flex m-0 position-relative px-2 py-1 rounded-10">
                                    <input type="checkbox" class="compare-checkbox d-none" value="/iphone-13-128gb"
                                        data-type="IOS">
                                    {{-- <span class="compare-checkbox mr-1 position-relative"></span>
                     So sánh
                     </label> --}}

                            </div>
                            <div class="product-layout_col-left col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 mb-3">
                                <div class="product-main-slide swiper-container mb-3">
                                    <div class="swiper-wrapper popup-gallery">
                                        @foreach ($img as $item)
                                            <div class="swiper-slide ">
                                                <a class="position-relative d-block aspect ratio1by1 modal-open rounded"
                                                    href="{{ $item }}" title="{{ $product->name }}">
                                                    <img class="image-link d-block m-auto img position-absolute img-contain gradient-load"
                                                        src="{{ $item }}">
                                                </a>

                                            </div>
                                        @endforeach
                                        <div class="swiper-button-prev mew_product_main-slide_prev"></div>
                                        <div class="swiper-button-next mew_product_main-slide_next"></div>
                                    </div>
                                </div>
                                <div class="product-thumb-slide swiper-container ">
                                    <div class="swiper-wrapper">
                                        @foreach ($img as $item)
                                            <div class="swiper-slide m_thumb_pl border rounded modal-open crp ">
                                                <div class="position-relative w-100 m-0 ratio1by1 aspect">
                                                    <img src="{{ $item }}" data-img="{{ $item }}"
                                                        alt="{{ $product->name }}"
                                                        class="d-block img position-absolute w-100 h-100">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="product-layout_col-right col-12 col-sm-12 col-md-7 col-lg-7 col-xl-5 product-warp">
                                @if ($product->price > 0)
                                    @if ($product->status_variant == 1)
                                        <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded mb-2">
                                            <span class="special-price m-0" id="price-offical">19.790.000₫</span>
                                            <input type="text" hidden name="" id="price-send-car" value="">
                                            <del class="old-price ml-2">{{ number_format($product->price) }}₫</del>
                                        </div>
                                    @else
                                        <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded mb-2">
                                            @if ($product->discount > 0)
                                                <span class="special-price m-0"
                                                    id="price-offical">{{ number_format($product->discount) }}₫</span>
                                                <del class="old-price ml-2">{{ number_format($product->price) }}₫</del>
                                            @else
                                                <span class="special-price m-0"
                                                    id="price-offical">{{ number_format($product->price) }}₫</span>
                                            @endif

                                        </div>
                                    @endif
                                @else
                                    <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded mb-2">
                                        <span class="special-price m-0">Liên hệ</span>
                                    </div>
                                @endif
                                <div class="product-summary small mb-3">
                                    <p class=" py-2 px-3 rounded-10 m-0">
                                        {{ languageName($product->description) }}
                                    </p>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div id="o_sw_buy" class="mobile_open_box_swatch">
                                        <div class="d-flex align-items-start flex-column">
                                            <div class="product-control w-100">
                                           
                                                <script>
                                                    function formatNumber(num) {
                                                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                                                    }

                                                    function getValueVariant() {
                                                        var value = "";
                                                        var variant = @json($variant);
                                                        console.log(variant);
                                                        variant.forEach((element, key) => {
                                                            var t = document.querySelector('input[name="option-' + key + '"]:checked').value;
                                                            value += t + '-';
                                                        });
                                                        return value.substring(0, value.length - 1);
                                                    }

                                                    function renderVariant() {
                                                        var value_option = this.getValueVariant();
                                                        var id = {{ $product->id }};
                                                        jQuery.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });
                                                        jQuery.ajax({
                                                            url: "/get-variant.html",
                                                            method: "get",
                                                            data: {
                                                                'value': value_option,
                                                                'id': id
                                                            },
                                                            success: function(response) {
                                                                $("#price-offical").html(formatNumber(response.data.price) + '₫');
                                                                $("#price-send-car").val(response.data.price);
                                                            },
                                                        });
                                                    }
                                                </script>
                                                <div class="product-quantity d-sm-flex align-items-center clearfix">
                                                    <header class="font-weight-bold mb-2" style="min-width: 100px;">Số
                                                        lượng </header>
                                                    <div class="custom-btn-number form-inline border-0">
                                                        <button
                                                            class="mr-2 mb-2 border rounded bg-white justify-content-center align-items-center d-flex"
                                                            onclick="var result = document.getElementById('inputqty'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro > 1 ) result.value--;return false;"
                                                            type="button">
                                                            <svg width="12" height="12">
                                                                <use href="#svg-minus"></use>
                                                            </svg>
                                                        </button>
                                                        <button
                                                            class="mr-2 mb-2 border rounded bg-white justify-content-center align-items-center d-flex"
                                                            onclick="var result = document.getElementById('inputqty'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                            type="button">
                                                            <svg width="14" height="14">
                                                                <use href="#svg-plus"></use>
                                                            </svg>
                                                        </button>
                                                        <input type="number" name="quantity" min="1"
                                                            value="1"
                                                            class="form-control prd_quantity border rounded mb-2"
                                                            id="inputqty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            window.onload = renderVariant();
                                        </script>
                                        @if ($product->qty != null && $product->qty > 0)
                                        @else
                                            <span class="inventory_quantity" style="color: brown">Xin lỗi bạn! Sản phẩm
                                                này đã hết hàng!</span>
                                        @endif
                                        <div class="pt-2 pb-2 mb-2 d-flex gap_8 mxs_100">
                                            <button {{ $product->qty == 0 ? 'disabled' : '' }} type="button"
                                                onclick="shopnow({{ $product->id }},1,{{ json_encode($product->variant) }},{{ $product->status_variant }})"
                                                class=" btn d-flex w-100 justify-content-center flex-column align-items-center pt-2 pb-2 product-action_buynow position-relative">
                                                <span class="text-uppercase font-weight-bold">Đặt hàng ngay</span>
                                            </button>
                                            <button {{ $product->qty == 0 ? 'disabled' : '' }} type="button"
                                                onclick="addToCart({{ $product->id }},{{ json_encode($product->variant) }},{{ $product->status_variant }})"
                                                class="mb-lg-0 btn d-flex justify-content-center flex-column align-items-center p-2 product-action_buy font-weight-bold position-relative">
                                                <svg width="20" height="20">
                                                    <use href="#svg-shopping-cart" />
                                                </svg>
                                                <small class="ml-2 mr-2 button__text">Thêm vào giỏ</small>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 product-warp">
                                <div class="linehot_pro alert mb-3 d-flex align-items-center position-relative"
                                    style="background: #ac0306">
                                    <img class="mr-3 lazy" alt="{{ $setting->phone1 }}"
                                        src="{{ url('frontend/images/placeholder_1x1.png') }}"
                                        data-src="{{ url('frontend/images/customer-service.png') }}">
                                    <div class="b_cont font-weight-bold">

                                        <span class="d-block" style="color: white;">
                                            Gọi ngay <a style="color: white;" href="tel:{{ $setting->phone1 }}"
                                                title="{{ $setting->phone1 }}">{{ $setting->phone1 }}</a> để được tư vấn!
                                        </span>
                                    </div>
                                    <div class="uk-position-cover uk-padding-small title1__box1">
                                        <img class="uk-position-top-left"
                                            src="{{ url('frontend/images/icon_top_left.png') }}" alt="icon 1">
                                        <img class="uk-position-top-right"
                                            src="{{ url('frontend/images/icon_top_right.png') }}" alt="icon 2">
                                        <img class="uk-position-bottom-left"
                                            src="{{ url('frontend/images/icon_bottom_left.png') }}" alt="icon 3">
                                        <img class="uk-position-bottom-right"
                                            src="{{ url('frontend/images/icon_bottom_right.png') }}" alt="icon 4">
                                    </div>
                                </div>
                                <div class="product-info position-relative mb-3 p-2 border rounded-10">
                                    <span class="in_1">
                                        Tình trạng:
                                        @if ($product->qty != null && $product->qty > 0)
                                            <span class="inventory_quantity">Còn hàng</span>
                                        @else
                                            <span class="inventory_quantity" style="color: brown">Hết hàng</span>
                                        @endif
                                    </span>
                                    <div class="in_1">
                                        Danh mục: <span id="vendor">{{ languageName($product->cate->name) }}</span>
                                    </div>
                                </div>
                                <div class="m_giftbox mb-3">
                                    <fieldset class="free-gifts p-3 pb-4 pb-md-3 rounded position-relative">
                                        <legend class="d-inline-block pl-3 pr-3 mb-0">
                                            <img alt="Khuyến mãi" src="{{ url('frontend/images/gift.gif') }}"> Khuyến mãi
                                        </legend>
                                        <div class="row">
                                            @foreach ($khuyenmai as $item)
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                                    <div class="item line_b pb-2 ">
                                                        <span class="mb-2 d-block"><img
                                                                src="https://shopfront-cdn.tekoapis.com/cart/gift-filled.png"
                                                                height="15" width="15">
                                                            {{ $item->detail }}</small>
                                                            {{-- <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block" data-copy="MewMobile2022">
                                    Sao chép
                                    </button> --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="position-absolute vmore_c w-100 d-md-none">
                                                <a href="javascript:;"
                                                    class="d-block v_more_coupon text-center font-weight-bold">
                                                    <span class="t1">Xem thêm mã ưu đãi</span>
                                                    <span class="t1 d-none">Thu gọn</span>
                                                </a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-12 order-lg-1">
                                <div class="p-2 box_shadow rounded-10 modal-open pl-lg-3 pr-lg-3 mb-3">
                                    <h3 class="special-content_title font-weight-bold d-block w-100 pt-2 pb-2 mb-0">Thông
                                        tin chi tiết</h3>
                                    <div class="product-content pt-2 pb-2 mewcontent">
                                        <div class="content_coll position-relative rte">
                                            {!! languageName($product->content) !!}
                                        </div>
                                        <div class="view_mores text-center mb-2">
                                            <a href="javascript:;"
                                                class="one pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold"
                                                title="Xem tất cả">Xem tất cả <img class="m_more"
                                                    src="https://bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1679041868937"
                                                    alt="Xem tất cả"></a>
                                            <a href="javascript:;"
                                                class="two pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold d-none"
                                                title="Thu gọn">Thu gọn <img class="m_less"
                                                    src="https://bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1679041868937"
                                                    alt="Thu gọn"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m_product p-2 box_shadow rounded-10 modal-open pl-lg-3 pr-lg-3">
                                    <h3 class="special-content_title pb-2 pt-2 font-weight-bold position-relative mb-1">
                                        <a class="position-relative" href="/goi-y-cho-ban" title="Sản phẩm liên quan">Sản
                                            phẩm liên quan</a>
                                        <span class="swiper-button-prev mre_prev"></span>
                                        <span class="swiper-button-next mre_next"></span>
                                    </h3>
                                    <div class="b_product p-1 swiper-container position-relative relate">
                                        <div class="swiper-wrapper">
                                            @foreach ($productlq as $item)
                                                <div class="swiper-slide">
                                                    <div class="product-item position-relative p-2 border rounded h-100">
                                                        <div class="row">
                                                            <div class="col-4 pr-0">
                                                                @if ($item->discount > 0)
                                                                    <div
                                                                        class="sale-label sale-top-right position-absolute">
                                                                        <span class="font-weight-bold">-
                                                                            {{ 100 - ceil(($item->discount / $item->price) * 100) }}%
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                                <a href="{{ route('detailProduct', ['cate' => $item->cate_slug, 'type' => $item->type_slug ? $item->type_slug : 'loai', 'id' => $item->slug]) }}"
                                                                    class="thumb d-block modal-open"
                                                                    title="{{ $item->name }}">
                                                                    <div
                                                                        class="position-relative w-100 m-0 ratio1by1 has-edge aspect zoom">
                                                                        <img src="{{ url('frontend/images/placeholder_1x1.png') }}"
                                                                            data-src="{{ json_decode($item->images)[0] }}"
                                                                            decoding="async"
                                                                            class="d-block img img-cover position-absolute lazy"
                                                                            alt="{{ $item->name }}">
                                                                    </div>
                                                                    <div
                                                                        style="position:absolute;top:-10px;left:10px;width:60px;height:60px;z-index:999;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                                                        <img src="{{ $setting->logo }}" alt="Logo"
                                                                            style="width:60px;height:60px;object-fit:contain;"
                                                                            onerror="this.style.display='none'">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="item-info col-7 small">
                                                                <h3 class="item-title font-weight-bold">
                                                                    <a class="d-block modal-open"
                                                                        href="{{ route('detailProduct', ['cate' => $item->cate_slug, 'type' => $item->type_slug ? $item->type_slug : 'loai', 'id' => $item->slug]) }}"
                                                                        title="{{ $item->name }}">
                                                                        {{ $item->name }}
                                                                    </a>
                                                                </h3>
                                                                <div class="item-price mb-1">
                                                                    @if ($item->price > 0)
                                                                        @if ($item->status_variant == 1)
                                                                            <span
                                                                                class="special-price font-weight-bold">{{ get_price_variant($item->id) }}₫</span>
                                                                            <del class="old-price">
                                                                                {{ number_format($item->price) }}₫</del>
                                                                        @else
                                                                            <span
                                                                                class="special-price font-weight-bold">{{ number_format($item->discount) }}₫</span>
                                                                            <del class="old-price">
                                                                                {{ number_format($item->price) }}₫</del>
                                                                        @endif
                                                                    @else
                                                                        <span class="special-price font-weight-bold">Liên
                                                                            hệ</span>
                                                                    @endif
                                                                </div>
                                                                {{-- <label class="compare-label position-relative d-flex align-items-center m-0" onclick="compareProduct({{$item->id}})">
                                          <input type="checkbox" class="compare-checkbox d-none" {{checkExistCompare($item->id) == true ? "checked" : "" }} value=""{{$item->id}}" data-type="{{$item->id}}"> 
                                          <span class="compare-checkbox mr-1 rounded-circle" ></span>
                                          So sánh
                                          </label> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    window.addEventListener('DOMContentLoaded', (event) => {
                                        var swiperRelateProduct = new Swiper('.b_product', {
                                            spaceBetween: 10,
                                            loop: false,
                                            speed: 1000,
                                            navigation: {
                                                nextEl: '.mre_next',
                                                prevEl: '.mre_prev',
                                            },
                                            slidesPerColumnFill: 'row',
                                            slidesPerColumn: 2,
                                            breakpoints: {
                                                320: {
                                                    slidesPerView: 1
                                                },
                                                576: {
                                                    slidesPerView: 1
                                                },
                                                768: {
                                                    slidesPerView: 1
                                                },
                                                992: {
                                                    slidesPerView: 2
                                                },
                                                1200: {
                                                    slidesPerView: 3
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="modal fade" id="specModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content modal-open rounded-10">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Thông số kỹ thuật</h5>
                        <button type="button" class="btn btn-close rounded-10" data-bs-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body max-height-popup">
                        <div class="special-content">
                            <table border="1" cellpadding="1" cellspacing="1" class="table table-striped">
                                <tbody>
                                    @foreach ($thongsokythuat as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->detail }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
