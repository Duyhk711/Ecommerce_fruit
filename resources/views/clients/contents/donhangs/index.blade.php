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
                        @if (session('success'))
                             <div class="alert text-success m-2">{{ session('success') }}</div>
                            
                        @endif
                        <div class="row">
                            <div class="QA_section border-0">
                                <div class="card-body QA_table">
                                   
                                        <div class=" table-responsive shopping-cart container">
                                            <table class="table">
                                                <thead>
                                                    <tr class="row">
                                                        <th class="col-2">Mã đơn hàng</th>
                                                        <th class="col-3">Ngày đặt</th>
                                                        <th class="col-2">Trạng thái</th>
                                                        <th class="col-2">Tổng tiền</th>
                                                        <th class="col-3">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($donHangs as $item)
                                                        <tr class="row">
                                                            <td class="col-2">
                                                                <a href="{{ route('clients.donhangs.show', $item->id) }}" >
                                                                    {{ $item->ma_don_hang}}
                                                                </a>
                                                            </td>

                                                            <td class="col-3">{{ $item->created_at->format('d-m-Y')}}</td>

                                                            <td class="col-2">
                                                                @php
                                                                    // Đặt giá trị mặc định cho màu badge
                                                                    $trangThaiDonHangColor = 'warning'; // Mặc định là màu vàng
                                                            
                                                                    // Kiểm tra các trạng thái và gán màu sắc tương ứng
                                                                    if ($item->trang_thai_don_hang === 'huy_don_hang') {
                                                                        $trangThaiDonHangColor = 'danger'; // Màu đỏ cho trạng thái đã hủy
                                                                    } elseif ($item->trang_thai_don_hang === 'da_giao_hang') {
                                                                        $trangThaiDonHangColor = 'success'; // Màu xanh lá cho trạng thái đã vận chuyển
                                                                    }elseif ($item->trang_thai_don_hang === 'dang_chuan_bi') {
                                                                        $trangThaiDonHangColor = 'primary'; // Màu xanh lá cho trạng thái đã vận chuyển
                                                                    }elseif ($item->trang_thai_don_hang === 'dang_van_chuyen') {
                                                                        $trangThaiDonHangColor = 'info'; // Màu xanh lá cho trạng thái đã vận chuyển
                                                                    }
                                                                @endphp
                                                                
                                                                <span class="badge bg-{{$trangThaiDonHangColor}}">
                                                                    {{ $trangThaiDonHang[$item->trang_thai_don_hang] }}
                                                                </span>
                                                            </td>

                                                            <td class="col-2">{{ number_format($item->tong_tien, 0, ',', '.') }}đ</td>

                                                            <td >
                                                                <div class="d-flex">
                                                                    <a href="{{ route('clients.donhangs.show', $item->id) }}" 
                                                                        class="btn theme-btn-2 btn-effect-2--">
                                                                        View
                                                                    </a>
                                                                    <form action="{{route('clients.donhangs.update', $item->id)}}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        @if ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                                                            <input type="hidden" name="huy_don_hang" value="1">
                                                                            <button type="submit" class="btn btn-effect-2-- bg-danger" 
                                                                                onclick="return confirm('Bạn có xác nhận hủy đơn hàng không?')">
                                                                                Hủy
                                                                            </button>
                                                                        @elseif ($item->trang_thai_don_hang === $type_dang_van_chuyen)
                                                                            <input type="hidden" name="da_giao_hang" value="1">
                                                                            <button type="submit" class="btn btn-effect-2-- bg-success" 
                                                                                onclick="return confirm('Xác nhận đã hàng')">
                                                                                Đã nhận hàng    
                                                                        </button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    
                                </div>
                            </div>

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
    
@endsection