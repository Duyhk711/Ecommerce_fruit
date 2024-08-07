@extends('layouts.clientShop')
@section('content')
<div class="ltn__product-area ltn__product-gutter mb-120">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">
                 <div class="ltn__shop-options">
                     <ul>
                         <li>
                             <div class="ltn__grid-list-tab-menu ">
                                 <div class="nav">
                                     <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                     <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li>
                            <div class="showing-product-number text-right text-end">
                                 <span>Showing 1–12 of 18 results</span>
                             </div> 
                         </li>
                         <li>
                            <div class="short-by text-center">
                                <form action="{{route('clients.shop')}}" method="GET">
                                    <div class="input-group">
                                        <select class="nice-select" name="filter">
                                            <option value="" >--Lọc Sản Phẩm--</option>
                                            <option value="new" {{request('filter') == 'new' ? 'selected' : ''}}>Sản Phẩm Mới</option>
                                            <option value="hot" {{request('filter') == 'hot' ? 'selected' : ''}}>Sản Phẩm Đang Hot</option>
                                            <option value="hot_deal" {{request('filter') == 'hot_deal' ? 'selected' : ''}}>Sản Phẩm Khuyến mại</option>
                                            <option value="hot_deal" {{request('filter') == 'favorite' ? 'selected' : ''}}>Sản Phẩm Yêu Thích</option>
                                            <option value="hot_deal" {{request('filter') == 'best_seller' ? 'selected' : ''}}>Sản Phẩm Bán Chạy</option>
                                        </select>
                                   <button type="submit" style="border: none; background:none "><i class="fa fa-rgb fa-filter"></i></button>
                                </div>   
                                </form>
                             </div> 
                         </li>
                     </ul>
                 </div>
                 <div class="tab-content">
                     <div class="tab-pane fade active show" id="liton_product_grid">
                         <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                             <div class="row">
                                 <!-- ltn__product-item -->
                                 @foreach ($sanPham as $item)
                                    <div class="col-xl-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="{{route('clients.detailProduct',$item->id)}}"><img src="{{Storage::url($item->hinh_anh)}}" height="200px" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        @if ($item->so_luong == 0)
                                                            <li class="sale-badge">Hết hàng</li>
                                                        @else
                                                            @if ($item->is_new)
                                                                <li class="sale-badge">New</li>
                                                            @elseif ($item->is_hot)
                                                                <li class="sale-badge">Hot</li>
                                                            @elseif ($item->is_hot_deal)
                                                                <li class="sale-badge">Hot Deal</li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('clients.detailProduct',$item->id)}}" >
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{route('clients.cart.add')}}" method="POST" onsubmit="return checkSoLuong({{ $item->so_luong }})">
                                                                @csrf
                                                                <input type="hidden" name="qtybutton" value="1">
                                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                                <button type="submit" style="background: none; border: none" >
                                                                    
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    
                                                                </button>
                                                            </form>
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
                                                        @php
                                                            $danhGiaTrungBinh = $item->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
                                                        @endphp
                                                        @if ($danhGiaTrungBinh)
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="{{ $i <= $danhGiaTrungBinh ? 'fas' : 'far' }} fa-star"></i>
                                                                    </a>
                                                                </li>
                                                            @endfor
                                                        @else
                                                            <span>Chưa có đánh giá</span>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <h2 class="product-title"><a href="{{route('clients.detailProduct',$item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                                <div class="product-price">
                                                    @if ($item->gia_khuyen_mai == 0)
                                                        <span>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</span>
                                                    @else
                                                        <span>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }}đ</span>
                                                        <del>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                     <div class="tab-pane fade" id="liton_product_list">
                         <div class="ltn__product-tab-content-inner ltn__product-list-view">
                             <div class="row">
                                 <!-- ltn__product-item -->
                                  @foreach ($sanPham as $item)
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3">
                                            <div class="product-img">
                                                <a href="{{route('clients.detailProduct',$item->id)}}"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">{{$item->is_new == 1 ? 'New' : ''}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        @php
                                                            $danhGiaTrungBinh = $item->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
                                                        @endphp
                                                        @if ($danhGiaTrungBinh)
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="{{ $i <= $danhGiaTrungBinh ? 'fas' : 'far' }} fa-star"></i>
                                                                    </a>
                                                                </li>
                                                            @endfor
                                                        @else
                                                            <span>Chưa có đánh giá</span>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <h2 class="product-title"><a href="{{route('clients.detailProduct',$item->id)}}">{{$item->ten_san_pham}}</a></h2>
                                                
                                                <div class="product-price">
                                                    @if ($item->gia_khuyen_mai == 0)
                                                        <span>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</span>
                                                    @else
                                                        <span>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }}đ</span>
                                                        <del>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</del>
                                                    @endif
                                                </div>
                                                <div class="product-brief">
                                                    <p>{{$item->mo_ta_ngan}}</p>

                                                    </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('clients.detailProduct',$item->id)}}" >
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{route('clients.cart.add')}}" method="POST" onsubmit="return checkSoLuong({{ $item->so_luong }})">
                                                                @csrf
                                                                <input type="hidden" name="qtybutton" value="1">
                                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                                <button type="submit" style="background: none; border: none" >
                                                                    
                                                                        <i class="fas fa-shopping-cart"></i> 
                                                                    
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="ltn__pagination-area text-center">
                     <div class="">      
                             {{$sanPham->links('pagination::bootstrap-5')}}
                     </div>
                 </div>
             </div>
             <div class="col-lg-4">
                 <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                     <!-- Category Widget -->
                     <div class="widget ltn__menu-widget">
                         <h4 class="ltn__widget-title ltn__widget-title-border">Danh mục sản phẩm</h4>
                        <ul>
                            @foreach ($danhmucs as $item)
                                <li><a href="{{route('clients.product',$item->id)}}">{{$item->ten_danh_muc}} <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            @endforeach
                        </ul>
                     </div>
                     <!-- Search Widget -->
                     <div class="widget ltn__search-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                        <form action="" method="GET">
                            <input type="text" name="search" value="{{request('search')}}" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    
                     
                     <!-- Top Rated Product Widget -->
                     <div class="widget ltn__top-rated-product-widget">
                         <h4 class="ltn__widget-title ltn__widget-title-border">Sản phẩm có đánh giá tốt</h4>
                         <ul>
                            @foreach ($sanPham as $item)
                             <li>
                                 <div class="top-rated-product-item clearfix">
                                     <div class="top-rated-product-img">
                                         <a href="{{route('clients.detailProduct',$item->id)}}"><img src="{{Storage::url($item->hinh_anh)}}" alt="#"></a>
                                     </div>
                                     <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                @php
                                                    $danhGiaTrungBinh = $item->binhLuans->whereNotNull('danh_gia')->avg('danh_gia');
                                                @endphp
                                                @if ($danhGiaTrungBinh)
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li>
                                                            <a href="#">
                                                                <i class="{{ $i <= $danhGiaTrungBinh ? 'fas' : 'far' }} fa-star"></i>
                                                            </a>
                                                        </li>
                                                    @endfor
                                                @else
                                                    <span>Chưa có đánh giá</span>
                                                @endif
                                            </ul>
                                        </div>
                                         <h6><a href="{{route('clients.detailProduct',$item->id)}}">{{$item->ten_san_pham}}</a></h6>
                                         <div class="product-price">
                                            @if ($item->gia_khuyen_mai == 0)
                                                <span>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</span>
                                            @else
                                                <span>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }}đ</span>
                                                <del>{{ number_format($item->gia_san_pham, 0, ',', '.') }}đ</del>
                                            @endif
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             @endforeach
                         </ul>
                     </div>
                     
                     
                 </aside>
             </div>
         </div>
     </div>
 </div>
    
@endsection

@section('js')
    <script>
        function checkSoLuong(soLuong) {
            // Kiểm tra số lượng hàng tồn kho
            if (soLuong > 0) {
                return true;  // Cho phép gửi biểu mẫu
            } else {
                alert('Không còn hàng trong kho.');
                return false; // Ngăn gửi biểu mẫu
            }
        }
    </script>
@endsection