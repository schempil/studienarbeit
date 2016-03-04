<?php

namespace App\Http\Controllers;

use App\Device;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoanController extends Controller
{
    public function index() {
        $devices = Device::whereNotNull('lent_by')->orderBy('back', 'asc')->get();

        if(isset($_REQUEST['delayed'])) {
            $devices = Device::whereNotNull('lent_by')->where('back', '<', Carbon::now())->orderBy('back', 'asc')->get();
        }

        return view('loan.index', ['devices' => $devices]);
    }

    public function create() {
        $selectedDevice = Device::findOrFail($_REQUEST['device']);
        $devices = Device::where('available', '=', '1')->get();
        $people = Person::all();
        return view('loan.create', ['devices' => $devices, 'people' => $people, 'selectedDevice' => $selectedDevice]);
    }

    public function store(Request $request) {
        $device = Device::findOrFail($request->device);
        $device->lent_by = $request->person;
        $device->available = 0;
        $device->back = $request->back;
        $device->save();

        return redirect('/loan');
    }

    public function show($id) {
        $device = Device::findOrFail($id);
        return view('loan.show', ['device' => $device]);
    }
}
