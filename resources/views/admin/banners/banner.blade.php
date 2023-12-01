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
                        <div class="breadcrumb-title pe-3">Banners</div>
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
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="display:inline-block">Banners</h4>
                                <div class="" style="float: right;display:inline-block">
                                    <a href="{{ URl::to('create-banner') }}" title="Create a banner"
                                        class="btn btn-sm btn-success px-4"><i class='bx bx-plus me-1'></i></a>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>image</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src=" {{ URL::to('uploads/banners/' . $item->image) }}"
                                                        alt="image" width="40%">
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-default" title="edit banner">
                                                        <a href="{{ url('edit-banner/' . $item->id) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button class="btn btn-sm btn-default" title="delete banner">
                                                        <a href="{{ url('delete-banner/' . $item->id) }}"
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
                                            <th>image</th>
                                            <th>tool</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
