<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\PublicBoardController;

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
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');
    Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
});



Route::resource('clubs', ClubController::class)->middleware(['auth', 'role:admin']);
Route::resource('events', EventController::class)->middleware(['auth','role:admin|manager']);
Route::resource('board-members', BoardMemberController::class)->middleware(['auth']);
Route::resource('veranstaltungen', PublicEventController::class)->only(['index', 'show'])->parameters(['veranstaltungen' => 'event']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/board', [PublicBoardController::class, 'index'])->name('board');


require __DIR__.'/auth.php';
