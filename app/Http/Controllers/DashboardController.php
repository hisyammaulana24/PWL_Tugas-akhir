<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Orders;  
use App\Models\Customer;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        $customers = Customer::all();
        $products = Product::all();

        return view('dashboard.dashboard', compact('orders', 'customers', 'products'));
    }
}
