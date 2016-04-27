<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devcount = Device::all()->count();
        $avdevcount = Device::where('available', '=', '1')->count();
        $personcount = Person::all()->count();
        $delayed = Device::whereNotNull('lent_by')->where('back', '<', Carbon::now())->orderBy('back', 'asc')->count();
        return view('home', ['devcount' => $devcount, 'personcount' => $personcount, 'avdevcount' => $avdevcount, 'delayed' => $delayed]);
    }
}
