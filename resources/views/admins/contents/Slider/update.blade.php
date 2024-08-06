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
                        
                            <form action="{{route('admins.update',$listSL->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                <div class="col-lg-6">
                         
                                    <div class="mb-3">
                                        <label for="" class="form-label">Trạng thái :</label>
                                        <select class="form-control" name="trang_thai">
                                            {{-- <option selected>CHỌN TRẠNG THÁI</option> --}}
                                            <option value="1"{{ $listSL->trang_thai == '1' ? 'selected' : '' }}> Hiển thị
                                            </option>
                                            <option value="0"{{ $listSL->trang_thai == '0' ? 'selected' : '' }}>Ẩn
                                            </option>
                                        </select>
                                    </div>
                                 
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                        <input type="file" name="hinh_anh" id="hinh_anh" 
                                            class="form-control @error('hinh_anh') is-invalid @enderror"
                                            onchange="showImage(event)"
                                        >
                                        <img id="img_slider" src="" style="width: 150px; display: none;" alt="" class="mt-3">
                               
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
        const img_slider = document.getElementById('img_slider');
        
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (){
            img_slider.src = reader.result;
            img_slider.style.display = 'block';
        }

        if(file){
            reader.readAsDataURL(file);
        }
        // console.log(reader.result);
    }
</script>
@endsection
