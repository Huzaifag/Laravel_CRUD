<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        return view('product.index', ['products'=> Product::all()]);
    }
    public function create(){
        return view('product.create');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,gif'
        ], [
            'image.mimes' => 'Invalid image format. Please upload a valid file.'
        ]);

        $image_name = time() . '.'. $request->file('image')->extension();
        $request->file('image')->move(public_path('products'), $image_name);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $image_name;
        $product->save();

        return back()->withStatus('Product added Successfully');

    }
    public function delete($id) {
        $product = Product::findOrFail($id);
        $image_path = public_path('products/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path); // Deletes the file
            $product->delete();
            return back()->withStatus('Product deleted Successfully');
        }else{
            return back()->withStatus('Product failed delete');
        }
    }
    public function edit($id){
        return view('product.edit', ['product'=> Product::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete the old image if it exists
            $old_image_path = public_path('products/' . $product->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            // Save the new image
            $new_image_name = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('products'), $new_image_name);
            $product->image = $new_image_name;
        }

        // Update other product fields
        $product->name = $request->name;
        $product->description = $request->description;

        if($product->save()){
            return back()->withStatus('Product Updated successfully');
        }else{
            return back()->withStatus('Product failed to update');
        } // Save changes to the database
    }

}
