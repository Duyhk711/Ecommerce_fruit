@extends('layouts.clientShop')
@section('css')
    <link rel="icon" href="{{ asset('assets/theme2/img/logo.png" type="image/png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/owl_carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/gijgo/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/tagsinput/tagsinput.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/scroll/scrollable.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/text_editor/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/morris/morris.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/vendors/material_icon/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/css/metisMenu.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/theme2/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/theme2/css/colors/default.css" id="colorSkinCSS') }}" />
@endsection

@section('content')
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table">
                        @if (session('error'))
                             <div class="alert text-danger m-2">{{ session('error') }}</div>
                            
                        @endif
                        <div class="row">
                            <div class="QA_section border-0">
                                <div class="card-body QA_table">
                                    <form action="{{route('clients.cart.update')}}" method="POST">
                                        @csrf
                                        <div class=" table-responsive shopping-cart container">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr class="row">
                                                        <th class="col-lg-5">Sản phẩm</th>
                                                        <th class="col-lg-1">Giá</th>
                                                        <th class="col-lg-3">Số lượng</th>
                                                        <th class="col-lg-1">Tổng</th>
                                                        <th class="col-lg-1">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="">
                                                    @foreach ($cart as $key => $item)
                                                        <tr class="row ">
                                                            <td class="col-lg-5">
                                                                <img src="{{ Storage::url($item['hinh_anh']) }}" alt
                                                                    height="52" style="width: 100px; height: 100px;" />
                                                                <p class="d-inline-block align-middle mb-0">
                                                                    <a href="{{route('clients.detailProduct',['id' => $key])}}"
                                                                        class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                                        {{ $item['ten_san_pham'] }} <br> <span
                                                                            
                                                                    </a>
                                                                </p>

                                                                <input type="hidden" name="cart[{{ $key }}][hinh_anh]" value="{{ $item['hinh_anh'] }}">
                                                                <input type="hidden" name="cart[{{ $key }}][ten_san_pham]" value="{{ $item['ten_san_pham'] }}">
                                                               
                                                            </td>
                                                            <td class="col-lg-1">
                                                                {{ number_format($item['gia'], 0, ',', '.') }} đ
                                                                <input type="hidden" name="cart[{{ $key }}][gia]" value="{{ $item['gia'] }}">
                                                            </td>
                                                            <td class="col-lg-3">
                                                                <div class="cart-plus-minus">
                                                                    <input class="w-25 cart-plus-minus-box quantityInput" id="quantityInput" 
                                                                    data-price="{{ $item['gia'] }}" value="{{ $item['so_luong'] }}" name="cart[{{ $key }}][so_luong]">
                                                                </div>
                                                               
                                                              
                                                            </td>
                                                            <td class="col-lg-1"> <span
                                                                    class="subTotal">{{ number_format($item['gia'] * $item['so_luong'], 0, ',', '.') }}đ</span>
                                                            </td>
                                                            <td class="col-lg-1 pro-remove">
                                                                <a class="text-dark">
                                                                    <i class="far fa-times-circle font_s_18"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn theme-btn-2 btn-effect-2-- me-4 mt-4">
                                                    Update Cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td class="sub-total">{{ number_format($subTotal, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping and Handing</td>
                                    <td class="shipping">{{ number_format($shipping, 0, ',', '.') }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td class="total-amount"><strong>{{ number_format($total, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right text-end">
                            <a href="{{route('clients.donhangs.create')}}" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/theme2/js/jquery1-3.4.1.min.js') }}"></script>

    <script src="{{ asset('js/popper1.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.html') }}"></script>
    <script src="{{ asset('vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.buttons.min.js') }}"></script>



    <script>
        $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
        $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');

        // hàm cập nhật tổng giỏ hàng
        function updateTotal() {
            var subTotal = 0;
            // tính tổng số tiền của các sản có trong giỏ hàng
            $('.quantityInput').each(function() {
                var $input = $(this);
                var price = parseFloat($input.data('price'));
                var quantity = parseFloat($input.val());
                subTotal += price * quantity;
            })
            // lấy số tiền vận chuyển
            var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''));
            var total = subTotal + shipping;

            $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ');
            $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ');
        }
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

            // cập nhật giá trị của subTotal
            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subTotal');
            var newSubtotal = newVal * price;
            subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ');

            updateTotal();

        });
        // xử lí nếu người dùng nhập số âm
        $('#quantityInput').on('change', function() {
            var value = parseInt($(this).val(), 10);

            if (isNaN(value) || value < 1) {
                alert('Số lượng phải lớn hơn bằng 1');
                $(this).val(1);
            }
            updateTotal();
        })

        // Xử lý xóa sản phẩm trong giỏ hàng
        $('.pro-remove').on('click', function() {
            event.preventDefault(); // chặn thao tác mặc định của thẻ a
            var $row = $(this).closest('tr');
            $row.remove(); // xóa hàng
            updateTotal();
        })
        updateTotal();
    </script>
@endsection
