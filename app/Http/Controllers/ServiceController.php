<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function edit(Service $service){

        return view('services.edit', ['service_id' => $service->id, 'service' => $service]);
    }

    public function update(Service $service){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
            'price' => 'required| numeric'
        ]);
        $service->update($valdated);
        return redirect()->route('services.index')->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function create(){
        return view('services.create');
    }

    public function store(){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
            'price' => 'required| numeric'
        ]);
        Service::create($valdated);
        return redirect()->route('services.index')->with('success', 'تم اضافة خدمة جديدة');
    }

    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}



