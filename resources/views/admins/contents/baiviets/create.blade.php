@extends('layouts.admin')

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/admins/content_create/css/app.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/admins/content_create/css/icons.min.css')}}">
@endsection

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        
                            <form action="{{route('admins.baiviets.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_danh_muc" class="form-label">Tên Bài Viết</label>
                                        <input type="text" name="ten_bai_viet" id="ten_bai_viet" 
                                            class="form-control @error('ten_bai_viet') is-invalid @enderror"
                                            placeholder="Nhập tên danh mục" value="{{old('ten_bai_viet')}}"
                                        >

                                        @error('ten_bai_viet')
                                           <p class="text-danger"> {{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="noi_dung" class="form-label">Nội Dung</label>
                                        <textarea type="text" name="noi_dung" id="noi_dung_bai_viet" 
                                            class="form-control @error('noi_dung') is-invalid @enderror"
                                            placeholder="Nhập tên danh mục" value="{{old('noi_dung')}}"
                                        >{{old('noi_dung')}}</textarea>

                                        @error('noi_dung')
                                           <p class="text-danger"> {{$message}}</p>
                                        @enderror
                                    </div>
                                   

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form_label">Trạng Thái: </label>
                                    </div>
                                        <div class=" mb-3">
                                            
                                                    <input class=" me-1" type="radio" name="trang_thai" value="1" id="firstRadio" checked>
                                                    <label class="form-check-label text-success" for="firstRadio">Hiển thị</label>
                                                
                                                    <input class=" me-1" type="radio" name="trang_thai" value="0" id="secondRadio">
                                                    <label class="form-check-label text-danger" for="secondRadio">Ẩn</label>
                                               
                                        </div> <!-- end card-body -->
                                 
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                        <input type="file" name="hinh_anh" id="hinh_anh" 
                                            class="form-control @error('hinh_anh') is-invalid @enderror"
                                            onchange="showImage(event)"
                                        >
                                        <img id="img_baiviet" src="" style="width: 150px; display: none;" alt="" class="mt-3">
                               
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                            </form>

                            
                        
                    </div>

                </div>
            </div>
        </div>

    </div>
</div> <!-- container-fluid -->
@endsection

@section('pages-title')
    {{$pages_title}}
@endsection

@section('js')


<script>
    function showImage(event){
        const img_baiviet = document.getElementById('img_baiviet');
        
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (){
            img_baiviet.src = reader.result;
            img_baiviet.style.display = 'block';
        }

        if(file){
            reader.readAsDataURL(file);
        }
        // console.log(reader.result);
    }
</script>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script  type="text/javascript">
    CKEDITOR.replace('noi_dung_bai_viet');
    

  </script>
@endsection
