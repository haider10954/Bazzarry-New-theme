<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public  function index()
    {
        $seller = Seller::get()->count();
        return view('admin.pages.index',compact('seller'));
    }
}
