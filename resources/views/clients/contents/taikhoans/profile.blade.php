@extends('layouts.clientShop')

@section('css')

<style>
    .avatar-wrapper {
        position: relative;
        display: inline-block;
        width: 150px;
        height: 150px;
    }
    
    .avatar-wrapper img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .avatar-wrapper .file-input {
        display: none;
    }
    
    .avatar-wrapper .file-label {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
        cursor: pointer;
    }
    </style>
    

@endsection

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card" >
            
            <div class="card-body shadow-sm p-3 mb-5 rounded bg-body">
                <form action="{{ route('clients.updateProfile', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        
                        <div class="col-sm-10">
                            <div class="avatar-wrapper">
                                <img id="profileAvatar" src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="rounded-circle img-thumbnail">
                                <input type="file" class="file-input" id="avatar" name="avatar" accept="image/*" onchange="previewAvatar(event)">
                                <label for="avatar" class="file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label for="name" class="form-label">Tên </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                                </div>
                            </div>
                   
    
                            <div class="mb-3">
                                <label for="email" class="form-label">Mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                    <label for="birthday" class=" form-label">Sinh nhật</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" required>
                                </div>
                            </div>  
              
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label for="" class="form-label">Giới tính :     </label>
                                <br>
                                <select class="form-control ms-3" id="gender"  name="gender"  required>
                                    <option value="nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="nu" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    <option value="khac" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>

                           

                        </div>
                    </div>
                        
                  

                        
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewAvatar(event) {
            var output = document.getElementById('profileAvatar');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = 'block';
        }
    </script>
        
@endsection


