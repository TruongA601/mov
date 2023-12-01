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
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Movies Create</h6>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3 needs-validation" action="{{ route('madd') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col">
                                                    <div class="file-drop-area" style="width:500px;height:350px">
                                                        <div id="file-drop-icon" class="file-drop-icon"><i
                                                                class="fas fa-upload"></i>
                                                        </div>
                                                        <span id="file-drop-message" class="file-drop-message">Drag and
                                                            drop here to upload Image</span>
                                                        <input type="file" id="poster" name="poster"
                                                            onchange="previewPoster(this);" required
                                                            class="file-drop-input image-preview" accept="image/*">
                                                        <img id="previewIMG">
                                                        <br><span>Poster</span>
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <div class="file-drop-area" style="width:500px;height:350px">
                                                        <div id="file-drop-icon1" class="file-drop-icon"><i
                                                                class="fas fa-upload"></i></div>
                                                        <span id="file-drop-message1" class="file-drop-message">Drag and
                                                            drop here to upload Background Image</span>
                                                        <input type="file" id="background"
                                                            name="background" onchange="previewBackground(this);"
                                                            required class="file-drop-input image-preview1"
                                                            accept="image/*">
                                                        <img id="previewBackgroundIMG">
                                                        <br><span>Background Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label class="form-label">Movie
                                                    name</label>
                                                <input type="text" class="form-control" id="name"
                                                    name="name" placeholder="movie name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Genre</label>
                                                <select class="multiple-select" id="multiple-select-field"
                                                    name="genre_id[]" id="genre_id" data-placeholder="Choose anything"
                                                    multiple="multiple">
                                                    @foreach ($genre as $item)
                                                        <option value="{{ $item->id }}">{{ $item->genre_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Duration</label>
                                                <div class="input-group"> <input type="number" class="form-control"
                                                        id="duration" name="duration" placeholder="Length"
                                                        required>
                                                    <span class="input-group-text">ms</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date
                                                    release</label>
                                                <input type="date" class="form-control" id="daterelease"
                                                    name="daterelease" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Trailer link</label>
                                                <input type="text" class="form-control" id="trailer"
                                                    name="trailer" placeholder="link trailer" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Description</label>
                                                <textarea type="text" class="form-control" id="description" name="description"
                                                    placeholder="description" required></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Director</label>
                                                <input type="text" class="form-control" id="director" 
                                                    name="director" placeholder="director" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Actor</label>
                                                <select class="multiple-select-actor" id=""
                                                    name="actor_id[]" id="actor_id" data-placeholder="Choose anything"
                                                    multiple="multiple">
                                                    @foreach ($actor as $actors)
                                                        <option value="{{ $actors->id }}">{{ $actors->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12"  style="display: flex; justify-content: end;">
                                                <button class="btn btn-primary" type="submit" style="margin-right:5px">Create</button>
                                                <a href="{{ route('movies') }}"
                                                class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </form>
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
