<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Banner</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Banner List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Banner Edit</h6>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        @foreach ($banners as $item)
                                            <form class="row g-3" method="post"
                                                action="{{ URL::to('update-banner/' . $item->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col">
                                                    <div class="file-drop-area" style="width:100%">
                                                        <input type="file" id="image" name="image"
                                                            onchange="previewPoster(this);" required
                                                            class="file-drop-input image-preview" accept="image/*">
                                                        <img id="previewIMG"
                                                            src="{{ URL::to('uploads/banners/' . $item->image) }}">
                                                        <br><span>Banner</span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="col-12" style="display: flex; justify-content: end;">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="margin-right:5px">Update</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary">Cancel</button>
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
        <div class="overlay toggle-btn-mobile"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <div class="footer" id="footer">
            <p class="mb-0">BlackCat @2023 | Developed By : <a href="https://www.facebook.com/pxt.manwithoutlove"
                    target="_blank">PXT</a>
            </p>
        </div>
    </div>
    @include('admin.layouts.footer')
    @include('public.alert')
</body>

</html>
