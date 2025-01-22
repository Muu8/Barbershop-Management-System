<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Sales;
use App\Models\Seller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index(){
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }

    public function create(){
        $services = Service::all();
        $payments = Payment::all();
        $sellers = Seller::all();
        return view('sales.create', compact('services', 'sellers', 'payments'));
    }

    public function store(){
        $valdated = request()->validate([
            'name' => 'required | exists:services,name',
            'price' => 'required| numeric',
            'seller_id' => 'required | exists:sellers,id',
            'payment' => 'required| exists:payments,name',
        ]);
        Sales::create($valdated);
        return redirect()->route('sales.index')->with('success', 'تمت الاضافة');
    }

    public function edit($sales_id){
        $sales = Sales::findOrFail($sales_id);
        $services = Service::all();
        $payments = Payment::all();
        $sellers = Seller::all();
        return view('sales.edit', compact('sales', 'services', 'payments', 'sellers'));
    }

    public function update($sales_id){
        $sales = Sales::find($sales_id);
        $valdated = request()->validate([
            'name' => 'required | exists:services,name',
            'price' => 'required| numeric',
            'seller_id' => 'required | exists:sellers,id',
            'payment' => 'required| exists:payments,name',
        ]);
        $sales->update($valdated);

        return redirect()->route('sales.index')->with('success', 'تم تعديل البيانات بنجاح');
    }


    public function destroy($sales_id){
        Sales::where('id', $sales_id)->delete();
        return redirect()->route('sales.index')->with('success','تم حذف البيانات بنجاح');
    }
}
