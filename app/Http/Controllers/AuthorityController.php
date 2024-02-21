<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index()
    {
        return view('frontend.authority.index');
    }
}
