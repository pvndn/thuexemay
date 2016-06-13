<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    protected $settings;

    public function __construct(Setting $settings) {
        $this->settings = $settings;
    }

    public function index() {
    	$setting = $this->settings->first();
    	return view('administrator.settings.create', compact('setting'));
    }
    
    public function create(SettingRequest $request) {
    	$setting = $this->settings->create($request->all());
    	return redirect()->back()->with(['messages' => 'Cập nhật thành công.', 'type' => 'success']);
    }

    public function update(SettingRequest $request, $id) {
    	$setting = $this->settings->find($id);
        $setting->update($request->all());

        return redirect()->back()->with(['messages' => 'Cập nhật thành công.', 'type' => 'success']);
    }
}
