<div class="header-home" style="background-color: #2a2e4b" id="topbar">
    <div class="container">
        <div class="topbar">
            <div class="left-topbar-home">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logo-1.png') }}" alt="">
                    </a>
                </div>
                <div class="search-bar" onclick="toggleSearchForm()">
                    <div class="search1">
                        <span class="fas fa-search" style="margin: 5px;"></span>
                        <span class="input-text" style="margin-left:10px ">search for movies</span>
                    </div>
                </div>
            </div>
            <style>
            </style>
            <div class="right-topbar-home">
                <div class="user-profile">
                    <a class="" data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info"style="margin-right:5px;">
                                <p class="user-name mb-0" style="font-size: 15px; color: white">
                                    <?php if (Auth::check()): ?>
                                    <?php echo Auth::user()->username; ?>
                                    <?php else:  ?>
                                    <style>
                                        .user-profile {
                                            border: none;
                                        }
                                    </style>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <?php if (Auth::check()): ?>
                            <img src="{{ URL::to('uploads/avatars/' . Auth::user()->avatar) }}" class="user-img"
                                alt="user avatar">
                            <?php else:?>
                            <img src="{{ asset('assets/images/avatars/avatar.jpg') }}" class="user-img"
                                alt="user avatar">
                            <?php endif;?>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <?php if (Auth::check()): ?>

                        <a class="dropdown-item" href="{{ route('user-account') }}">
                            <i class="bx bx-user" style="margin-right: 5px"></i><span>Profile</span>
                        </a>
                        <div class="dropdown-divider mb-0"></div>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button class="dropdown-item" href="javascript:;">
                                <span type="button;submit"><i class="bx bx-power-off"></i>Logout</span>
                            </button>
                        </form>
                        <?php else: ?>

                        <a class="dropdown-item" href="{{ route('signin') }}">
                            <i class="bx bx-log-in" style="margin-right: 5px"></i><span>Sign in</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('signup') }}">
                            <i class="bx bx-user-plus" style="margin-right: 5px"></i><span>Sign up</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-bottom-item ">
                <a href="{{ route('index') }}"class="header-item">Home</a>
                <a href="{{ route('allmovie') }}"class="header-item">Movies</a>
                <a href="{{ route('support') }}"class="header-item">Suport</a>
                <a href="{{ route('aboutus') }}"class="header-item">About us</a>
            </div>
        </div>

    </div>

</div>
<script>
    $(function() {
        $('#search-menu').removeClass('toggled');

        $('#search-icon').click(function(e) {
            e.stopPropagation();
            $('#search-menu').toggleClass('toggled');
            $("#popup-search").focus();
        });

        $('#search-menu input').click(function(e) {
            e.stopPropagation();
        });

        $('#search-menu, body').click(function() {
            $('#search-menu').removeClass('toggled');
        });
    });
</script>
<style>
    .search-form-container {
        z-index: 999;
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        /* align-items: center; */
        box-sizing: border-box;
    }

    .search-form {
        width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background: #fff;
        position: absolute;
        margin: 200px auto 0;
        border-radius: 5px;
    }

    .row-s {
        display: flex;
        align-items: center;
        padding: 10px 20px;
    }

    .search-form input {
        flex: 1;
        height: 50px;
        background: transparent;
        border: 0;
        outline: 0;
        font-size: 18px;
    }

    span .fa-search {
        width: 25px;
        color: #555;
        font-size: 22px;
    }

    #searchResults ul {
        border-top: 1px solid #999;
        padding: 0px 10px;
    }

    #searchResults ul li {
        list-style: none;
        border-radius: 3px;
        padding: 15px 10px;
        cursor: pointer;
    }

    #searchResults ul li:hover {
        background: #dee7ea;
    }
    #searchResults{
        max-height: 300px;
        overflow-y: scroll;
    }
</style>
<div class="search-form-container" id="searchFormContainer" onclick="closeSearchForm(event)">
    <form class="search-form" onclick="event.stopPropagation();">
        <div class="row-s">
            <input type="text" placeholder="Search for movies..." oninput="performSearch(this.value)">
            <span><i class="fas fa-search"></i></span>
        </div>
        <div id="searchResults"></div>
    </form>
</div>

<script>
    function toggleSearchForm() {
        var searchFormContainer = document.getElementById("searchFormContainer");
        if (searchFormContainer.style.display === "none" || searchFormContainer.style.display === "") {
            searchFormContainer.style.display = "flex";
            var inputField = document.querySelector('.search-form input[type="text"]');
            if (inputField) {
                inputField.focus();
            }
        } else {
            searchFormContainer.style.display = "none";
        }
    }

    function closeSearchForm(event) {
        searchFormContainer.style.display = "none";
    }

    function performSearch(query) {
        fetchSearchData(query);
    }

    function fetchSearchData(query) {
        fetch('perform-search?query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                updateSearchResults(data);
            })
            .catch(error => {
                console.error('Error fetching search data:', error);
            });
    }

    function updateSearchResults(results) {
        // console.log('Received search results:', results);

        var searchResultsContainer = document.getElementById("searchResults"); 
        var resultList = document.createElement("ul");
        searchResultsContainer.innerHTML = "";

        if (!Array.isArray(results)) {
            console.error('Invalid search results format. Expected an array.');
            return;
        }
        if (results.length === 0) {
            searchResultsContainer.innerHTML = "<ul><li>No results found.</li></ul>";
            return;
        }
       
        results.forEach(result => {
            var resultItem = document.createElement("li");
            // resultItem.className = "search-result-item";
            resultItem.innerHTML = `<a href="/moviedetail/${result.id}">${result.name}</a>`;
            resultList.appendChild(resultItem);
            searchResultsContainer.appendChild(resultList);
        });
    }
</script>
