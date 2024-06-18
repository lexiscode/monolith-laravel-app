<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return inertia::render('Index', [
            'customers' => Customer::all()->map(function($customer){
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                ];
            })
        ]);
    }

    public function create()
    {
        return inertia::render('Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:14|min:8'
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('message', 'Created successfully');
    }

    public function edit(Customer $customer)
    {
        return inertia::render('Edit', [
            'customer' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:14|min:8'
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('message', 'Updated successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('message', 'Deleted successfully');
    }
}
