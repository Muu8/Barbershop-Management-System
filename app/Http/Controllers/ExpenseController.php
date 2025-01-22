<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index(){
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }


    public function create(){
        return view('expenses.create');
    }

    public function store(){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
            'price' => 'required | numeric'
        ]);
        Expense::create($valdated);
        return redirect()->route('expenses.index')->with('success', 'تم اصافة مصاريف جديدة');
    }

    public function edit(Expense $expense){
        return view('expenses.edit', compact('expense'));
    }


    public function update(Expense $expense){
        $valdated = request()->validate([
            'name' => 'required | min:3 | max: 240',
            'price' => 'required | numeric'
        ]);
        $expense->update($valdated);
        return redirect()->route('expenses.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function destroy(Expense $expense){
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'تم حذف المصاريف بنجاح');
    }

}
