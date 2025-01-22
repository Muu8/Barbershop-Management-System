<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function destroy(Payment $payment){
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'تم حذف الخدمة بنجاح');
    }

    public function create(){
        return view('payments.create');
    }

    public function store(){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
        ]);
        Payment::create($valdated);
        return redirect()->route('payments.index')->with('success', 'تم اضافة وسيلة الدفع');
    }
}

