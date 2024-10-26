<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display the products.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Fetch products from the database
            $data = DB::table('products')->select(
                'id',
                'name',
                'quantity',
                'price',
                'description'
            );

            return DataTables::of($data)->make(true);
        }

        // If not an AJAX request, return the view
        return view('products.index');
    }
//    public function create(Request $request){
//        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'quantity' => ['required', 'integer', 'max:255'],
//            'price' => ['required', 'decimal'],
//            'description' => ['required' ],
//        ]);
//        $insert = Product::create([
//            'first_name' => $request->fname,
//            'last_name' => $request->lname,
//            'middle_initial' => $request->mname,
//            'department_id' => $request->dept,
//            'hire_date' => "2022-01-10"
//        ]);
//        if($insert) {
//            return response()->json(['status'=> 'success', 'message' => 'Product Successfully Added'], 200);
//
//        }
//        return view('products.create');
//    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'numeric', 'max:255'],
            'price' => ['required', 'numeric', 'max:255'],
            'description' => ['required'],
        ]);
        $insert = Product::create($data);
        return view('products.index');
    }
}
