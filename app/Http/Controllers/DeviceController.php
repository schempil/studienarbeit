<?php

namespace App\Http\Controllers;

use App\Category;
use App\Device;
use App\Log;
use App\ProposalGenerator;
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
        $categories = Category::all();
        return view('device.create', ['categories' => $categories]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'device_number' => 'required',
            'supplier' => 'required',
            'inventory' => 'required',
            'location' => 'required',
            'available' => 'required'
        ]);

        $device = new Device();
        $device->name = $request->name;
        $device->description = $request->description;
        $device->category_id = $request->category;
        $device->available = false;
        if($request->available) {
            $device->available = true;
        }
        $device->device_number = $request->device_number;

        $device->inventory = $request->inventory;
        $device->supplier = $request->supplier;
        $device->location = $request->location;

        $device->volume = $request->volume;
        $device->billdate = $request->billdate;

        $device->active = true;
        $device->save();

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'create device';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/device')->with('message', 'Geräte wurde erfolgreich hinzugefügt');
    }

    public function edit($id) {
        $device = Device::findOrfail($id);
        $categories = Category::all();
        return view('device.edit', ['device' => $device, 'categories' => $categories]);
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'device_number' => 'required',
            'available' => 'required'
        ]);

        $device = Device::findOrFail($id);
        $device->name = $request->name;
        $device->description = $request->description;
        $device->category_id = $request->category;
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

        return redirect('/device')->with('message', 'Geräte wurde erfolgreich bearbeitet.');
    }

    public function delete($id) {
        $device = Device::findOrFail($id);
        return view('device.delete', ['device' => $device]);
    }

    public function destroy($id) {
        $device = Device::findOrFail($id);

        return '<img src="' . ProposalGenerator::aussonderung(
            'Informatik',
            $device->name,
            $device->inventory,
            $device->supplier,
            $device->location,
            $device->volume,
            $device->billdate,
            $device->device_number
        ) . '">';

        if($device->available) {
            $device->active = false;
            $device->save();
        }

        $log = new Log();
        $log->device_id = $device->id;
        $log->type = 'delete device';
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect('/device')->with('message', 'Geräte wurde erfolgreich entfernt');
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

        return redirect('/admin/restoredevices')->with('message', 'Gerät wurde erfolgreich wiederhergestellt.');
    }
}
