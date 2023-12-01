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
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Cinema List</li>
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
                            <h6 class="mb-0 text-uppercase">Cinema Edit</h6>
                            <hr>
                            <div class="card ">
                                <div class="card-body ">
                                    @foreach ($cinemas as $item)
                                        <form class="row g-3" method="post"
                                            action="{{ URL::to('thupdate/' . $item->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="file-drop-area">
                                                    <input type="file" id="logo" name="logo"
                                                        onchange="previewPoster(this);"
                                                        class="file-drop-input image-preview"
                                                        accept=".jpg, .png, image/jpeg, image/png">
                                                    <img id="previewIMG"
                                                        src="{{ URL::to('uploads/cinemas/' . $item->logo) }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">cinema Name</label>
                                                <input id="name" name="name" type="text" class="form-control"
                                                    value="{{ $item->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="location" class="form-label">Address</label>
                                                <input id="location" name="location" type="text"
                                                    class="form-control" value="{{ $item->location }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Province</label>
                                                <select id="province" name="province" class="form-select">
                                                    @foreach ($province as $item1)
                                                        <option value="{{ $item1->id }}"
                                                            @if ($item1->id == $item->province) selected @endif>
                                                            {{ $item1->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="district" class="form-label">District</label>
                                                <select id="district" name="district" class="form-select">
                                                    @foreach ($district as $item2)
                                                        <option value="{{ $item2->id }}"
                                                            @if ($item2->id == $item->district) selected @endif>
                                                            {{ $item2->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ward" class="form-label">Ward</label>
                                                <select id="ward" name="ward" class="form-select">
                                                    @foreach ($ward as $item3)
                                                        <option value="{{ $item3->id }}"
                                                            @if ($item3->id == $item->ward) selected @endif>
                                                            {{ $item3->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12" style="display: flex; justify-content: end;">
                                                <button type="submit" class="btn btn-primary"
                                                    style="margin-right:5px">Update</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
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
    <div class="overlay toggle-btn-mobile"></div>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <div class="footer" id="footer">
        <p class="mb-0">BlackCat @2023 | Developed By : <a href="https://www.facebook.com/pxt.manwithoutlove"
                target="_blank">PXT</a>
        </p>
    </div>
    </div>
    @include('admin.layouts.footer')
    {{-- dependent dropdown --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var provinceDropdown = document.getElementById('province');
            var districtDropdown = document.getElementById('district');
            var wardDropdown = document.getElementById('ward');

            provinceDropdown.addEventListener('change', function() {
                var provinceId = this.value;
                districtDropdown.innerHTML = '<option value="">Select district</option>';
                wardDropdown.innerHTML = '<option value="">Select ward</option>';

                var districtRequest = new XMLHttpRequest();
                districtRequest.open('get', '/getDistrict/' + provinceId, true);
                districtRequest.onreadystatechange = function() {
                    if (districtRequest.readyState === 4 && districtRequest.status === 200) {
                        var districts = JSON.parse(districtRequest.responseText);
                        districts.forEach(function(district) {
                            var option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            districtDropdown.appendChild(option);
                        });
                    }
                };
                districtRequest.send();
            });

            districtDropdown.addEventListener('change', function() {
                var districtId = this.value;
                wardDropdown.innerHTML = '<option value="">Select ward</option>';

                var wardRequest = new XMLHttpRequest();
                wardRequest.open('get', '/getWard/' + districtId, true);
                wardRequest.onreadystatechange = function() {
                    if (wardRequest.readyState === 4 && wardRequest.status === 200) {
                        var wards = JSON.parse(wardRequest.responseText);
                        wards.forEach(function(ward) {
                            var option = document.createElement('option');
                            option.value = ward.id;
                            option.textContent = ward.name;
                            wardDropdown.appendChild(option);
                        });
                    }
                };
                wardRequest.send();
            });
        });
    </script>
    @include('public.alert')
</body>

</html>
