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
                        <div class="breadcrumb-title pe-3">Cinema</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Cinemas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="display:inline-block">Cinemas</h4>
                                <div class="" style="float: right;display:inline-block">
                                    <a href="{{ route('thviewadd') }}" title="Create a cinema"
                                        class="btn btn-sm btn-success px-4">
                                        <i class='bx bx-plus me-1'></i></a>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>province</th>
                                            {{-- <th>district</th>
                                            <th>ward</th> --}}
                                            <th>loaction</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cinemas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src=" {{ URL::to('uploads/cinemas/' . $item->logo) }}"
                                                        alt="image" width="70">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if(isset($data[$item->id]))
                                                        {{ $data[$item->id][0]->proname }}
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if(isset($data[$item->id]))
                                                        {{ $data[$item->id][0]->disname }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data[$item->id]))
                                                        {{ $data[$item->id][0]->waname }}
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item->location }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('thupdate/' . $item->id) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('cinemas/' . $item->id) }}"
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
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>province</th>
                                            {{-- <th>district</th>
                                            <th>ward</th> --}}
                                            <th>location</th>
                                            <th>Tool</th>
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
