@extends('layouts.admin')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class=" mt-4 container ">
        <div class=" mb-lg-0 mb-4 ">
            <div class="card z-index-2 h-100 shadow" >
                <div class="card-header pb-0 pt-3 bg-transparent ">
                    <h4 class="text-capitalize text-center">{{$title}}</h4>
                </div>
                
                <div class="card-body">
                        
                    <form action="{{route('admins.baiviets.update', $showBV->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="ten_bai_viet" class="form-label">Tên Bài Viet</label>
                                <input type="text" name="ten_bai_viet" id="ten_bai_viet" 
                                    class="form-control @error('ten_bai_viet') is-invalid @enderror"
                                    placeholder="Nhập tên Bài viet" value="{{$showBV->ten_bai_viet}}"
                                >

                                @error('ten_bai_viet')
                                   <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="noi_dung" class="form-label">Nội Dung</label>
                              <input type="text" name="noi_dung" id="noi_dung" 
                                  class="form-control @error('noi_dung') is-invalid @enderror"
                                  placeholder="Nhập tên danh mục" value="{{$showBV->noi_dung}}"
                              >

                              @error('noi_dung')
                                 <p class="text-danger"> {{$message}}</p>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="ngay_dang" class="form-label">Ngày Đăng</label>
                              <input type="date" name="ngay_dang" id="ngay_dang" 
                                  class="form-control @error('ngay_dang') is-invalid @enderror"
                                  placeholder="Nhập tên danh mục" value="{{$showBV->ngay_dang}}"
                              >

                              @error('ngay_dang')
                                 <p class="text-danger"> {{$message}}</p>
                              @enderror
                          </div>

                            <div class="mb-3">
                                <label for="trang_thai" class="form_label">Trạng Thái: </label>
                            </div>
                                <div class=" mb-3">

                                            <input class="form-check-input me-1" type="radio" name="trang_thai" value="1" {{$showBV->trang_thai == true ? 'checked' : '' }} id="firstRadio" >
                                            <label class="form-check-label text-success" for="firstRadio">Hiển thị</label>
                                        
                                            <input class="form-check-input me-1" type="radio" name="trang_thai" value="0" {{$showBV->trang_thai == false ? 'checked' : '' }} id="secondRadio">
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
                                <img id="img_baiviets" src="{{Storage::url($showBV->hinh_anh)}}" style="width: 150px;" alt="" class="mt-3">
                       
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
    
@endsection

@section('pages-title')
    {{$pages_title}}
@endsection
