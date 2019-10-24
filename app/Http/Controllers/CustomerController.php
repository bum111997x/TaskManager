<?php

namespace App\Http\Controllers;

use App\Customer;
use Cassandra\Custom;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->middleware('auth');
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->all();
        return view('index', compact('customers'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->customer->name = $request->name;
        $this->customer->phone = $request->phone;
        $this->customer->email = $request->email;
        $this->customer->address = $request->address;
        $this->customer->save();

        return redirect()->route('customer.index');
    }

    public function delete($id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = $this->customer->findOrFail($id);
        return view('edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->customer->findOrFail($id);
        $this->customer->update($request->all());

        return redirect()->route('customer.index');
    }

}
