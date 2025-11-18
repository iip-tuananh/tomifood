</div>
<!-- Hiệu ứng ánh sáng bóng loáng góc phải cho logo -->
<style>
.hieuung {
    position: relative;
    z-index: 1;
}
.hieuung::after {
    content: '';
    position: absolute;
    top: 0;
    right: -60%;
    width: 60%;
    height: 100%;
    pointer-events: none;
    background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.7) 60%, rgba(255,255,255,0) 100%);
    transform: skewX(-25deg);
    animation: shine-right 2.5s infinite;
    z-index: 2;
}
@keyframes shine-right {
    0% {
        right: -60%;
    }
    60% {
        right: 100%;
    }
    100% {
        right: 100%;
    }
}
</style>
<footer class="pt-5" style="background-image: url(&quot;https://quaqueviet.vn/includehome/images/bg_f.png&quot;);background-repeat: repeat-x;">
   <div class="foo_mid mb-4">
       <div class="container">
           <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 footer-left">
                   <a href="{{route('home')}}" title="{{$setting->company}}" class="logo_foo d-block mb-2">
                       <img alt="Logo {{$setting->company}}" class="lazy hieuung"
                           src="{{url('frontend/images/placeholder_1x1.png')}}"
                           data-src="{{$setting->logo_footer}}">
                
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 footer-left">
              
                   <address class="vcard mb-4">
                    
                       <p class="adr"><b>Cơ sở 1: </b>{{$setting->address1}}</p>
                       @if ($setting->address2 != null)
                           
                       
                           <p class="adr"><b>Cơ sở 2: </b>{{$setting->address2}}</p>
                           
                       @endif
                  
                  
                       <p><b>Email: </b><a href="mailto:{{$setting->email}}"
                               title="{{$setting->email}}">{{$setting->email}}</a></p>
                       <p><b>Hotline: </b><a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">{{$setting->phone1}}</a></p>
                   </address>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left">
                   <h3 class="footer-title mb-2 position-relative font-weight-bold">Chính Sách Và Dịch Vụ</h3>
                   <ul class="links">
                    @foreach ($pageContent as $item)
                        @if ($item->type == 'ho-tro-khanh-hang')
                        <li>
                            <a href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a>
                        </li>
                        @endif
                    @endforeach
                   </ul>
                   <h3 class="footer-title mb-2 position-relative font-weight-bold">Kết Nối Với Chúng
                    Tôi</h3>
                <div class="social position-relative pb-2">
                    <a href="{{$setting->facebook}}" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block facebook mr-1"
                        title="Facebook">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/facebook.png?1676652384879"
                            alt="facebook" width=32 height=32>
                    </a>
                    <a href="#" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block twitter mr-1"
                        title="Twitter">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/twitter.png?1676652384879"
                            alt="twitter" width=32 height=32>
                    </a>
                    <a href="#" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block instagram mr-1"
                        title="Instagram+">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/instagram.png?1676652384879"
                            alt="instagram" width=32 height=32>
                    </a>
                    <a href="#" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block youtube mr-1"
                        title="Youtube">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/youtube.png?1676652384879"
                            alt="youtube" width=32 height=32>
                    </a>
                    <a href="#" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block shopee mr-1"
                        title="Shopee">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/shopee.png?1676652384879"
                            alt="Shopee" width=32 height=32>
                    </a>
                    <a href="#" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block lazada mr-1"
                        title="Lazada">
                        <img class="lazy"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/lazada.jpg?1676652384879"
                            alt="Lazada" width=32 height=32>
                    </a>
                </div>
                   
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left">
                   <h3 class="footer-title mb-2 position-relative font-weight-bold">Vị Trí</h3>
                   {!!$setting->iframe_map!!}
               </div>
           </div>
       </div>
   </div>
   <div class="foo_bot pt-2 pb-2 border-top">
       <div class="container">
           <div class="row bgk align-items-center">
               <div class="col-12">
                   <div class="coppyright">Bản quyền thuộc về <a rel="nofollow noopener"
                           href="" title="LTA DEV"
                           target="_blank">LTA DEV</a>. Cung cấp bởi <a
                           href=""
                           title="Sapo" target="_blank" rel="nofollow noopener">LTA DEV</a>.</div>
               </div>
           </div>
       </div>
   </div>
</footer>