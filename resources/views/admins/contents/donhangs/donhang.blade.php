@extends('layouts.admin')
@section('content')
    <div class=" mt-4 container ">
        <div class=" mb-lg-0 mb-4">
            <div class="card z-index-2 h-100 ">
                <div class="card-header pb-0 pt-3 bg-transparent ">
                    <h4 class="text-capitalize text-center">{{ $title }}</h4>
                </div>
                @if (session('error'))
                    <div class="alert text-danger m-2">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert text-success m-2">{{ session('success') }}</div>
                @endif
                <div class="card-body container ">
                    <div class=" container p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder  opacity-7">
                                        Mã đơn
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Ngày đặt
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Tổng 
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Trạng thái
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        &nbsp;
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>  
                                            <h6 class="mb-0 text-sm">{{ $item->ma_don_hang }}</h6>
                                        </td>
                                       
                                        <td class="text-center">
                                            {{ $item->created_at->format('d-m-Y') }}
                                        </td>

                                      
                                        <td class="align-middle  text-center">
                                           {{ number_format($item->tong_tien, 0 , ',', '.') }}đ
                                        </td>

                                        <td class="align-middle text-center">
                                            <form action="{{route('admins.donhangs.update', $item->id )}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="trang_thai_don_hang" class="form-select" 
                                                onchange="confirmSubmit(this)" data-default-value="{{$trangThaiDonHang[$item->trang_thai_don_hang]}}">
                                                    @foreach ($trangThaiDonHang as $key => $value)
                                                        <option value="{{ $key }}" 
                                                        {{ $key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                                        {{ $key == 'huy_don_hang' ? 'disabled' : '' }}>
                                                            {{ $value }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="row">
                                                    <a href="{{route('admins.donhangs.show', $item->id)}}" class="col-lg-6">
                                                        <i class="fa-solid fa-eye fa-xl"></i>
                                                    </a>
                                                
                                                    @if ($item->trang_thai_don_hang === $type_huy_don_hang )
                                                        <form action="{{ route('admins.donhangs.destroy', $item->id) }}" method="POST"
                                                            class="d-inline col-lg-6">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                onclick="return confirm('Có chắc chắn xóa sản phẩm không?')"
                                                                class="text-danger p-0"
                                                                style="border: none; background: none; ">
                                                                <i class="fa-solid fa-delete-left fa-xl"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{$data->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        function confirmSubmit(selectElement){
            var form = selectElement.form;
            var selectedOption =  selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành: "' + selectedOption + '" không?')) {
                form.submit();
            } else {    
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection
@section('pages-title')
    {{ $pages_title }}
@endsection
