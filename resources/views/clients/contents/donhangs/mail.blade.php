@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{$donHang->ten_nguoi_nhan}},
    Cảm ơn bạn đã đặt hàng của chúng tôi, đây là thông tin đơn hàng của bạn
    *** Mã đơn hàng: **{{ $donHang->ma_don_hang}}
    *** Sản phẩm đã đặt: **
    @foreach ($donHang->chiTietDonHangs as $chiTiet)
        - {{ $chiTiet->sanPham->ten_san_pham }} x {{ $chiTiet->so_luong }} : {{ number_format($chiTiet->thanh_tien, 0 , ',' , '.') }}VNĐ
    @endforeach

    ** Tổng tiền: ** {{ number_format($donHang->tong_tien, 0 , ',' , '.') }} VNĐ

    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng.
    
    Cảm ơn bạn đã mua sắm tại cửa hàng chúng tôi!

    Trân trọng, 
    {{ config('app.name')}}
@endcomponent