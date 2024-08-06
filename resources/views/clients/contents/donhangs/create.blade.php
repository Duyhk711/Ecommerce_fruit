@extends('layouts.clientShop')

@section('css')
@endsection

@section('content')
    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner  ">
                        <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5>Returning customer? <a class="ltn__secondary-color" href="#ltn__returning-customer-login"
                                    data-bs-toggle="collapse">Click here to login</a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p>Please login your accont.</p>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__name" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="ltn__email"
                                                        placeholder="Enter email address">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                        <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember
                                            me</label>
                                        <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code"
                                    data-bs-toggle="collapse">Click here to enter your code</a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <form action="#">
                                        <input type="text" name="coupon-code" placeholder="Coupon code">
                                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <form action="{{ route('clients.donhangs.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="ltn__checkout-single-content mt-50 col-lg-6">
                                <h4 class="title-2">Billing Details</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <h6>Personal Information</h6>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" id="ten_nguoi_nhan" class="required"
                                                    name="ten_nguoi_nhan" placeholder="Tên người nhận"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            @error('ten_nguoi_nhan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" id="email_nguoi_nhan"
                                                    value="{{ Auth::user()->email }}" name="email_nguoi_nhan"
                                                    placeholder="Email người nhận">
                                            </div>
                                            @error('email_nguoi_nhan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="so_dien_thoai_nguoi_nhan"
                                                    placeholder="Số điện thoại người nhận"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            @error('so_dien_thoai_nguoi_nhan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item input-item-address ltn__custom-icon">
                                                <input type="text" name="dia_chi_nguoi_nhan"
                                                    value="{{ Auth::user()->address }}" placeholder="Địa chỉ người nhận">
                                            </div>
                                            @error('dia_chi_nguoi_nhan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="ghi_chu" placeholder="Nhập ghi chú..."></textarea>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <div class=" mt-50">
                                        <h4 class="title-2">Cart Totals</h4>
                                        <table class="table">
                                            <tbody>
                                                @foreach ($carts as $key => $item)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('clients.detailProduct', $key) }}">
                                                                {{ $item['ten_san_pham'] }} </a>
                                                            <strong>× {{ $item['so_luong'] }}</strong>
                                                        </td>

                                                        <td>{{ number_format($item['gia'] * $item['so_luong'], 0, ',', '.') }}đ
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td>
                                                        {{ number_format($subTotal, 0, ',', '.') }}đ
                                                        <input type="hidden" name="tien_hang" value="{{ $subTotal }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping</td>
                                                    <td>
                                                        {{ number_format($shipping, 0, ',', '.') }}đ
                                                        <input type="hidden" name="tien_ship" value="{{ $shipping }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Order Total</strong></td>
                                                    <td>
                                                        <strong class="text-danger">
                                                            {{ number_format($total, 0, ',', '.') }}đ
                                                            <input type="hidden" name="tong_tien"
                                                                value="{{ $total }}">
                                                        </strong>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                        <div class="ltn__checkout-payment-method mt-50 ">
                                            <h4 class="title-2"></h4>
                                            <div id="checkout_accordion_1">
                                                <!-- card -->
                                                <div class="card">
                                                    <h5 class="ltn__card-title" data-bs-toggle="collapse"
                                                        data-bs-target="#faq-item-2-2" aria-expanded="true">
                                                        Thanh toán bằng tiền mặt
                                                    </h5>
                                                    <div id="faq-item-2-2" class="collapse show"
                                                        data-parent="#checkout_accordion_1">
                                                        <div class="card-body">
                                                            <p>Trả tiền sau khi nhận hàng.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase mt-3"
                                                    type="submit">Place order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
@endsection

@section('js')
@endsection
