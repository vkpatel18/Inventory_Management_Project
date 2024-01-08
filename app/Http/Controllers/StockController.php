<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 

class StockController extends Controller
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
            $stocks = Stock::where('product_id', 'like', "%$query%")
                ->orWhere('quantity', 'like', "%$query%")
                ->paginate(8);

            return view('stocks.view', compact('stocks','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $stocks = Stock::with('product')->paginate(8);
            return view('stocks.view', compact('stocks','productCount','taxCount','unitCount','stockCount','supplierCount'));
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
        return view('stocks.add', compact('products','productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $stock = $request->all();
        $stock = Stock::create($stock); 
        return redirect('stocks')->with('status', 'Stock Added successfully.')->with('alert-type', 'success');
    }

    public function edit(Stock $stock)
    {
        $products = Product::pluck('name', 'id');
        $selectedProductId = $stock->product_id;
        return view('stocks.edit', compact('stock', 'products', 'selectedProductId'));
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
    
        $stock->update([
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return redirect('stocks')->with('status', 'Stock updated successfully.')->with('alert-type', 'info');
    }
    
    
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect('stocks')->with('status', 'Stock deleted successfully.')->with('alert-type', 'danger');
    }
}
