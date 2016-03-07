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
        $devices = Device::active()->paginate(12);

        if(isset($_REQUEST['available'])) {
            if($_REQUEST['available'] == 1) {
                $devices = Device::active()->where('available', '=', '1')->paginate(10);
            }
            if($_REQUEST['available'] == 0) {
                $devices = Device::active()->where('available', '=', '0')->paginate(10);
            }
        }
        return view('device.index', ['devices' => $devices]);
    }

    public function show($id) {
        $device = Device::findOrFail($id);
        $logs = Log::where('device_id', '=', $device->id)->orderBy('created_at', 'desc')->get();
        return view('device.show', ['device' => $device, 'logs' => $logs]);
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
        $device->active = true;
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

    public function delete($id) {
        $device = Device::findOrFail($id);
        return view('device.delete', ['device' => $device]);
    }

    public function destroy($id) {
        $device = Device::findOrFail($id);
        if($device->available) {
            $device->active = false;
            $device->save();
        }

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'delete device';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/device');
    }

    public function restoreindex() {
        $devices = Device::inactive()->paginate(16);
        return view('admin.device.index', ['devices' => $devices]);
    }

    public function restoredevice($id) {
        $device = Device::findOrFail($id);
        $device->active = true;
        $device->save();

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'restore device';
        $log->user_id = Auth::user()->id;
        $log->save();
    }
}
