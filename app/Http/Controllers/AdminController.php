<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.index', compact('customer'));
    }
}
