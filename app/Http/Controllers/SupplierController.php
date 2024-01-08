<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 

class SupplierController extends Controller
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
            $suppliers = Supplier::where('first_name', 'like', "%$query%")
                ->orWhere('last_name', 'like', "%$query%")
                ->orWhere('company_name', 'like', "%$query%")
                ->orWhere('gst_number', 'like', "%$query%")
                ->orWhere('pan_number', 'like', "%$query%") 
                ->paginate(4);

            return view('suppliers.view', compact('suppliers','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $suppliers = Supplier::paginate(3);
            return view('suppliers.view',compact('suppliers','productCount','taxCount','unitCount','stockCount','supplierCount'));
        }
    }

    public function create()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        return view('suppliers.add',compact('productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $supplier = Supplier::create($data);
        return redirect('suppliers')->with('status', 'Supplier Added successfully.')->with('alert-type', 'success');
    }

    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit',compact('supplier'));
    }

    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->all());
        return redirect('/suppliers')->with('status', 'Supplier updated successfully.')->with('alert-type', 'info');
    }

    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found.');
        }

        $supplier->delete();
        return redirect()->route('suppliers.index')->with('status', 'Supplier deleted successfully.')->with('alert-type', 'danger');
    }
}
