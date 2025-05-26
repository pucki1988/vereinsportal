<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\PublicBoardController;
use App\Http\Controllers\PublicClubController;
use App\Http\Controllers\CalendarExportController;

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroyUser'])
    ->middleware(['auth', 'role:admin'])
    ->name('profile.destroyUser');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');
    Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->name('invitations.destroy');
});



Route::resource('clubs', ClubController::class)->middleware(['auth', 'role:admin|manager']);
Route::resource('events', EventController::class)->middleware(['auth','role:admin|manager']);
Route::resource('board-members', BoardMemberController::class)->middleware(['auth','role:admin']);


Route::resource('veranstaltungen', PublicEventController::class)->only(['index', 'show'])->parameters(['veranstaltungen' => 'event']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/board', [PublicBoardController::class, 'index'])->name('board');

Route::resource('clubinfo', PublicClubController::class)->only(['show'])->parameters(['clubinfo' => 'club']);
Route::get('/calender/events.ics', [CalendarExportController::class, 'ics'])->name("calendar.export");

require __DIR__.'/auth.php';
