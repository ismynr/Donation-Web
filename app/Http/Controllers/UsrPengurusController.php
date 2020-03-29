<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsrPengurusController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('usr_pengurus/index');
    }
}
