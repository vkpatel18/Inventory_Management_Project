<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 

class UnitController extends Controller
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
            $units = Unit::where('name', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%")
                ->orWhere('quantity', 'like', "%$query%")
                ->paginate(2);

            return view('units.view', compact('units','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $units = Unit::paginate(3);
            return view('units.view',compact('units','productCount','taxCount','unitCount','stockCount','supplierCount'));
        }
    }

    public function create()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        return view('units.add',compact('productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $unit = Unit::create($data);
        return redirect('units')->with('status', 'Unit Added successfully.')->with('alert-type', 'success');
    }

    public function edit(string $id)
    {
        $unit = Unit::find($id);
        return view('units.edit',compact('unit'));
    }

    public function update(Request $request, string $id)
    {
        $unit = Unit::find($id);
        $unit->update($request->all());
        return redirect('/units')->with('status', 'Tax updated successfully.')->with('alert-type', 'info');
    }

    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return redirect()->route('units.index')->with('error', 'Tax not found.');
        }

        $unit->delete();
        return redirect()->route('units.index')->with('status', 'Unit deleted successfully.')->with('alert-type', 'danger');
    }
}
