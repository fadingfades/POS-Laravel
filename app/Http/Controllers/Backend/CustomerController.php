<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function AllCustomer() {
        $customer = Customer::latest()->get();
        return view('backend.customer.all_customer', compact('customer'));
    }

    public function AddCustomer() {
        return view('backend.customer.add_customer');
    }

    public function StoreCustomer(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:customers|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
            'account_holder' => 'required|max:200',
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(300,300)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Customer inserted successfully!',
                'data' => $customer,
            ]);
        }

        return redirect()->route('all.customer')->with([
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function EditCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function UpdateCustomer(Request $request)
    {
        $customer_id = $request->id;
        $customer = Customer::findOrFail($customer_id);

        $data = $request->except('image', 'id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(300,300)->save('upload/customer/'.$name_gen);
            $data['image'] = 'upload/customer/'.$name_gen;

            // Optionally delete old image here if needed
            if (file_exists($customer->image)) {
                unlink($customer->image);
            }
        }

        $customer->update($data + ['created_at' => Carbon::now()]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Customer updated successfully!',
                'data' => $customer,
            ]);
        }

        return redirect()->route('all.customer')->with([
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function DeleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);

        if (file_exists($customer->image)) {
            unlink($customer->image);
        }

        $customer->delete();

        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Customer deleted successfully!',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success',
        ]);
    }
}
