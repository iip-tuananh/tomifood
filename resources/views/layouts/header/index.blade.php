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

<div class="menubar w-100 d-lg-none align-items-center scroll_down flex-tuan toan" style="background-color: #efe7e4; border-bottom: 1px solid #ddd; position: sticky; top: 0; z-index: 1000;">
    <div class="container-fluid">
        <div class="row align-items-center py-2">
            <!-- Icon Menu bên trái -->
            <div class="col-2 text-left">
                <a id="js-menu-toggle-top" href="javascript:;" title="Menu" class="d-inline-block">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
            </div>
            
            <!-- Logo ở giữa -->
            <div class="col-8 text-center">
                <a href="{{ route('home') }}" title="{{ $setting->company }}">
                    <img alt="{{ $setting->company }}" src="{{ $setting->logo }}" class="img-fluid" style="max-height: 40px;">
                </a>
            </div>
            
            <!-- Icons bên phải -->
            <div class="col-2 text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="tel:{{ $setting->phone1 }}" title="Hotline" class="mr-2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ac0306" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('listCart') }}" title="Giỏ hàng" class="position-relative">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ac0306" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        @if($qty > 0)
                        <span class="position-absolute" style="top: -8px; right: -8px; background: #ac0306; color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 10px; display: flex; align-items: center; justify-content: center; font-weight: bold;">{{ $qty }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
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
                      
                    </button>
                    {{-- <input type="submit" class="border-0 position-absolute p-0"> --}}
                    <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                        <div class="overflow-auto search-result-warpper">
                            <div class="searchResult_products"> </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-3 d-none d-lg-block flex-tuan anmobile">
                <div>

              
                <div class="logo-flip">
                    <a href="{{ route('home') }}" title="{{ $setting->company }}" class="logo latlai">
                        <img alt="{{ $setting->company }}" src="{{ $setting->logo }}" class="img-fluid img-logo-top anmobile">
                    </a>
                    <a href="{{ route('home') }}" title="{{ $setting->company }}" class="logo">
                        <img alt="{{ $setting->company }}" src="{{ $setting->logo_footer }}" class="img-fluid img-logo-top anmobile">
                    </a>
                </div>
<br>
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

<!-- Sidebar Menu Mobile -->
<div class="col-left position-fixed d-flex flex-column pt-0 pb-0 d-lg-none" id="col-left-mew" style="background: linear-gradient(135deg, #8B0000 0%, #DC143C 100%); width: 270px; height: 100vh; left: -270px; top: 0 !important; transition: left 0.3s ease; z-index: 9999;">
    <!-- Header Menu -->
    <div class="menu-header text-center py-3 border-bottom border-white" style="background: rgba(0,0,0,0.2);">
        <button id="close-menu-sidebar" class="btn btn-link text-white position-absolute" style="left: 10px; top: 10px; font-size: 24px; text-decoration: none; opacity: 1;">&times;</button>
        <img src="{{ $setting->logo_footer ?? $setting->logo }}" alt="{{ $setting->company }}" class="img-fluid" style="max-height: 50px;">
    </div>
    
    <div class="align-items-center menu_mobile h-100 position-relative">
        <ul id="" class="p-0 m-0 list-unstyled" style="background-color: #ac0306">
            <!-- Menu Item: Quà Tết -->
         

            <!-- Menu Item: Thẻ Giới Quà Tặng -->
          

            @foreach ($categoryhome as $item)
                <li class="menu-item border-bottom border-white">
                    @if (count($item->typeCate) > 0 || count($item->tagCate) > 0)
                        <a href="javascript:;" class="d-flex align-items-center justify-content-between text-white py-3 px-3 menu-toggle" style="text-decoration: none;" data-target="submenu-{{ $item->id }}">
                            <div class="d-flex align-items-center">
                                <div class="menu-icon mr-3" style="width: 40px; height: 40px;   display: flex; align-items: center; justify-content: center;">
                                    <img src="{{$item->avatar }}" alt="{{ languageName($item->name) }}" style="width: 40px; height: 40px; object-fit: contain; ">
                                </div>
                                <span class="font-weight-bold">{{ languageName($item->name) }}</span>
                            </div>
                            
                        </a>
                        <ul class="submenu list-unstyled m-0 p-0" id="submenu-{{ $item->id }}" style="display: none; background: rgba(0,0,0,0.2);">
                            @foreach ($item->typeCate as $type)
                                <li>
                                    <a href="{{ route('allListType', ['danhmuc' => $item->slug, 'loaidanhmuc' => $type->slug]) }}" 
                                       class="d-block text-white py-2 px-4 pl-5" style="text-decoration: none; font-size: 14px;">
                                        {{ languageName($type->name) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <a href="{{ route('allListProCate', ['danhmuc' => $item->slug]) }}" class="d-flex align-items-center text-white py-3 px-3" style="text-decoration: none;">
                            <div class="menu-icon mr-3" style="width: 40px; height: 40px;   display: flex; align-items: center; justify-content: center;">
                                <img src="{{ $item->avatar }}" alt="{{ languageName($item->name) }}" style="width: 40px; height: 40px; object-fit: contain; ">
                            </div>
                            <span class="font-weight-bold">{{ languageName($item->name) }}</span>
                        </a>
                    @endif
                </li>
            @endforeach

            <!-- Menu Item: BẢN TIN MỚI NGÀY -->
            <li class="menu-item border-bottom border-white" style="background-color: #ac0306">
                <a href="{{ route('allListBlog') }}" class="d-flex align-items-center text-white py-3 px-3" style="text-decoration: none;">
                    <div class="menu-icon mr-3" style="width: 35px; height: 35px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        </svg>
                    </div>
                    <span class="font-weight-bold">BẢN TIN MỚI</span>
                </a>
            </li>
              <li class="menu-item border-bottom border-white" style="background-color: #ac0306">
                <a href="{{ route('aboutUs') }}" class="d-flex align-items-center text-white py-3 px-3" style="text-decoration: none;">
                    <div class="menu-icon mr-3" style="width: 35px; height: 35px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        </svg>
                    </div>
                    <span class="font-weight-bold">Về chúng tôi</span>
                </a>
            </li>
        </ul>

        <!-- Social Icons -->
        <div class="social-links text-center py-4 mt-auto border-top border-white" style="background-color: #ac0306">
            <a href="{{ $setting->facebook }}" target="_blank" class="text-white mx-2" style="font-size: 24px;">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
                </svg>
            </a>
            <a href="#" target="_blank" class="text-white mx-2" style="font-size: 24px;">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/>
                </svg>
            </a>
            <a href="#" target="_blank" class="text-white mx-2" style="font-size: 24px;">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M10 15l5.19-3L10 9v6m11.56-7.83c.13.47.22 1.1.28 1.9.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83-.25.9-.83 1.48-1.73 1.73-.47.13-1.33.22-2.65.28-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44-.9-.25-1.48-.83-1.73-1.73-.13-.47-.22-1.1-.28-1.9-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83.25-.9.83-1.48 1.73-1.73.47-.13 1.33-.22 2.65-.28 1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44.9.25 1.48.83 1.73 1.73z"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
#col-left-mew.active {
    left: 0 !important;
}

#col-left-mew .menu-item:hover {
    background: rgba(0,0,0,0.2);
}

#col-left-mew .submenu a:hover {
    background: rgba(0,0,0,0.3);
}

#col-left-mew::-webkit-scrollbar {
    width: 5px;
}

#col-left-mew::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.2);
}

#col-left-mew::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.3);
    border-radius: 5px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle submenu
    document.querySelectorAll('.menu-toggle').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');
            const submenu = document.getElementById(targetId);
            const arrow = this.querySelector('.arrow-icon');
            
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
                arrow.style.transform = 'rotate(90deg)';
            } else {
                submenu.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            }
        });
    });

    // Close menu sidebar
    const closeBtn = document.getElementById('close-menu-sidebar');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            document.getElementById('col-left-mew').classList.remove('active');
            document.getElementById('body_overlay').classList.add('d-none');
            document.querySelector('body').classList.remove('modal-open');
        });
    }
});
</script>

<div class="mew_mobi_bar d-lg-none position-fixed d-flex">
    <a id="js-menu-toggle" href="javascript:;" title="Danh mục"
        class="item align-content-center d-flex flex-column h-100 justify-content-center">
        <svg width="20" height="20">
            <use href="#svg-menu" />
        </svg>
        <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Danh mục</span>
    </a>
    <a href="{{ route('allListBlog') }}" title="Tin Tức"
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
