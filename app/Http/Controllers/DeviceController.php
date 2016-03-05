<?php

namespace App\Http\Controllers;

use App\Device;
use App\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function index() {
        $devices = Device::paginate(12);

        if(isset($_REQUEST['available'])) {
            if($_REQUEST['available'] == 1) {
                $devices = Device::where('available', '=', '1')->paginate(10);
            }
            if($_REQUEST['available'] == 0) {
                $devices = Device::where('available', '=', '0')->paginate(10);
            }
        }
        return view('device.index', ['devices' => $devices]);
    }


    public function create() {
        return view('device.create');
    }

    public function store(Request $request) {
        $device = new Device();
        $device->name = $request->name;
        $device->description = $request->description;
        $device->available = false;
        if($request->available) {
            $device->available = true;
        }
        $device->device_number = $request->device_number;
        $device->save();

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'create device';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/device');
    }

    public function edit($id) {
        $device = Device::findOrfail($id);
        return view('device.edit', ['device' => $device]);
    }

    public function update(Request $request, $id) {
        $device = Device::findOrFail($id);
        $device->name = $request->name;
        $device->description = $request->description;
        $device->device_number = $request->device_number;
        $device->available = false;
        if($request->available) {
            $device->available = true;
        }
        $device->save();

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'edit device';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/device');
    }
}
