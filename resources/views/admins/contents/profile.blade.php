@extends('layouts.admin')

@section('css')
<style>
    .modal-profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }
</style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            {{-- <div class="d-flex align-items-center">
                <p class="mb-0">Thông tin cá nhân</p>
                <button class="btn btn-primary btn-sm ms-auto">Settings</button>
            </div> --}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <img id="profileAvatar" src="{{ asset('assets/admins/img/team-2.jpg') }}" class="modal-profile-avatar" alt="Avatar">
                    <div class="align-item-center">
                        <h4>{{$user->name}}</h4>
                        <p>{{$user->email}}</p>
                    </div>
                    
                    
                </div>
                <div class="col-md-6">
                   
                </div>
                
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Thông tin liên hệ</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                        <input class="form-control" type="text" value="{{$user->address}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Giới tính</label>
                        <input class="form-control" type="text" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                        <input class="form-control" type="text" value="United States">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                        <input class="form-control" type="text" value="{{$user->phone}}">
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">About me</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">About me</label>
                        <input class="form-control" type="text"
                            value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('pages-title')
    {{ $pages_title }}
@endsection
