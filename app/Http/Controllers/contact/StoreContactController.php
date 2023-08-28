<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;


use App\DataObjects\Contacts\ContactDataObject;
use App\Http\Requests\Contact\ContactRequest;


class StoreContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request)
    {
       $DTO = ContactDataObject::make(
            request:$request,
       );
    }
}
