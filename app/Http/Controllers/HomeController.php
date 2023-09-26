<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $urls = Url::query()->paginate(30);
        return view('welcome',compact('urls'));
    }
}
