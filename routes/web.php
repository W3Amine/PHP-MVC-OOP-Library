<?php
use src\Http\Route;
use App\Controllers\itemSearch;
use App\Controllers\schedulers;
use App\Controllers\EditAccount;
use App\Controllers\LoginAndLogout;
use App\Controllers\ItemsController;
use App\Controllers\RegisterController;
use App\Controllers\itemReservationController;
use App\Controllers\RestoreBorrowingController;
use App\Controllers\ActiveReservationController;
use App\Controllers\CancelReservationController;
use App\Controllers\ReservationAndBorrowingSearch;

Route::get('/', function () {
    return view('home');
});
 // only guests can access to this routes
if (is_guest()) {
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginAndLogout::class, 'login']);
}
if (!is_guest()) {
    Route::get('/logout', [LoginAndLogout::class, 'logout']);
    Route::post('/profile/edit', [EditAccount::class, 'edit']);

    Route::get('/profile', [ReservationAndBorrowingSearch::class, 'Search']);

    Route::get('/profile/edit', function () {
        return view('editProfile');
    });
    Route::get('/items', [itemSearch::class, 'search']);
    // only admin can access to this routes
    if (is_admin()) {
        Route::get('/items/add', function () {
            return view('AddItem');
        });
        Route::post('/items/add', [ItemsController::class, 'add']);
        Route::get('/items/edit', [ItemsController::class, 'GetItemInfo']);
        Route::post('/items/edit', [ItemsController::class, 'edit']);
        Route::get('/items/delete', [ItemsController::class, 'delete']);
        Route::get('/reservation/active', [ActiveReservationController::class, 'ActiveReservation']);
        Route::get('/borrowing/restored', [RestoreBorrowingController::class, 'Restore']);
        Route::get('/schedulers', [schedulers::class, 'run']);
    }
    // only user can access to this routes
    if (is_user()) {
        Route::get('/items/reserve', [itemReservationController::class, 'reserve']);
        Route::get('/reservation/cancel', [CancelReservationController::class, 'Cancel']);
    }
}

