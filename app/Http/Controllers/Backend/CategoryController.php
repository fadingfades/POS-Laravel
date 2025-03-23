<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function AllCategory(){
        $category = Category::latest()->get();
        return view('backend.category.all_category',compact('category'));
    }

    public function StoreCategory(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan!'
        ]);
    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $request) {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui!'
        ]);
    }

    public function DeleteCategory($id) {
        Category::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus!'
        ]);
    }
}
