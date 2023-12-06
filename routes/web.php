<?php

use App\Http\Controllers\Admin\accountController;
use App\Http\Controllers\Admin\actorController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\admin\bookingController;
use App\Http\Controllers\Admin\genreController;
use App\Http\Controllers\Admin\signinController;
use App\Http\Controllers\Admin\movieController;
use App\Http\Controllers\Admin\cinemaController;
use App\Http\Controllers\Admin\theaterController;
use App\Http\Controllers\Admin\seatController;
use App\Http\Controllers\Admin\showController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\movieDetailController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\selectShowController;
use App\Http\Controllers\Users\paymentController;
use App\Http\Controllers\Users\selectSeatController;
use Illuminate\Support\Facades\Route;




Route::controller(signinController::class)->group(function () {
    Route::get('signin',  'signin')->name('signin');
    Route::get('signup', 'signup')->name('signup');
    Route::post('register', 'register')->name('register');
    Route::post('checkLogin', 'checkLogin');
    Route::post('logout', 'destroy')->name('logout');
    // Route::middleware(['admin'])->group(function () {
    //     Route::get('dashboard', 'adminpage')->name('adminpage');
    // });
    Route::middleware(['user'])->group(function () {
        Route::get('home', 'home')->name('home');
    });
});

Route::controller(homeController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('support', 'support')->name('support');
    Route::get('aboutus', 'aboutus')->name('aboutus');
    Route::get('all-movie', 'allmovie')->name('allmovie');
    Route::get('coming-movie', 'comingmovie')->name('comingmovie');
    Route::get('allmovie/filter', 'filterByGenre')->name('allmovie.filter');
});

Route::controller(searchController::class)->group(function () {
    Route::get('perform-search', 'performSearch');
});
Route::get('moviedetail/{id}',  [movieDetailController::class, 'moviedetail'])->name('moviedetail');
Route::get('getbooking/{id}/{date}', [selectShowController::class, 'getbooking'])->name('getbooking');

Route::get('getCinema/{provinceID?}', [selectShowController::class, 'getCinema'])->name('getCinema');

Route::middleware(['user'])->group(function () {
    Route::get('selectSeat/{movieId}/{cinemaId}/{theaterId}/{showId}', [selectSeatController::class, 'selectSeat'])->name('selectSeat');
    Route::controller(App\Http\Controllers\Users\accountController::class)->group(function () {
        Route::get('user-account', 'useraccount')->name('user-account');
        Route::post('user-update/{id}', 'update')->name('user-update');

        Route::get('bookingdetail/{id}', 'bookingdetail')->name('bookingdetail');
        Route::get('booking-delete/{id}', 'bookingdelete')->name('booking-delete');
    });
    Route::controller(paymentController::class)->group(function () {
        Route::post('payment', 'payment')->name('payment');
        Route::post('release-seats', 'releaseSeats')->name('release-seats');
        Route::post('ticketdetail', 'ticketdetail')->name('ticketdetail');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller(dashboardController::class)->group(function () {
        Route::get('dashboard', 'adminpage')->name('adminpage');
        Route::get('monthly-revenue-chart-data/{year}', 'getMonthlyRevenueChartData');
        Route::get('yearly-revenue-chart-data', 'getYearlyRevenueChartData');
        Route::get('top-movies-chart-data', 'getTopMoviesChartData');
    });
    Route::controller(accountController::class)->group(function () {
        Route::get('account',  'account')->name('account');
        Route::get('account/{UserID}', 'delete');
        Route::get('update/{UserID}',  'viewupdate')->name('viewupdate');
        Route::post('update/{UserID}',  'update')->name('update');
    });
    Route::controller(movieController::class)->group(function () {
        Route::get('movies', 'movies')->name('movies');
        Route::get('movies/{id}', 'delete');
        Route::get('mupdate/{id}', 'viewupdate')->name('mviewupdate');
        Route::post('mupdate/{id}', 'update')->name('mupdate');
        Route::get('madd', 'viewadd')->name('mviewadd');
        Route::post('madd', 'add')->name('madd');
        Route::post('update-status', 'updateStatus')->name('updateStatus');
    });
    Route::controller(genreController::class)->group(function () {
        Route::get('genres', 'genres')->name('genres');
        Route::get('genres/{id}', 'delete');
        Route::post('gupdate/{id}', 'update')->name('gupdate');
        Route::post('gadd', 'add')->name('gadd');
    });
    Route::controller(actorController::class)->group(function () {
        Route::get('actors', 'actors')->name('actors');
        Route::get('actors/{id}', 'delete');
        Route::post('actor-update/{id}', 'update')->name('actor-update');
        Route::post('actor-create', 'create')->name('actor-create');
    });
    Route::controller(cinemaController::class)->group(function () {
        Route::get('cinemas', 'cinemas')->name('cinemas');
        Route::get('cinemas/{id}', 'delete');
        Route::get('thupdate/{id}', 'viewupdate')->name('thviewupdate');
        Route::post('thupdate/{id}', 'update')->name('thupdate');
        Route::get('thadd', 'viewadd')->name('thviewadd');
        Route::post('thadd', 'add')->name('thadd');
        Route::get('getDistrict/{province_id}', 'getDistrict')->name('getDistrict');
        Route::get('getWard/{district_id}', 'getWard')->name('getWard');
    });
    Route::controller(theaterController::class)->group(function () {
        Route::get('theater', 'theater')->name('theater');
        Route::get('theater/{id}', 'delete');
        Route::get('getcinema/{province}', 'getcinema')->name('getcinema');
        Route::get('gettheater/{cinema_id}', 'gettheater')->name('gettheater');
        Route::get('theateradd', 'showcreate')->name('theatershowcreate');
        Route::post('theateradd', 'create')->name('theatercreate');
        Route::get('theateredit/{id}', 'showedit')->name('theatershowedit');
        Route::post('theateredit/{id}', 'edit')->name('theateredit');
    });
    Route::controller(seatController::class)->group(function () {
        Route::post('update-seats', 'updateSeats')->name('update.seats');
    });
    Route::controller(showController::class)->group(function () {
        Route::post('create-show', 'store')->name('create-show');
        Route::get('showtimes/{id}', 'showtimes')->name('showtimes');
        Route::post('showtimes-update/{id}', 'update')->name('showtimes-update');
        Route::get('showtimes-delete/{id}', 'delete');
        Route::get('get-theater/{cinema_id}', 'getTheater')->name('getTheater');
    });

    Route::controller(bannerController::class)->group(function () {
        Route::get('show-banner', 'banner')->name('show-banner');
        Route::get('create-banner', 'create')->name('create-banner');
        Route::post('store-banner', 'store')->name('store-banner');
        Route::get('edit-banner/{id}', 'edit')->name('edit-banner');
        Route::post('update-banner/{id}', 'update')->name('update-banner');
        Route::get('delete-banner/{id}', 'delete')->name('delete-Banner');
    });
    Route::controller(bookingController::class)->group(function () {
        Route::get('show-booking', 'booking')->name('show-booking');
        Route::get('show-booking-detail/{id}', 'detail')->name('show-booking-detail');
    });
});
