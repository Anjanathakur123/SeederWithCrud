<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.category');
    }

    public function store(Request $request)
    {
        dd($request->all());
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'product_name'=>'required|string|max:255',
                'product_description'=>'nullable|string',
                'price' => 'required|numeric|min:0|max:9.99',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             ]);
            $category = Category::create([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('product_images', 'public');
            } else {
                return 'error';
            }

            Product::create([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'price' => $request->price,
                'image' => $imagePath,
                'category_id' => $category->id,
            ]);

            DB::commit();
            return redirect()->route('show')->with('success', 'Category and Product added successfully!');
        } catch (\Exception $ex) {
            DB::rollback();

            Log::error('Error saving data: ' . $ex->getMessage());

            return redirect()->back()->with('error', 'Failed to save data. Please try again.');
        }
    }
}
