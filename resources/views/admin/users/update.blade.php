<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
    <style>
        .file-drop-area {
            width: 250px;
            height: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ccc;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
        }

        #previewIMG {
            width: 100%;
            height: 100%;
            max-width: 250px;
            max-height: 250px;
            object-fit: cover;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Account</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($users as $item)
                                            <form class="row g-3 needs-validation"
                                                action="{{ URL::to('update/' . $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="col-md-4 border-right">
                                                    <div
                                                        class="d-flex flex-column align-items-center text-center p-3 py-2">
                                                        <div class="file-drop-area rounded-circle mt-5">
                                                            <input type="file" id="avatar" name="avatar"
                                                                src="#" onchange="previewPoster(this);"
                                                                class="file-drop-input image-preview" accept="image/*">

                                                            <img class="rounded-circle" id="previewIMG"
                                                                src="{{ URL::to('uploads/avatars/' . $item->avatar) }}">

                                                        </div>
                                                        <br>
                                                        <span class="font-weight-bold">{{ $item->username }}</span>
                                                        <span class="text-black-50">{{ $item->email }}</span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 border-right">
                                                    <div class="p-3 py-2">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="text-right">Profile Settings</h4>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6"><label class="labels">ID</label><input
                                                                    disabled type="text" class="form-control"
                                                                    id="id" name="id"
                                                                    value="{{ $item->id }}"></div>
                                                            <div class="col-md-6"><label
                                                                    class="labels">Role</label><input disabled
                                                                    type="text" class="form-control" id="role"
                                                                    name="role"
                                                                    @if ($item->role === '1') value="admin" 
                                                        @else
                                                            value="users" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12"><label
                                                                    class="labels">Username</label><input type="text"
                                                                    class="form-control" id="username" name="username"
                                                                    value="{{ $item->username }}"></div>
                                                            <div class="col-md-12"><label
                                                                    class="labels">Password</label>
                                                                <div class="input-group" id="show_hide_password">
                                                                    <input type="password"
                                                                        class="form-control border-end-0" id="password"
                                                                        name="password" value="{{ $item->password }}">

                                                                    <a href="javascript:;"
                                                                        class="input-group-text bg-transparent"><i
                                                                            class="bx bx-hide"></i></a>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control border-end-0"
                                                                id="old_password" name="old_password"
                                                                value="{{ $item->password }}" hidden>
                                                            <div class="col-md-12"><label class="labels">Phone
                                                                    number</label>
                                                                <input type="text" class="form-control"
                                                                    id="phone" name="phone"
                                                                    value="{{ $item->phone }}">
                                                            </div>
                                                            <div class="col-md-12"><label
                                                                    class="labels">Email</label><input type="text"
                                                                    class="form-control" id="email" name="email"
                                                                    value="{{ $item->email }}"></div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Update</button>
                                                                <a href="{{route('account')}}"
                                                                    class="btn btn-outline-secondary">Back</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay toggle-btn-mobile"></div>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

    <div class="footer">
        <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                target="_blank">codervent</a>
        </p>
    </div>
    </div>
    @include('admin.layouts.footer')
    @include('public.alert')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>
