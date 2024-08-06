@extends('layouts.clientShop')

@section('css')
<style>
    .ltn__shop-details-tab-content-inner img {
        max-width: 100px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

@endsection

@section('content')
<div class="ltn__shop-details-area pb-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="ltn__shop-details-inner mb-60">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery">
                                <div class="ltn__shop-details-large-img">
                                    <div class="single-large-img">
                                        <a href="{{ Storage::url($sanPham->hinh_anh) }}" data-rel="lightcase:myCollection">
                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="Image" height="400px" width="500px">
                                        </a>
                                    </div>
                                    @foreach ($sanPham->hinhAnhSanPhams as $image)
                                    <div class="single-large-img">
                                        <a href="{{ Storage::url($image->hinh_anh) }}" data-rel="lightcase:myCollection">
                                            <img src="{{ Storage::url($image->hinh_anh) }}" alt="Image">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    <div class="single-small-img">
                                        <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="Image" height="50px">
                                    </div>
                                    @foreach ($sanPham->hinhAnhSanPhams as $image)
                                    <div class="single-small-img">
                                        <img src="{{ Storage::url($image->hinh_anh) }}" height="50px" alt="Image">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <div class="product-ratting">
                                    <ul>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li>
                                                <a href="#">
                                                    <i class="{{ $i <= $danhGiaTrungBinh ? 'fas' : 'far' }} fa-star"></i>
                                                </a>
                                            </li>
                                        @endfor
                                        <li class="review-total"> <a href="#"> ( {{ $sanPham->luot_xem }} lượt xem )</a></li>
                                    </ul>
                                </div>
                                <h3>{{ $sanPham->ten_san_pham }} - {{ $sanPham->ma_san_pham }}</h3>
                                <div class="product-price">
                                    <span>{{ number_format($sanPham->gia_khuyen_mai, 0, ',', '.') }}đ</span>
                                    <del>{{ number_format($sanPham->gia_san_pham, 0, ',', '.') }}đ</del>
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1">
                                    <b>Mô tả ngắn:</b> <br>
                                    <p>{{ $sanPham->mo_ta_ngan }}</p>
                                </div>

                                <form action="{{ route('clients.cart.add') }}" method="POST" onsubmit="return checkSoLuong({{ $sanPham->so_luong }})">
                                    @csrf
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1" name="qtybutton" id="quantityInput" class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                                            <li>
                                                <button class="theme-btn-1 btn btn-effect-1" type="submit">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>ADD TO CART</span>
                                                </button>
                                </form>
                                </li>
                                </ul>
                            </div>
                            <div class="ltn__product-details-menu-3">
                                <ul>
                                    <li>
                                        <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i>
                                            <span>Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="fas fa-exchange-alt"></i>
                                            <span>Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="ltn__social-media">
                                <ul>
                                    <li>Share:</li>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Tab Start -->
            <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                <div class="ltn__shop-details-tab-menu">
                    <div class="nav">
                        <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                        <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                        <div class="ltn__shop-details-tab-content-inner">
                            {!! $sanPham->noi_dung !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_details_1_2">
                        <div class="ltn__shop-details-tab-content-inner">
                            <h4 class="title-2">Customer Reviews</h4>
                            <div class="product-ratting">
                                <ul>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li>
                                            <a href="#">
                                                <i class="{{ $i <= $danhGiaTrungBinh ? 'fas' : 'far' }} fa-star"></i>
                                            </a>
                                        </li>
                                    @endfor
                                    <li class="review-total"> <a href="#"> ( {{ $sanPham->luot_xem }} lượt xem )</a></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @foreach ($sanPham->binhLuans as $comment)
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="{{ asset('assets/clients/img/icons/user.jpg') }}" width="70px" alt="Default User Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6 class="pt-2"><a href="#">{{ $comment->user->name }}</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            @if ($comment->danh_gia)
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="{{ $i <= $comment->danh_gia ? 'fas' : 'far' }} fa-star"></i>
                                                                    </a>
                                                                </li>
                                                                @endfor
                                                            @else
                                                                <p>Không đánh giá</p>
                                                            @endif
                                                           
                                                        </ul>
                                                    </div>
                                                    <p>{{ $comment->noi_dung }}</p>
                                                    <span class="ltn__comment-reply-btn">{{ $comment->created_at->format('F j, Y') }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Comment Reply -->
                            @auth
                            @if (auth()->user()->daMua($sanPham->id))
                                <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                    <form action="{{ route('comments.store', $sanPham->id) }}" method="POST">
                                        @csrf
                                        <h4 class="title-2">Add a Review</h4>
                                        <div class="mb-30">
                                            <div class="add-a-review">
                                                <h6>Your Ratings:</h6>
                                                <div class="product-ratting">
                                                    <ul class="rating">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <li>
                                                                <input type="radio" id="star{{ $i }}" name="danh_gia" value="{{ $i }}">
                                                                <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <style>
                                            .rating {
                                                display: flex;
                                                flex-direction: row-reverse;
                                                justify-content: center;
                                            }
                        
                                            .rating > input {
                                                display: none;
                                            }
                        
                                            .rating > label {
                                                position: relative;
                                                width: 1em;
                                                font-size: 2rem;
                                                color: #FFD700;
                                                cursor: pointer;
                                                text-align: center;
                                            }
                        
                                            .rating > label::before {
                                                content: "\f005"; /* Unicode star character */
                                                font-family: "Font Awesome 5 Free";
                                                font-weight: 900;
                                                position: absolute;
                                                left: 0;
                                                right: 0;
                                                opacity: 0;
                                            }
                        
                                            .rating > label:hover::before,
                                            .rating > label:hover ~ label::before {
                                                opacity: 1;
                                            }
                        
                                            .rating > input:checked ~ label::before {
                                                opacity: 1;
                                            }
                        
                                            .rating > input:checked ~ label:hover::before,
                                            .rating > input:checked ~ label:hover ~ label::before,
                                            .rating > input:checked ~ label:hover ~ input:checked ~ label::before {
                                                opacity: 0.4;
                                            }
                                        </style>
                                        
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="binh_luan" placeholder="Type your comments...."></textarea>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <p>Bạn cần mua sản phẩm trước khi đánh giá.</p>
                            @endif
                        @endauth
                        @guest
                            <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận sản phẩm</p>
                        @endguest
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Tab End -->
        </div>
        <div class="col-lg-4">
            <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                <!-- Top Rated Product Widget -->
                <div class="widget ltn__top-rated-product-widget">
                    <h4 class="ltn__widget-title ltn__widget-title-border">Sản phẩm khác</h4>
                    <ul>
                        @foreach ($listSanPham as $item)
                        <li>
                            <div class="top-rated-product-item clearfix">
                                <div class="top-rated-product-img">
                                    <a href="{{ route('clients.detailProduct', $item->id) }}">
                                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="#" style="height: 100px">
                                    </a>
                                </div>
                                <div class="top-rated-product-info">
                                    <h6><a href="{{ route('clients.detailProduct', $item->id) }}">{{ $item->ten_san_pham }}</a></h6>
                                    <div class="product-price">
                                        <span>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }}đ</span>
                                        <del>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }}đ</del>
                                        <form action="{{ route('clients.cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="qtybutton" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <button style="height: 50px;" type="submit" class="btn theme-btn-1 btn-effect-1">
                                                <i class="fas fa-shopping-cart fa-lg" style="margin-bottom: 10px"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Banner Widget -->
                <div class="widget ltn__banner-widget">
                    <a href="shop.html"><img src="{{ asset('assets/clients/img/banner/2.jpg') }}" alt="#"></a>
                </div>
            </aside>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script>
    $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
    $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var $input = $button.parent().find('input');
        var oldValue = parseFloat($input.val());
        if ($button.hasClass('inc')) {
            var newVal = oldValue + 1;
        } else {
            if (oldValue > 1) {
                var newVal = oldValue - 1;
            } else {
                newVal = 1;
            }
        }
        $input.val(newVal);
    });
    
    var soLuongTonKho = {{ $sanPham->so_luong }};
    $('#quantityInput').on('change', function() {
        var value = parseInt($(this).val(), 10);
        if (isNaN(value) || value < 1) {
            alert('Số lượng phải lớn hơn bằng 1');
            $(this).val(1);
        }else if (value > soLuongTonKho) {
            // Kiểm tra nếu giá trị vượt quá số lượng hàng tồn kho
            alert('Số lượng sản phẩm không đủ');
            $(this).val(soLuongTonKho); // Đặt lại giá trị thành số lượng tồn kho
        }
    })
</script>


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
