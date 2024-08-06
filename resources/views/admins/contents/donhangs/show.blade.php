@extends('layouts.admin')

@section('css')
    <style>
        .order-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-header,
        .order-details,
        .customer-info,
        .order-summary {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .order-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .order-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 12px;
            margin-right: 5px;
        }

        .customer-info,
        .order-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 80%;
            
        }

        .customer-info p,
        .order-details p {
            margin: 0;
            /* font-size: 0.9rem; */
            color: #555;
        }

        .product-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .product-img img {
            max-width: 75px;
            height: auto;
            border-radius: 5px;
        }

        .product-info {
            margin-left: 15px;
            flex-grow: 1;
        }

        .product-info h6 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .product-info p {
            margin: 5px 0;
            font-size: 0.9rem;
            color: #555;
        }

        .order-summary {
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 20px;
        }

        .order-note textarea {
            width: 100%;
            height: 80px;
            resize: none;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .order-total {
            margin-top: 15px;
            font-size: 1.2rem;
            font-weight: 700;
        }

    </style>
@endsection

@section('content')
    <div class="order-container">
        <div class="container ">
            <h3>Thông tin chi tiết đơn hàng số: {{ $donHang->id }}</h3>
            <div>
                <span class="badge bg-primary">#{{ $donHang->ma_don_hang }}</span>
                <span class="badge bg-secondary">{{ $donHang->created_at }}</span>
            </div>
        </div>
        <div class="row ms-1" style="width: 99%;" >
            <div class="bg-body shadow-sm p-3 mb-5 rounded col-lg-6 ">
                <h4>Thông tin người đặt hàng</h4>
                <p><b>Người đặt:</b> {{ $donHang->user->name }} | {{ $donHang->user->role }}</p>
                <p><b>Số điện thoại:</b> {{ $donHang->user->phone }}</p>
                <p><b>Email:</b> {{ $donHang->user->email }}</p>
                <p><b>Địa chỉ:</b> {{ $donHang->user->address }}</p>
            </div>
            <div class="bg-body shadow-sm p-3 mb-5 rounded col-lg-6 ">
                <h4>Thông tin người nhận</h4>
                <p><b>Tên người nhận:</b> {{ $donHang->ten_nguoi_nhan }}</p>
                <p><b>Số điện thoại:</b> {{ $donHang->so_dien_thoai_nguoi_nhan }}</p>
                <p><b>Email:</b> {{ $donHang->email_nguoi_nhan }}</p>
                <p><b>Địa chỉ giao hàng:</b> {{ $donHang->dia_chi_nguoi_nhan }}</p>
            </div>
        </div>

        <div class="container row g-2">
            <div class="col-8 bg-body shadow-sm p-3 mb-5 rounded">
                <h4>Thông tin sản phẩm</h4>
                @foreach ($donHang->chiTietDonHangs as $item)
                    @php
                        $sanPham = $item->sanPham;
                    @endphp

                    <div class="">
                        <div class=" d-flex">
                            <img src="{{ Storage::url($sanPham->hinh_anh) }}" width="100px" height="100px" alt="{{ $sanPham->ten_san_pham }}">
                            <div class="ms-2">
                                <p><b>{{ $sanPham->ten_san_pham }} </b></p>
                                <p> {{ $sanPham->ma_san_pham }} </p>
                                    <div class="d-flex justify-content-end">
                                        <p>Giá: {{ number_format($item->don_gia, 0, ',', '.') }}đ x {{ number_format($item->so_luong, 0, ',', '.') }}</p>
                                        <p> |  <b> Thành tiền: {{ number_format($item->thanh_tien, 0, ',', '.') }} đ </p> </b>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
                <b>Tổng tiền: {{ number_format($donHang->tong_tien, 0, ',', '.') }} đ</b> 
                
                <div class="d-flex">
                    <div>    
                        @if ($donHang->trang_thai_thanh_toan === 'chua_thanh_toan')
                            <p class="badge bg-warning">Chưa thanh toán</p>
                        @else
                            <p class="badge bg-success">Đã thanh toán</p>
                        @endif
                    </div>
                
                    <div>
                        @php
                            // Đặt giá trị mặc định cho màu badge
                            $trangThaiDonHangColor = 'warning'; // Mặc định là màu vàng
                    
                            // Kiểm tra các trạng thái và gán màu sắc tương ứng
                            if ($donHang->trang_thai_don_hang === 'huy_don_hang') {
                                $trangThaiDonHangColor = 'danger'; // Màu đỏ cho trạng thái đã hủy
                            } elseif ($donHang->trang_thai_don_hang === 'da_giao_hang') {
                                $trangThaiDonHangColor = 'success'; // Màu xanh lá cho trạng thái đã vận chuyển
                            }elseif ($donHang->trang_thai_don_hang === 'dang_chuan_bi') {
                                $trangThaiDonHangColor = 'primary'; // Màu xanh lá cho trạng thái đã vận chuyển
                            }elseif ($donHang->trang_thai_don_hang === 'dang_van_chuyen') {
                                $trangThaiDonHangColor = 'info'; // Màu xanh lá cho trạng thái đã vận chuyển
                            }
                        @endphp
                        <p class="badge bg-{{ $trangThaiDonHangColor }}">
                            {{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-4 bg-body shadow-sm p-3 mb-5 rounded">
                <h4>Ghi chú đơn hàng</h4>
                <textarea class="form-control" rows="15" placeholder="Ghi chú đơn hàng" >{{ $donHang->ghi_chu ?? 'Ghi chú đơn hàng' }}</textarea>
            </div>
        </div>

        
    </div>
@endsection

@section('pages-title')
    {{ $title }}
@endsection
