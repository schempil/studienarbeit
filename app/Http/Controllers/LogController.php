<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

use App\Http\Requests;

class LogController extends Controller
{
    public function index() {
        $logs = Log::orderBy('created_at', 'desc')->get();
        return view('admin.log.index', ['logs' => $logs]);
    }
}
