<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Transaction;
use App\Models\Sale;

class PosController extends Controller
{
    public function Pos(){
        $product = Product::with('category')->latest()->get();
        $customer = Customer::latest()->get();
        $categories = $product->pluck('category')->unique('id');
        $cartItems = Cart::content();
        return view('backend.pos.pos_page', compact('product','customer', 'categories', 'cartItems'));
    }

    public function AddCart(Request $request) {
        $product = Product::find($request->id);

        if ($product && $request->qty > $product->product_store) {

            $notification = array(
                'message' => 'Stock habis!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => 20,
            'options' => ['image' => $product->product_image, 'product_code' => $product->product_code]
        ]);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllItem(){
        $product_item = Cart::content();
        return view('backend.pos.text_item',compact('product_item'));
    }

    public function CartUpdate(Request $request,$rowId){
        $qty = $request->qty;
        $update = Cart::update($rowId,$qty);

        $notification = array(
            'message' => 'Cart Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CartRemove($rowId){
        Cart::remove($rowId);

        $notification = array(
            'message' => 'Cart Remove Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CartClear() {
        Cart::destroy();
        return redirect()->back()->with('message', 'Keranjang berhasil dikosongkan.');
    }

    public function CreateInvoice(Request $request) {
        $contents = Cart::content();
        $cust_id = $request->customer_id;
        $customer = Customer::find($cust_id);
        $totalAmount = $contents->sum(fn($item) => $item->price * $item->qty);

        // Create transaction record
        $transaction = Transaction::create([
            'customer_id' => $cust_id,
            'total_amount' => $totalAmount,
            'transaction_date' => now(),
        ]);

        foreach ($contents as $item) {
            $product = Product::find($item->id);
            if ($product) {
                // Deduct stock
                $newStock = max(0, $product->product_store - $item->qty);
                $product->update(['product_store' => $newStock]);

                // Save sale record
                Sale::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'total' => $item->price * $item->qty,
                    'sale_date' => now(),
                ]);
            }
        }

        return view('backend.invoice.product_invoice', compact('contents', 'customer'));
    }
}
