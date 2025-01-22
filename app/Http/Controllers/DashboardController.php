<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Sales;
use App\Models\Seller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $sellers = Seller::all();
        $services = Service::all();
        $sales = Sales::all();
        $expenses = Expense::all();
        $users = User::all();
        return view('welcome', compact('sellers','services', 'sales', 'expenses', 'users'));
    }
}
