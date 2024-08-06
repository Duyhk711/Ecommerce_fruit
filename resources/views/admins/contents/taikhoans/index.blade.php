@extends('layouts.admin')
@section('css')
    <style>
        .modal-profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info {
            display: flex;
            align-items: center;
        }

        .profile-details {
            flex-grow: 1;
        }

        .profile-details p {
            margin-bottom: 0.5rem;
        }

        .profile-details strong {
            width: 120px;
            display: inline-block;
        }
        form .form-control {
            width: auto; /* Đảm bảo chiều rộng của select là tự động */
        }

        form button.btn-sm {
            margin-top: 17px;
            padding: 0.6rem 0.6rem; /* Giảm kích thước của nút */
            font-size: 0.875rem; /* Giảm kích thước chữ của nút */
            line-height: 1.5;
}
    </style>
@endsection
@section('content')
    <div class=" mt-4 container ">
        <div class=" mb-lg-0 mb-4">
            <div class="card z-index-2 h-100 ">
                <div class="card-header pb-0 pt-3 bg-transparent ">
                    <h4 class="text-capitalize text-center">{{ $title }}</h4>
                </div>

                <div class="card-body p-3 ">
                    <div class="container">
                        <div class="row ">

                            <div class="col-lg-6">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead class="table-warning">

                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nhân Viên</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Quyền truy cập
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Ngày làm việc</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                     </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <img src="{{ asset('assets/admins/img/team-2.jpg') }}"
                                                                        class="avatar avatar-sm me-3" alt="user2">
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $item->email }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ route('updateRole') }}" style="display: flex; align-items: center;">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                                <select name="role" class="form-control" style="width: auto; margin-right: 10px;">
                                                                    <option value="Admin" {{ $item->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="User" {{ $item->role === 'User' ? 'selected' : '' }}>User</option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                            </form>
                                                        </td>
                                                        

                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-bold">{{ $item->created_at->format('d-m-Y') }}</span>
                                                        </td>

                                                        <td class="align-middle">
                                                            <a href="{{route('admins.taikhoans.show',  $item->id)}}"
                                                                class="text-secondary font-weight-bold text-xs"
                                                                data-toggle="tooltip">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>
                                                        </td>


                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center  mb-0">
                                            <thead class="table-info">
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Khách hàng</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Quyền truy cập</th>

                                                    
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <img src="{{ asset('assets/admins/img/team-2.jpg') }}"
                                                                        class="avatar avatar-sm me-3" alt="user1">
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $item->email }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ route('updateRole') }}" style="display: flex; align-items: center;">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                                <select name="role" class="form-control" style="width: auto; margin-right: 10px;">
                                                                    <option value="Admin" {{ $item->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="User" {{ $item->role === 'User' ? 'selected' : '' }}>User</option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                            </form>
                                                        </td>
                                                        
                                                        
                                                        <td class="align-middle">
                                                            <a href="{{route('admins.taikhoans.show',  $item->id)}}"
                                                                class="text-secondary font-weight-bold text-xs"
                                                                data-toggle="tooltip">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>
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



    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="profile-info">
                        <img id="profileAvatar" src="" class="modal-profile-avatar" alt="Avatar">
                        <div class="profile-details">
                            <h4 id="profileName"></h4>
                            <p><strong>Email:</strong> <span id="profileEmail">{{Auth::user()->email}}</span></p>
                            <p><strong>Ngày sinh:</strong> <span id="profileDob"></span></p>
                            <p><strong>Địa chỉ:</strong>  <span id="profileAddress">{{Auth::user()->address}}</span></p>
                            <p><strong>Giới tính:</strong> <span id="profileGender"></span></p>
                            <p><strong>Số điện thoại:</strong> <span id="profilePhone">{{Auth::user()->phone}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pages-title')
    {{ $title }}
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function showProfileModal(user) {
            document.getElementById('profileAvatar').src = user.avatar ||
                '{{ asset('assets/admins/img/team-2.jpg') }}';
            document.getElementById('profileName').innerText = user.name;
            document.getElementById('profileEmail').innerText = user.email;
            document.getElementById('profileDob').innerText = user.dob || 'N/A';
            document.getElementById('profileAddress').innerText = user.address || 'N/A';
            document.getElementById('profileGender').innerText = user.gender || 'N/A';
            document.getElementById('profilePhone').innerText = user.phone || 'N/A';
            $('#profileModal').modal('show');
        }
    </script>
@endsection
