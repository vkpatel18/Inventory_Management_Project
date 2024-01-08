<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Tax; 
use App\Models\Unit; 
use App\Models\Stock; 
use App\Models\Supplier; 
use App\Models\Category; 

class CategoryController extends Controller
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
            $categories = Category::where('name', 'like', "%$query%")
                ->paginate(2);

            return view('categories.view', compact('categories','productCount', 'taxCount', 'unitCount', 'stockCount','supplierCount'));
        }
        else{
            $productCount = Product::count();
            $taxCount = Tax::count();
            $unitCount = Unit::count();
            $stockCount = Stock::count();
            $supplierCount = Supplier::count();
            $categories = Category::paginate(3);
            return view('categories.view',compact('categories','productCount','taxCount','unitCount','stockCount','supplierCount'));
        }
    }

    public function create()
    {
        $productCount = Product::count();
        $taxCount = Tax::count();
        $unitCount = Unit::count();
        $stockCount = Stock::count();
        $supplierCount = Supplier::count();
        return view('categories.add',compact('productCount','taxCount','unitCount','stockCount','supplierCount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $category = Category::create($data);
        return redirect('categories')->with('status', 'Category Added successfully.')->with('alert-type', 'success');
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('/categories')->with('status', 'Category updated successfully.')->with('alert-type', 'info');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Tax not found.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category deleted successfully.')->with('alert-type', 'danger');
    }
}
