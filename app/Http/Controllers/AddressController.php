<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        // return Auth::id();

        $addresses = Address::where('user_id', Auth::id())->paginate(5);
        // $addresses = Address::where('user_id', 3)->paginate(5);
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pin' => 'required|string|max:10',
            'status' => 'required|in:default,home,office,others',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'address_line' => $request->address_line,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pin' => $request->pin,
            'status' => $request->status,
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address added successfully.');
    }

    public function show(Address $address)
    {
        $this->authorizeUser($address);
        return view('addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $this->authorizeUser($address);
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $this->authorizeUser($address);

        $request->validate([
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pin' => 'required|string|max:10',
            'status' => 'required|in:default,home,office,others',
        ]);

        $address->update($request->all());

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        $this->authorizeUser($address);
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    }

    private function authorizeUser(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
