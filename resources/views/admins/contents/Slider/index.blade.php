@extends('layouts.admin')
@section('content')
    

    <div class=" mt-4 container ">
        <div class=" mb-lg-0 mb-4 ">
            <div class="card z-index-2 h-100 shadow" >
                <div class="card-header pb-0 pt-3 bg-transparent ">
                    <h4 class="text-capitalize text-center">{{$title}}</h4>
                </div>

                @if (session('delete'))
                    <div class="alert text-danger" style="max-width: 300px;">{{ session('delete') }}</div>
                @endif
                @if (session('msg'))
                    <div class="alert text-success" style="max-width: 300px;">{{ session('msg') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-success">{{ session('error') }}</div>
                @endif
                <div class="d-flex justify-content-end ">
                    <a class="btn btn-success mx-4" href="{{route('admins.create')}}">Thêm mới slider</a>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <!-- end card header -->
                            <div>
                                @if (session('success'))
                                <p class="text-success m-2">
                                    {{session('success')}}
                                </p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Hình Ảnh</th>
                                                <th scope="col" class="text-center">Trạng Thái</th>
                                                <th scope="col" class="text-center">Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                                
                                            @foreach ($listSL as $index=> $item)
                                                <tr>
                                                <td class="text-center" scope="row">{{$index+1}}</td>
                                                <td class="text-center"><img src="{{Storage::url($item->hinh_anh)}}" width="100px" alt="" srcset=""></td>
                                                <td class="{{$item->trang_thai == true ? 'text-success' : 'text-danger'}} text-center ">
                                                    {{$item->trang_thai == true ? 'Hiển Thị' : 'Ẩn'}}
                                                </td>
                                        
                                                <td class="text-center">                                                       
                                                    <div class="d-inline">
                                                
                                                        <a class=" text-center text-warning m-1"
                                                            href="{{route('admins.edit',$item->id)}}">
                                                            <button class="btn btn-link text-warning p-0 " style="border: none; background: none; ">
                                                                <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                                            </button>
                                                        </a>
                                                        <form action="{{ route('admins.destroy', $item->id) }}" method="POST" class="mt-1 d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Có chắc chắn xóa không?')" class="btn btn-link text-danger p-0 " style="border: none; background: none; ">
                                                                <i class="fa-solid fa-trash fa-xl "></i>
                                                            </button>
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
    
@endsection

@section('pages-title')
    {{$pages_title}}
@endsection
