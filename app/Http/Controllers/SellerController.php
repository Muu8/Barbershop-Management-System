<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        $sellers = Seller::all();
        return view('sellers.index', compact('sellers'));
    }

    public function show(Seller $seller){
        return view('sellers.show', compact('seller'));
    }

    public function create(){
        return view('sellers.create');
    }

    public function store(){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
        ]);
        Seller::create($valdated);
        return redirect()->route('sellers.index')->with('success', 'تم اضافة حلاق جديد');
    }


    public function edit(Seller $seller){
        return view('sellers.edit', ['seller_id' => $seller->id, 'seller' => $seller]);
    }

    public function update(Seller $seller){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
        ]);
        $seller->update($valdated);
        return redirect()->route('sellers.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function destroy(Seller $seller){
        $seller->delete();
        return redirect()->route('sellers.index')->with('success', 'تم حذف بيانات الحلاق بنجاح');
    }

}
