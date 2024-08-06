@section('content')
<div class="row">
   <div class="col-lg-12">
       <div class="section-title-area ltn__section-title-2 text-center">
           <h1 class="section-title">Our Products</h1>
       </div>
       <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
           <div class="nav">
               <a class="active show" data-bs-toggle="tab" href="#liton_tab_3_1">News</a>
               <a data-bs-toggle="tab" href="#liton_tab_3_2" class="">Hot</a>
               <a data-bs-toggle="tab" href="#liton_tab_3_3" class="">Favourite</a>
               <a data-bs-toggle="tab" href="#liton_tab_3_4" class="">Bestseller</a>
              
           </div>
       </div>
       <div class="tab-content">
           <div class="tab-pane fade active show" id="liton_tab_3_1">
               <div class="ltn__product-tab-content-inner">


                <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                    {{-- start --}}
                    @foreach ($newProducts as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="product-details.html"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                <i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{route('clients.detailProduct', $item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                <div class="product-price">
                                    <span>${{$item->gia_san_pham}}</span>
                                    <del>${{$item->gia_khuyen_mai}}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                       
                    
               </div>
           </div>
           </div>

           {{--  --}}
           <div class="tab-pane fade" id="liton_tab_3_2">
               <div class="ltn__product-tab-content-inner">

                {{--  --}}
                   <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                       <!-- ltn__product-item -->
                       @foreach ($hotProducts as $item)
                       <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                           <div class="ltn__product-item ltn__product-item-3 text-center">
                               <div class="product-img">
                                   <a href="product-details.html"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                   <div class="product-badge">
                                       <ul>
                                           <li class="sale-badge">New</li>
                                       </ul>
                                   </div>
                                   <div class="product-hover-action">
                                       <ul>
                                           <li>
                                               <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                   <i class="far fa-eye"></i>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                   <i class="fas fa-shopping-cart"></i>
                                               </a>
                                           </li>
                                           <li>
                                               <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                   <i class="far fa-heart"></i></a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="product-info">
                                   <div class="product-ratting">
                                       <ul>
                                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                                           <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                           <li><a href="#"><i class="far fa-star"></i></a></li>
                                       </ul>
                                   </div>
                                   <h2 class="product-title"><a href="{{route('clients.detailProduct', $item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                   <div class="product-price">
                                       <span>${{$item->gia_san_pham}}</span>
                                       <del>${{$item->gia_khuyen_mai}}</del>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @endforeach
                          
                       <!--  -->
                   </div>
               </div>
           </div>
           <div class="tab-pane fade" id="liton_tab_3_3">
               <div class="ltn__product-tab-content-inner">
                <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                    {{-- start --}}
                    @foreach ($manyViews as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="product-details.html"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                <i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{route('clients.detailProduct', $item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                <div class="product-price">
                                    <span>${{$item->gia_san_pham}}</span>
                                    <del>${{$item->gia_khuyen_mai}}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                       
               </div>
               </div>
           </div>
           <div class="tab-pane fade" id="liton_tab_3_4">
               <div class="ltn__product-tab-content-inner">
                {{--  --}}
                <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                    {{-- start --}}
                    @foreach ($hotdealProducts as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="product-details.html"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                <i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{route('clients.detailProduct', $item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                <div class="product-price">
                                    <span>${{$item->gia_san_pham}}</span>
                                    <del>${{$item->gia_khuyen_mai}}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                       
                    
               </div>
                   {{--  --}}
               </div>
           </div>
           <div class="tab-pane fade" id="liton_tab_3_5">
               <div class="ltn__product-tab-content-inner">
                {{--  --}}
                
                {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
@section('content2')
<div class="row">
   <div class="col-lg-12">
       <div class="section-title-area ltn__section-title-2 text-center">
           <h1 class="section-title">Featured Products</h1>
       </div>
   </div>
</div>

<div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
{{-- start --}}
@foreach ($dataSanPham as $item)
<div class="col-lg-3 col-md-4 col-sm-6 col-6">
    <div class="ltn__product-item ltn__product-item-3 text-center">
        <div class="product-img">
            <a href="product-details.html"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
            <div class="product-badge">
                <ul>
                    <li class="sale-badge">New</li>
                </ul>
            </div>
            <div class="product-hover-action">
                <ul>
                    <li>
                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                            <i class="far fa-eye"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                            <i class="far fa-heart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-info">
            <div class="product-ratting">
                <ul>
                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                    <li><a href="#"><i class="far fa-star"></i></a></li>
                </ul>
            </div>
            <h2 class="product-title"><a href="{{route('clients.detailProduct', $item->id)}}">{{$item->ten_san_pham}}</a></h2>
            <div class="product-price">
                <span>${{$item->gia_san_pham}}</span>
                <del>${{$item->gia_khuyen_mai}}</del>
            </div>
        </div>
    </div>
</div>
@endforeach
   
   {{-- end --}}
 </div> 


@endsection
