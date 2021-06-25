<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function sendMail(Request $request, $numero)
    {
        $user = $request->user();
        $correo = New TestMail($user, $numero);
        Mail::to($user)->send($correo);

        return "El correo ha sido enviado a su bandeja de entrada";
    }
}
