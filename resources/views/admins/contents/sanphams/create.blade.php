@extends('layouts.admin')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/admins/content_create/css/app.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/admins/content_create/css/icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/content_create/libs/quill/quill.core.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/content_create/libs/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/content_create/libs/quill/quill.bubble.css') }}">
@endsection
@section('content')
    <div class=" mt-4 container ">
        <div class=" mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize text-center">THÊM MỚI SẢN PHẨM</h6>

                </div>
                <div class="card-body p-3 rounded">
                    <div class="white_card_body QA_section">
                        <div class="QA_table ">
                            <form action="{{ route('admins.sanphams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-4">
                                        {{-- Tên danh mục --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tên danh mục:</label>
                                            <select name="danh_muc_id" id="danh_muc_id" class="form-select @error('danh_muc_id') is-invalid @enderror">
                                                <option selected>-- Chọn danh mục --</option>
                                                @foreach ($listDm as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('danh_muc_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->ten_danh_muc }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('danh_muc_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                        </div>
                                        {{-- Mã sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mã sản phẩm:</label>
                                            <input type="text"
                                                class="form-control @error('ma_san_pham') is-invalid @enderror"
                                                name="ma_san_pham" placeholder="Nhập mã sản phẩm"
                                                value="{{ old('ma_san_pham') }}">

                                            @error('ma_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- Tên sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tên sản phẩm:</label>
                                            <input type="text"
                                                class="form-control @error('ten_san_pham') is-invalid @enderror"
                                                name="ten_san_pham" placeholder="Nhập tên sản phẩm"
                                                value="{{ old('ten_san_pham') }}">

                                            @error('ten_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- Giá sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Giá sản phẩm:</label>
                                            <input type="number"
                                                class="form-control @error('gia_san_pham') is-invalid @enderror"
                                                name="gia_san_pham" min="1" placeholder="Nhập giá sản phẩm"
                                                value="{{ old('gia_san_pham') }}">

                                            @error('gia_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- Giá khuyến mại --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Giá khuyến mại:</label>
                                            <input type="number"
                                                class="form-control @error('gia_khuyen_mai') is-invalid @enderror"
                                                name="gia_khuyen_mai" min="1" placeholder="Nhập giá khuyến mại"
                                                value="{{ old('gia_khuyen_mai') }}">

                                            @error('gia_khuyen_mai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Số lượng sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Số lượng sản phẩm:</label>
                                            <input type="number"
                                                class="form-control @error('so_luong') is-invalid @enderror" name="so_luong"
                                                min="1" placeholder="Nhập số lượng sản phẩm"
                                                value="{{ old('so_luong') }}">

                                            @error('so_luong')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Ngày nhập sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Ngày nhập:</label>
                                            <input type="date"
                                                class="form-control @error('ngay_nhap') is-invalid @enderror"
                                                name="ngay_nhap" value="{{ old('ngay_nhap') }}">
                                            @error('ngay_nhap')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Mô tả ngắn --}}
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mô tả ngắn:</label>
                                            <textarea class="form-control @error('mo_ta_ngan') is-invalid @enderror" name="mo_ta_ngan"
                                                placeholder="Nhập mô tả ngắn">
                                            {{ old('mo_ta_ngan') }}
                                        </textarea>
                                            @error('mo_ta_ngan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Trạng thái sản phẩm --}}
                                        <label for="is_type">Trạng thái</label>
                                        <div class=" mb-3 ms-1">
                                            <input class=" me-1" type="radio" name="is_type" value="1"
                                                id="firstRadio" checked>
                                            <label class="form-check-label text-success" for="firstRadio">Hiển thị</label>

                                            <input class=" me-1" type="radio" name="is_type" value="0"
                                                id="secondRadio">
                                            <label class="form-check-label text-danger" for="secondRadio">Ẩn</label>
                                        </div>
                                        {{-- Tùy chỉnh khác --}}

                                        <label for="">Tùy chỉnh khác</label> <br>
                                        <div class="row d-flex justify-content-between row-cols-lg-2">
                                            <div class="mb-2  col">
                                                {{-- s --}}
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input bg-danger" type="checkbox"
                                                        role="switch" id="is_new" name="is_new" checked>
                                                    <label class="form-check-label" for="is_new">New</label>
                                                </div>
                                                {{-- e --}}

                                                <div class="form-check  form-switch">
                                                    <input class="form-check-input bg-info" type="checkbox"
                                                        role="switch" id="is_hot_deal" name="is_hot_deal" checked>
                                                    <label class="form-check-label" for="is_hot_deal">Hot deal</label>
                                                </div>
                                            </div>

                                            <div class="mb-2  col">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input bg-secondary" type="checkbox"
                                                        role="switch" id="is_hot" name="is_hot" checked>
                                                    <label class="form-check-label" for="is_hot">Hot</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input bg-success" type="checkbox"
                                                        role="switch" id="is_show_home" name="is_show_home" checked>
                                                    <label class="form-check-label" for="is_show_home">Show home</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    {{-- Mô tả sản phẩm --}}
                                    <div class="col-lg-8">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Mô tả chi tiết sản phẩm:</label>
                                            <div id="quill-editor" style="height: 400px;">
                                                
                                            </div>
                                            <textarea name="noi_dung" id="noi_dung_content" class="d-none" placeholder="Nhập mô tả chi tiết sản phẩm"></textarea>
                                        </div>

                                        {{-- Hình ảnh sản phẩm --}}
                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Ảnh đại diện sản phẩm</label>
                                            <input type="file" name="hinh_anh" id="hinh_anh"
                                                class="form-control @error('hinh_anh') is-invalid @enderror"
                                                onchange="showImage(event)">
                                            <img id="img_danhmuc" src="" style="width: 150px; display: none;"
                                                alt="" class="mt-3">
                                        </div>

                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Album hình ảnh sản phẩm</label>
                                            <i id="add-row" class=" fa-plus fa-xl ms-3 border-1 btn bg-light" 
                                            style="cursor: pointer;"></i>
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody id="img-table-body">
                                                    <tr>
                                                        <td class="d-flex align-items-center">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR97mKaYb8E3P78eGSJbPo3RHEODvCMaAvZig&s"
                                                            id="preview_0" style="width: 60px;" class="me-2">

                                                            <input type="file" id="hinh_anh" name="list_hinh_anh[id_0]" 
                                                            class="form-control" onchange="previewImage(this, 0)">
                                                        </td>
                                                        <td>
                                                                <i class="fa-solid fa-trash fa-2x text-danger" 
                                                                style="cursor: pointer;" ></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                                {{-- Button --}}
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admins/content_create/libs/quill/quill.core.js') }}"></script>
    <script src="{{ asset('assets/admins/content_create/libs/quill/quill.min.js') }}"></script>


    <script>
        function showImage(event) {
            const img_danhmuc = document.getElementById('img_danhmuc');

            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                img_danhmuc.src = reader.result;
                img_danhmuc.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
            // console.log(reader.result);
        }
    </script>
    {{-- Nội dung --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill("#quill-editor", {
                theme: "snow",
            })
            // hiển thị nội dung cũ
            var old_content = `{!! old('noi_dung') !!}`;
            quill.root.innerHTML = old_content;

            // cập nhật lại textarea khi nội dung của quill-editor thay đổi
            
            quill.on('text-change', function(){
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html;
            })

        })
    </script>
    

    {{-- Thêm album ảnh --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = 1;
            
            document.getElementById('add-row').addEventListener('click', function(){
                var tableBody = document.getElementById('img-table-body');
                var newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td class="d-flex align-items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR97mKaYb8E3P78eGSJbPo3RHEODvCMaAvZig&s"
                            id="preview_${rowCount}" style="width: 60px;" class="me-2">

                            <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" 
                            class="form-control" onchange="previewImage(this, ${rowCount})">
                        </td>
                        <td>
                            <i class="fa-solid fa-trash fa-2x text-danger" 
                            style="cursor: pointer;" onclick="removeRow(this)"></i>
                        </td>
                    `;

                tableBody.appendChild(newRow);
                rowCount++;

            })

            
        });
        function previewImage(input, rowIndex){
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e){
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item){
            var row = item.closest('tr');
            row.remove();
        }
    </script>

    
@endsection

@section('pages-title')
    {{ $pages_title }}
@endsection
