<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function AllSupplier() {
        $supplier = Supplier::latest()->get();
        return view('backend.supplier.all_supplier', compact('supplier'));
    }

    public function AddSupplier() {
        return view('backend.supplier.add_supplier');
    }

    public function StoreSupplier(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:suppliers|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
            'account_holder' => 'required|max:200',
            'type' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(300,300)->save('upload/supplier/'.$name_gen);
        $save_url = 'upload/supplier/'.$name_gen;

        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'type' => $request->type,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        return response()->json(['success' => 'Supplier added successfully']);
    }

    public function EditSupplier($id){
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    public function UpdateSupplier(Request $request){
        $supplier_id = $request->id;
        $supplier = Supplier::findOrFail($supplier_id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(300,300)->save('upload/supplier/'.$name_gen);
            $save_url = 'upload/supplier/'.$name_gen;
            if (file_exists($supplier->image)) {
                unlink($supplier->image);
            }
            $supplier->image = $save_url;
        }

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'type' => $request->type,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
        ]);

        return response()->json(['success' => 'Supplier updated successfully']);
    }

    public function DeleteSupplier($id){
        $supplier = Supplier::findOrFail($id);
        if (file_exists($supplier->image)) {
            unlink($supplier->image);
        }
        $supplier->delete();

        return response()->json(['success' => 'Supplier deleted successfully']);
    }

    public function DetailsSupplier($id){
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }
}
