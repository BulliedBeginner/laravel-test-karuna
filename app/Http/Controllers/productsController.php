<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class productsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $data = compact("products");
        return view("products.index")->with($data);
    }

    // return view page
    public function show($id)
    {
        $product = Products::find($id);
        $data = compact("product");
        return view("products.show")->with($data);
    }

    // create a new product (API)
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'publish' => 'required|boolean'
        ]);
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->publish = $request->publish;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // return view when navigate to edit page
    public function edit($id)
    {
        $product = Products::find($id);
        $data = compact("product");
        return view("products.edit")->with($data);
    }

    // update a product (API)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'publish' => 'required'
        ]);
        $product = Products::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->publish = $request->publish;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // delete a product (API)
    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    // search for a product (API)
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $products = Products::all();
        } else {
            $products = Products::where('name', 'LIKE', "%{$query}%")
                ->orWhere('details', 'LIKE', "%{$query}%")
                ->get();
        }

        $output = '';
        $iteration = 1; // Initialize iteration counter
        foreach ($products as $product) {
            $output .= '<tr>';
            $output .= '<td>' . $iteration . '</td>'; // Use the iteration counter
            $output .= '<td>' . $product->name . '</td>';
            $output .= '<td>' . $product->price . '</td>';
            $output .= '<td>' . $product->details . '</td>';
            $output .= '<td>' . ($product->publish ? 'Yes' : 'No') . '</td>';
            $output .= '<td>';
            $output .= '<a href="' . route('products.show', $product->id) . '" class="btn btn-info btn-sm">Show</a> ';
            $output .= '<a href="' . route('products.edit', $product->id) . '" class="btn btn-primary btn-sm">Edit</a> ';
            $output .= '<form action="' . route('products.delete', $product->id) . '" method="post" style="display:inline;">';
            $output .= csrf_field();
            $output .= method_field('DELETE');
            $output .= '<button class="btn btn-danger btn-sm">Delete</button>';
            $output .= '</form>';
            $output .= '</td>';
            $output .= '</tr>';
            $iteration++; // Increment the iteration counter
        }

        return response()->json($output);
    }
}
