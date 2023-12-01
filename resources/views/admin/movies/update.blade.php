<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
    <style>
        #previewIMG {
            max-width: 100%;
            max-height: 300px;

        }

        #previewBackgroundIMG {
            max-width: 100%;
            max-height: 300px;

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
                        <div class="breadcrumb-title pe-3">Movie</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Movies List</li>
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
                    <div class="p-4 border rounded">

                        <div class="row">
                            <div class="col-xl-12 mx-auto">
                                <h6 class="mb-0 text-uppercase">Movies detail</h6>
                                <hr>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="p-4 border rounded">
                                            @foreach ($movies as $item)
                                                <form class="row g-3 needs-validation"
                                                    action="{{ URL::to('mupdate/' . $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <div class="file-drop-area"
                                                                style="width:500px;height:350px">
                                                                <input type="file" id="poster"
                                                                    name="poster"
                                                                    src="{{ URL::to('uploads/movies/' . $item->poster) }}"
                                                                    onchange="previewPoster(this);"
                                                                    class="file-drop-input image-preview"
                                                                    accept="image/*">
                                                                <img id="previewIMG"
                                                                    src="{{ URL::to('uploads/movies/' . $item->poster) }}">
                                                                <br> <span>Poster</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col">
                                                            <div class="file-drop-area"
                                                                style="width:500px;height:350px">
                                                                <input type="file" id="background"
                                                                    name="background"
                                                                    src="{{ URL::to('uploads/movies/' . $item->background) }}"
                                                                    onchange="previewBackground(this);" 
                                                                    class="file-drop-input image-preview1"
                                                                    accept="image/*">
                                                                <img id="previewBackgroundIMG"
                                                                    src="{{ URL::to('uploads/movies/' . $item->background) }}">
                                                                <br><span>Background Image</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom01" class="form-label">Movie
                                                            id</label>
                                                        <input disabled type="text" class="form-control"
                                                            id="id" name="id" value="{{ $item->id }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom01" class="form-label">Movie
                                                            name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $item->name }}" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Genre</label>
                                                        <select class="multiple-select" id=""
                                                            name="genres[]" data-placeholder="Choose anything"
                                                            multiple="multiple">
                                                            @foreach ($genre as $genreItem)
                                                                <option value="{{ $genreItem->id }}"
                                                                    {{ in_array($genreItem->id, $moviesgenre->pluck('genre_id')->toArray()) ? 'selected' : '' }}>
                                                                    {{ $genreItem->genre_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustomUsername"
                                                            class="form-label">Length</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                id="duration" name="duration"
                                                                value="{{ $item->duration }}"required>
                                                            <span class="input-group-text">ms</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Date
                                                            release</label>
                                                        <input type="date" class="form-control"
                                                            id="daterelease" name="daterelease"
                                                            value="{{ $item->daterelease }}"required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Trailer
                                                            link</label>
                                                        <input type="text" class="form-control" id="trailer"
                                                            name="trailer"
                                                            value="{{ $item->trailer }}"required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03"
                                                            class="form-label">Description</label>
                                                        <textarea type="text" class="form-control" id="description" name="description"required>{{ $item->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Director</label>
                                                        <input type="text" class="form-control" id="director"
                                                            name="director" 
                                                            value="{{ $item->director }}"required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Actor</label>
                                                        <select class="multiple-select-actor" id=""
                                                            name="actors[]" data-placeholder="Choose anything"
                                                            multiple="multiple">
                                                            @foreach ($actor as $actors)
                                                                <option value="{{ $actors->id }}"
                                                                    {{ in_array($actors->id, $movieactor->pluck('actor_id')->toArray()) ? 'selected' : '' }}>
                                                                    {{ $actors->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12" style="display:flex; justify-content: end">
                                                        <button class="btn btn-primary" type="submit"
                                                            style="margin-right:5px">Update</button>
                                                            <a href="{{ route('movies') }}"
                                                            class="btn btn-outline-secondary">Back</a>
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
