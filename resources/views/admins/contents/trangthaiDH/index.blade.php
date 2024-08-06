@extends('layouts.admin')

@section('content')
<div class=" mt-4 container ">
    <div class=" mb-lg-0 mb-4">
        <div class="card z-index-2 h-100 " >
            <div class="card-header pb-0 pt-3 bg-transparent ">
                <h4 class="text-capitalize text-center">{{$title}}</h4>
            </div>
           
            <div class="card-body p-3 ">
                <div class="container" >
                    <div class="table-responsive  border-4 container">
                        <table class="table table-hover">
                            <thead>
                                <th class="text-center">ID</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Thao Tác</th>
                            </thead>
                            <tbody>
                                @foreach ($listTH as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->ten_trang_thai }}</td>
                
                                        <th class="text-center">
                                            <a href="#" class="btn btn-warning">Sửa</a>
                                            <a href="#"class="btn btn-danger" onclick="return confirm('Bạn Có Muốn Xóa Không')">Xóa</a>
                                        </th>
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

@endsection

@section('pages-title')
    {{$title}}
@endsection