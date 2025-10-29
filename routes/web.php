<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

use App\Livewire\Posts\Index as PostIndex;
use App\Livewire\Posts\Create as PostCreate;
use App\Livewire\Posts\Edit as PostEdit;
use App\Livewire\Posts\Show as PostShow;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', PostIndex::class)->name('posts.index');
    Route::get('/posts/create', PostCreate::class)->name('posts.create');
    Route::get('/posts/{post}/edit', PostEdit::class)->name('posts.edit');
    Route::get('/posts/{post}', PostShow::class)->name('posts.show');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
