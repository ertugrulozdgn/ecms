<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        return view('cms.dashboard.index');

    }
}
