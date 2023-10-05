<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Ambil semua produk dari database
    $products = Product::all();

    // Tampilkan produk dalam respons JSON
    return response()->json(['msg' => 'Daftar produk', 'product' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'qty' => 'required',
        'price' => 'required',
        'category_id'=>'required'
    ]);
    $request=Product::create([
        'name'=>$request->name,
        'qty'=>$request->qty,
        'price'=>$request->price,
        'category_id'=>$request->category_id
    ]);
    //response api
    if ($request) {
        return response()->json(
            [
            'msg'=>'Succesfully added product',
            'data' => $request
            ]
        );
    }else{
        return response()->json('Failed to add product');
    }
}

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
    // Ambil produk berdasarkan name
    $products = Product::where('name', 'like', '%' . $name . '%')->get();

    // Tampilkan hasil pencarian ke dalam JSON response
    return response()->json(['msg' => 'Pencarian produk berhasil', 'data' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            //validate
            $this->validate($request,[
                'name'=>'required',
                'qty'=>'required',
                'price'=>'required'
            ]);
            $product = Product::find($id);
            $product->name= $request->name;
            $product->qty=$request->qty;
            $product->price=$request->price;

            //response api update
            if ($product->save()){
                return response()->json(['msg'=>'Succesfully updated product','product' => $product]);
            } else {
                return response()->json('Failed to update data');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product, $id)
    {
        //mengambil data berdasarkan idnya
        $product = Product::find($id);
            $product->delete();
               if ($product) {
                   return response()->json(['msg'=>'Succesfully deleted product','product' => $product]);
               } else {
               return response()->json('Failed to delete product');
               }
    }
}
