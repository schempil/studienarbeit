<?php

namespace App\Http\Controllers;

use App\Device;
use App\Log;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        $selectedDevice = false;
        if(isset($_REQUEST['device'])) {
            $selectedDevice = Device::findOrFail($_REQUEST['device']);
        }

        $devices = Device::active()->where('available', '=', '1')->get();
        $people = Person::all();
        if($selectedDevice) {
            return view('loan.create', ['devices' => $devices, 'people' => $people, 'selectedDevice' => $selectedDevice]);
        }
        return view('loan.create', ['devices' => $devices, 'people' => $people]);
    }

    public function store(Request $request) {
        $device = Device::findOrFail($request->device);
        $device->lent_by = $request->person;
        $device->available = 0;
        $device->back = $request->back;
        $device->save();

        $log = new Log();
        $log->device_id = $device->id;
        $log->person_id = $request->person;
        $log->type = 'create loan';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/loan')->with('message', 'Leihgabe erfolgreich eingetragen.');
    }

    public function show($id) {
        $device = Device::findOrFail($id);
        return view('loan.show', ['device' => $device]);
    }
}
