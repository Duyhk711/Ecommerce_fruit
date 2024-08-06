<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4   shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">
    {{--  --}}
    <div class="container-fluid py-1 px-3 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="">Manager / </a></li>
                <li class=" text-sm text-white " aria-current="page"> &nbsp @yield('pages-title')</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">@yield('pages-title')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    {{-- <i class="fa fa-user me-sm-1"></i> --}}
                    <div class="dropdown mt-3 me-5">
                     
                        <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>{{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item nav-link text-center" href="{{route('trang_chu')}}">Client</a></li>
                          <li><a class="dropdown-item nav-link text-center" href="{{route('admins.taikhoans.profile')}}">Profile</a></li>
                            <li>
                                <span class="">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="nav-link dropdown-item text-center" onclick="return confirm('Đăng Xuất')">Logout</button>
                                    </form>
                                </span>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
