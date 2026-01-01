<?php

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\EventController;

// Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/events/search', [EventController::class, 'search'])
//     ->name('events.search');

// Route::get('/events/{id}', [EventController::class, 'show'])
//     ->name('events.show');

// Route::view('/contact', 'contact')->name('contact');

// use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\EventController;
// use App\Http\Controllers\TicketController;
// use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| الصفحات العامة
|--------------------------------------------------------------------------
*/

// Route::get('/', [EventController::class, 'index'])->name('home');

// Route::get('/events/{event}', [EventController::class, 'show'])
//     ->name('events.show');

/*
|--------------------------------------------------------------------------
| البحث
|--------------------------------------------------------------------------
*/

// Route::get('/search', [EventController::class, 'search'])
//     ->name('events.search');

/*
|--------------------------------------------------------------------------
| Auth (تسجيل دخول / تسجيل)
|--------------------------------------------------------------------------
*/

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

/*
|--------------------------------------------------------------------------
| عمليات Auth
|--------------------------------------------------------------------------
*/
// بئلا 
// Route::get('/login', fn() => view('auth.login'))->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route::get('/register', fn() => view('auth.register'))->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register');;


// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/login', fn() => view('auth.login'))->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/register', [AuthController::class, 'register'])->name('register');


// بي
// Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| مستخدم مسجل
|--------------------------------------------------------------------------
*/
// بر
// Route::middleware('auth')->group(function () {

//     Route::post('/tickets/{event}', [TicketController::class, 'store'])
//         ->name('tickets.store');

//     Route::get('/my-tickets', [TicketController::class, 'index'])
//         ->name('tickets.index');
    // Route::get('/admin/events', [EventController::class, 'adminIndex'])
    //     ->name('admin.events');
    // Route::get('/admin/events', [EventController::class, 'index'])->name('events.index');
// });

/*
|--------------------------------------------------------------------------
| Admin فقط
|--------------------------------------------------------------------------
*/
// ءؤب
// Route::middleware(['auth', 'isAdmin'])->group(function () {



    // Route::get('/admin/events/create', [EventController::class, 'create'])
    //     ->name('admin.events.create');

    // Route::post('/admin/events', [EventController::class, 'store'])
    //     ->name('admin.events.store');

    // Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])
    //     ->name('admin.events.edit');

    // Route::put('/admin/events/{event}', [EventController::class, 'update'])
    //     ->name('admin.events.update');

    // Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])
    //     ->name('admin.events.destroy');

// بي 
//     Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('events', [EventController::class, 'index'])->name('events.index');
//     Route::post('events', [EventController::class, 'store'])->name('events.store');
//     Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
//     Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
// });


    // Route::get('/admin/tickets', [TicketController::class, 'all'])
    //     ->name('admin.tickets');
    // Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');

// تتت
//     Route::get('/admin/tickets', [TicketController::class, 'index'])
//         ->name('admin.tickets');

//     Route::post('/admin/tickets', [TicketController::class, 'store'])
//         ->name('admin.tickets.store');

//     Route::put('/admin/tickets/{ticket}', [TicketController::class, 'update'])
//         ->name('admin.tickets.update');

//     Route::delete('/admin/tickets/{ticket}', [TicketController::class, 'destroy'])
//         ->name('admin.tickets.destroy');

// });


// Route::view('/contact', 'contact');
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::post('/contact', [ContactController::class, 'store'])
//     ->name('contact.store');





// هائذ
// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');







use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| الصفحات العامة
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/search', [HomeController::class, 'search'])
    ->name('events.search');

Route::get('/contact', fn () => view('contact'))
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Auth (Login / Register)
|--------------------------------------------------------------------------
*/

// Route::get('/login', fn () => view('auth.login'))->name('login');
// Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Route::get('/register', fn () => view('auth.register'))->name('register');
// Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| مستخدم مسجّل دخول
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/tickets/{event}', [TicketController::class, 'store'])
        ->name('tickets.store');

    Route::get('/my-tickets', [TicketController::class, 'index'])
        ->name('tickets.index');
});

/*
|--------------------------------------------------------------------------
| Admin فقط
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // إدارة الفعاليات
        Route::get('/events', [EventController::class, 'index'])
            ->name('events.index');

        Route::post('/events', [EventController::class, 'store'])
            ->name('events.store');

        Route::put('/events/{event}', [EventController::class, 'update'])
            ->name('events.update');

        Route::delete('/events/{event}', [EventController::class, 'destroy'])
            ->name('events.destroy');

        // إدارة التذاكر
        Route::get('/tickets', [TicketController::class, 'index'])
            ->name('tickets.index');

        Route::post('/tickets', [TicketController::class, 'store'])
            ->name('tickets.store');

        Route::put('/tickets/{ticket}', [TicketController::class, 'update'])
            ->name('tickets.update');

        Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])
            ->name('tickets.destroy');
    });
