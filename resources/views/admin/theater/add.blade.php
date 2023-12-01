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
                        <div class="breadcrumb-title pe-3">theaters</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">theater List</li>
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
                            <h6 class="mb-0 text-uppercase">Theater Create</h6>
                            <hr>
                            <div class="card ">
                                <div class="card-body ">
                                    <form class="row g-3" method="post" action="#" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label class="form-label">Province</label>
                                            <select id="province" name="province" class="form-select">
                                                <option disabled selected>Select Province</option>
                                                @foreach ($province as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">theater Name</label>
                                            <input id="name" name="name" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cinema" class="form-label">cinema</label>
                                            <select id="cinema" name="cinema" class="form-select">
                                                <option value="">Select cinema </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Total seats</label>
                                            <input id="totalseat" name="totalseat" type="number" maxlength="200"
                                                class="form-control" placeholder="max-200">
                                        </div>
                                        <div class="col-12"  style="display: flex; justify-content: end;">
                                            <button type="submit" class="btn btn-primary " style="margin-right:5px">Create</button>
                                            <a href="{{ route('theater') }}"
                                                class="btn btn-outline-secondary">Back</a>
                                        </div>
                                    </form>
                                </div>
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
    
    {{-- dependent dropdown --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var provinceDropdown = document.getElementById('province');
            var cinemaDropdown = document.getElementById('cinema');

            provinceDropdown.addEventListener('change', function() {
                var provinceId = this.value;
                cinemaDropdown.innerHTML = '<option value="">Select cinema</option>';

                var cinemaRequest = new XMLHttpRequest();
                cinemaRequest.open('get', '/getcinema/' + provinceId, true);
                cinemaRequest.onreadystatechange = function() {
                    if (cinemaRequest.readyState === 4 && cinemaRequest.status === 200) {
                        var cinemas = JSON.parse(cinemaRequest.responseText);
                        cinemas.forEach(function(cinema) {
                            var option = document.createElement('option');
                            option.value = cinema.id;
                            option.textContent = cinema.name;
                            cinemaDropdown.appendChild(option);
                        });
                    }
                };
                cinemaRequest.send();
            });
        });
    </script>
       @include('public.alert')
</body>

</html>
