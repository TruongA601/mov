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
                        <div class="breadcrumb-title pe-3">Actor</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Actor Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="display:inline-block">Actor</h4>
                                <div class="" style="float: right;display:inline-block">
                                    <a href="#" class="btn btn-sm btn-success px-4 " title="create a actor"
                                        data-bs-toggle="modal" data-bs-target="#ModalCreate">
                                        <i class='bx bx-plus me-1'></i></a>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actor as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="#" title="edit a actor" data-bs-toggle="modal"
                                                            data-bs-target="#ModalEdit{{ $item->id }}">
                                                            <i class="fa fa-edit"></i> </a>
                                                    </button>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('actors/' . $item->id) }}"
                                                            onclick="functionDelete(event)"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('admin.actors.modal.add')
                                            @include('admin.actors.modal.update')
                                            <div class="show-modal"></div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
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
