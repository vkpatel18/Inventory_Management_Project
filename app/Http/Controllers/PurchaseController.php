<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 
use App\Models\Purchase; 
use App\Models\Category; 

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $purchases = Purchase::where('name', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%")
                ->orWhere('quantity', 'like', "%$query%")
                ->paginate(2);

            return view('purchases.view', compact('purchases','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $purchases = Purchase::paginate(3);
            return view('purchases.view',compact('purchases','productCount','taxCount','unitCount','stockCount','supplierCount'));
        }
    }

    public function create()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        $products = Product::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $suppliers = Supplier::pluck('first_name', 'id');
        return view('purchases.add',compact('products','suppliers','categories','productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $purchase = Purchase::create($data); 
        return redirect('purchases')->with('status', 'Purchase Added successfully.')->with('alert-type', 'success');
    }

    public function edit(string $id)
    {
        $purchase = Purchase::find($id);
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        
        $selectedProductId = $purchase->product_id;
        $selectedCategoryId = $purchase->category_id;
        $selectedSupplierId = $purchase->supplier_id;
        return view('purchases.edit',compact('purchase','products','categories','suppliers','selectedProductId','selectedCategoryId','selectedSupplierId'));
    }

    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);
        $purchase->update($request->all());
        return redirect('/purchases')->with('status', 'Purchase updated successfully.')->with('alert-type', 'info');
    }

    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return redirect()->route('purchases.index')->with('error', 'Tax not found.');
        }

        $purchase->delete();
        return redirect()->route('purchases.index')->with('status', 'Purchase deleted successfully.')->with('alert-type', 'danger');
    }
}
