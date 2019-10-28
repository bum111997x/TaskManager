<?php

namespace App\Http\Controllers;

use App\Customer;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $customers = $this->customer->paginate(5);
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

        if (!$request->hasFile('inputFile')) {
            $this->customer->image = $request->inputFile;
        } else {
            $file = $request->file('inputFile');

            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;

            $newFileName = "$fileName.$fileExtension";

            $request->file('inputFile')->storeAs('public/images', $newFileName);

            $this->customer->image = $newFileName;
        }


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
        $customer = $this->customer->findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customer.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $DBSearch = DB::table('customermanager')->where('name', 'LIKE', "%$search%")->paginate(5);

        return view('search', compact('DBSearch'));

    }

}
