<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Resources\Module\ContactResource;
use Inertia\Inertia;

class ContactsController extends Controller
{
    public function create(): \Inertia\Response
    {
        return Inertia::render('Contacts', [
            'contacts' => Inertia::optional(fn () => ContactResource::collection(auth()->user()->contacts()->paginate(10))),
        ]);
    }
}
