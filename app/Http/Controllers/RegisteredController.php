<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisteredController extends Controller
{
    public function store()
    {
        Mail::to(Auth::user()->email)
        ->send(new Registered([
            'firstName' => Auth::user()->firstName, 
            'lastName' => Auth::user()->lastName,
            'emailCompany' => 'contactEkip@ceqonveut.com',
            'email' => Auth::user()->email,
            'companyName' => 'Gamingue']));
        
    }
}
