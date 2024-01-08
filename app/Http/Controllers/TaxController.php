<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 

class TaxController extends Controller
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
            $taxes = Tax::where('name', 'like', "%$query%")
                ->orWhere('type', 'like', "%$query%")
                ->paginate(2);

            return view('taxes.view', compact('taxes','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $taxes = Tax::paginate(3);
            return view('taxes.view',compact('taxes','productCount','taxCount','unitCount','stockCount','supplierCount'));
        }
    }

    public function create()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        return view('taxes.add',compact('productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $tax = Tax::create($data);
        return redirect('taxes')->with('status', 'Tax Added successfully.')->with('alert-type', 'success');
    }

    public function edit(string $id)
    {
        $tax = Tax::find($id);
        return view('taxes.edit',compact('tax'));
    }

    public function update(Request $request, string $id)
    {
        $tax = Tax::find($id);
        $tax->update($request->all());
        return redirect('/taxes')->with('status', 'Tax updated successfully.')->with('alert-type', 'info');
    }

    public function destroy(string $id)
    {
        $tax = Tax::find($id);
        if (!$tax) {
            return redirect()->route('taxes.index')->with('error', 'Tax not found.');
        }

        $tax->delete();
        return redirect()->route('taxes.index')->with('status', 'Tax deleted successfully.')->with('alert-type', 'danger');
    }
}
