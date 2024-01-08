<?php
namespace App\Http\Controllers;
\Storage::url('products/product_image.jpg');

use App\Models\User;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        return view('users.index',compact('productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $products = Product::where('name', 'like', "%$query%")
                ->orWhere('sku', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%")
                ->orWhere('tax', 'like', "%$query%")
                ->orWhere('hsn_code', 'like', "%$query%")
                ->orWhere('type', 'like', "%$query%")
                ->paginate(4);

            return view('products.view', compact('products','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $products = Product::with(['tax', 'unit'])->paginate(10);
            return view('products.view', compact('products', 'productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
    }

    public function create(){   
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        $taxes = Tax::all();
        $units = Unit::all();
        return view('products.add',compact('productCount','taxCount','unitCount','stockCount','taxes','units','supplierCount'));
    }

    public function store(Request $request){    
        $data = [
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'product_purchase_rate' => $request->product_purchase_rate,
            'tax_id' => $request->tax_id,
            'unit_id' => $request->unit_id,
            'hsn_code' => $request->hsn_code,   
            'barcode' => $request->barcode,
            'type' => $request->type,
            'image' => $request->image,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('products', ['disk' => 'public']);
        }
    
        $product = Product::create($data);
        
        return redirect('products')->with('status', 'Product Added successfully.')->with('alert-type', 'success');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/products')->with('error', 'Product not found.');
        }

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists("public/$product->image")) {
                Storage::delete("public/$product->image");
            }

            $newImage = $request->image->store('products', ['disk' => 'public']);

            $product->update(array_merge($request->all(), ['image' => $newImage]));
        } else {
            $product->update($request->all());
        }

        return redirect('/products')->with('status', 'Product updated successfully.')->with('alert-type', 'info');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            if ($product->image && Storage::exists("public/$product->image")) {
                Storage::delete("public/$product->image");
            }
            $product->delete();
            return redirect()->route('products.index')->with('status', 'Product deleted successfully.')->with('alert-type', 'danger');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

}
