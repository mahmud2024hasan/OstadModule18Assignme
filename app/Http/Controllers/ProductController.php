<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Search product by name
    public function search(Request $request)
    {   
        // Get the search query
        $query = $request->input('query');

        // Fetch products based on the search query
        $products = Product::where('name', 'like', "%$query%")->get();
    
        // Return a view with the search results
        return view('search', compact('products'))->render();
    }
    

    // Show products page
    public function index(Request $request)
    {
        // Fetch sorting parameters
        $sortColumn = $request->input('sort', 'product_id'); // Default sort column
        $sortDirection = $request->input('direction', 'asc'); // Default sort direction

        // Fetch paginated products with sorting
        $products = Product::orderBy($sortColumn, $sortDirection)->paginate(4);

        // Return the view with products and sorting parameters
        return view('index', [
            'products' => $products,
            'sortColumn' => $sortColumn,
            'sortDirection' => $sortDirection,
        ]);
    }


    // Show add product form
    public function create()
    {
        return view('create');
    }

    // Insert product data to database
    public function store(Request $request)
    {
        //dd($request->file());
        //Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Generate the product_id automatically by finding the last one and incrementing it
        $lastProduct = Product::orderBy('product_id', 'desc')->first();
        $productId = $lastProduct ? $lastProduct->product_id + 1 : 1;  // If no product exists, start from 1

        // Add the product_id to the validated data
        $validatedData['product_id'] = $productId;

        // Check if an image has been uploaded
        if ($request->hasFile('image')) {
            // Store the image and get its path
            $imagePath = $request->file('image')->store('images', 'public');

            // Add the image path to the validated data
            $validatedData['image'] = $imagePath;
        }

        //dd($validatedData);
        //Insert the validated data into the database using the Product model
        Product::create($validatedData);

        // Redirect to a specific route or page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show edit product form
    public function edit($id)
    {
        // Retrieve the product from the database
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('edit', compact('product'));
    }

    // Update product data in database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Image is optional
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Upload the new image using the store() method
            $imagePath = $request->file('image')->store('images', 'public'); // Save in the "images" directory under "public/storage"

            // Delete the old image (optional, if necessary)
            if ($product->image && file_exists(public_path('storage/' . $product->image))) {
                unlink(public_path('storage/' . $product->image));
            }

            // Save the new image path
            $product->image = $imagePath; // The path will already include the "images/" directory
        }

        // Save the product
        $product->save();

        // Redirect back with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete specific product from database with id
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if ($product) {
            // If an image exists, delete it
            if ($product->image) {

                // Get the image path
                $imagePath = public_path('storage/' . $product->image);

                // Delete the image
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Delete the product
            $product->delete();

            // Redirect back with success message
            return redirect()->route('products.index')->with('success', 'Product and image deleted successfully');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
    }

    // Show specific product details
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }

}
