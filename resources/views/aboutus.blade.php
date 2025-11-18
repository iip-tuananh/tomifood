@extends('layouts.main.master')
@section('title')
Về Chúng Tôi
@endsection
@section('description')
{{$setting->company}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="contentWarp ">
   <section class="col2-right-layout" itemscope="" itemtype="http://schema.org/Article">
      <div class="main container blogs">
         <div class="col-main art_container mt-3 mb-3">
            <div class="rounded">
               <div class="row">
                  <div class="container">
                     <div >
                        <div class="b_blog row pt-2">
                           <div class="col-12 col-md-6">
                                <div class="img-about">
                                 <img src="{{$gioithieu->image}}" alt="">
                                </div>
                           </div>
                           <div class="col-12 col-md-6" style="margin:auto">
                              <h1>{{$setting->company}}</h1>
                              <div class="line_14">
                                 {!!($gioithieu->content)!!}
                              </div>
                              <a class="btn btn-success" href="">Đọc thêm</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container mt-3 mb-3 ">
         <div class="col-main rounded p-lg-3 pl-2 pr-2 pb-3">
                <article>
                  <div class="grid_article">
                     <div class="row">
                        @foreach ($pageContent as $item)
                           @if ($item->type = 've-chung-toi' && $item->slug != 'gioi-thieu')
                           <div class="col-12 col-sm-6 col-md-6 col-lg-3 its">
                              <div class="custom-article-item border mb-1 modal-open rounded-10">
                                 <a href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}" class="effect-ming">
                                    <div class="position-relative w-100 m-0 be_opa modal-open ratio3by2 aspect ">
                                       <img src="{{$item->image}}" data-src="{{$item->image}}" class="lazy d-block img img-cover position-absolute loaded" alt="{{$item->title}}">
                                    </div>
                                 </a>
                                 <div class="custom-article-item_info text-center">
                                    <div class="tags d-flex list-unstyled mb-1">
                                    </div>
                                    <h3 class="title_blo font-weight-bold mb-2"><a class="line_2" href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a></h3>
                                 </div>
                              </div>
                           </div>
                           @endif
                        @endforeach
                        </div>
                  </div>
               </article>
         </div>
      </div>
   </section>
</div>
@endsection