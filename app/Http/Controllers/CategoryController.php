<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan semua data category
        $category = Category::all();
        // respons api data category
        if ($category){
            return response()->json(
                $category
            );
        }else{
            return response()->json(
            'Tidak ada Data'
            );
        }
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
        //validasi
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::create([
            'name'=>$request->name,
            'description' => $request->description
        ]);
        //response api
        if ($category) {
            return response()->json(
                [
                'msg'=>'Succesfully added data',
                'data' => $category
                ]
            );
        }else{
            return response()->json('Failed to add data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
    // Ambil produk berdasarkan name
    $products = Category::where('name', 'like', '%' . $name . '%')->get();

    // Tampilkan hasil pencarian ke dalam JSON response
    return response()->json(['msg' => 'Pencarian produk berhasil', 'data' => $products]);

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ]);
        $category = Category::find($id);
        $category->name= $request->name;
        $category->description=$request->description;

        //response api update
        if ($category->save()){
            return response()->json(['msg'=>'Succesfully updated data','data' => $category]);
        } else {
            return response()->json('Failed to update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //mengambil data berdasarkan idnya
        $category = Category::find($id);
        $category->delete();
        if ($category) {
            return response()->json(['msg'=>'Succesfully deleted data','data' => $category]);
        } else {
        return response()->json('Failed to delete data');
        }
    }
}
