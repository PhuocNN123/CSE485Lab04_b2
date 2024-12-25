<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        Customer::create([
            'name' => $validatedData['name'],
            'address'=> $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Reader created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required|string|max:255',
            'email' => 'string|email|max:255',
        ]);
        $customer = Customer::find($id);
        $customer->update([
            'name' => $validatedData['name'],
            'address'=> $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Reader update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Reader deleted successfully.');
    }
}
