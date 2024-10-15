<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rooms = \App\Models\Room::all();
    return view('welcome', [
        "rooms" => $rooms
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/test", [\App\Http\Controllers\TestController::class, "fire_event"]);

    Route::resource("/room", \App\Http\Controllers\RoomController::class);
    Route::resource("/panel", \App\Http\Controllers\PanelController::class);

    Route::post("/force_reload", [\App\Http\Controllers\ControlScreensController::class, "force_reload"]);

});

require __DIR__.'/auth.php';
