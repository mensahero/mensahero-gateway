<?php

use App\Http\Controllers\Modules\ContactsController;

Route::middleware('auth')->prefix('contacts')->group(function () {
    Route::get('/', [ContactsController::class, 'create'])
        ->name('contacts.create');
});
