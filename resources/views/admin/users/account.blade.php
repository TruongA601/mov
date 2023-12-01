<!DOCTYPE html>
<html lang="en">
<head>
     @include('admin.layouts.header')
</head>
   

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('admin.layouts.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('admin.layouts.navbar')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Account</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Account</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Role</th>
                                            <th>Avatar</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                @if ($item->role === '1')
                                                    <td>admin</td>
                                                @else
                                                    <td>users</td>
                                                @endif
                                                <td><img src="{{URL::to('uploads/avatars/'.$item->avatar)}}" alt="" width="70"></td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('update/' . $item->id) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('account/' . $item->id) }}"
                                                            onclick="functionDelete(event)"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Role</th>
                                            <th>Avatar</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                    target="_blank">codervent</a>
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->
    <!--start switcher-->
   
    <!--end switcher-->
    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    @include('admin.layouts.footer')
    @include('public.alert')
    <!-- App JS -->
</body>
</html>
