<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeDonaturController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('usr_donatur/index');
    }
}
