<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

use App\Http\Requests;

class DeviceController extends Controller
{
    public function index() {
        $devices = Device::paginate(10);

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

        return redirect('/device');
    }
}
