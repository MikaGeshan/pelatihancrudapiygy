<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;
use App\Http\Models\product;
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan semua data category
        $rating= rating::with('product')->get();
        // respons api data category
        if ($rating){
            return response()->json(
                $rating
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'star' => 'required',
            'product_id' => 'required',
        ]);
        $request = rating::create([
            'star' => $request->star,
            'product_id' => $request->product_id,
        ]);
        //response api
        if ($request) {
            return response()->json(
                [
                    'msg' => 'Succesfully added rating',
                    'data' => $request
                ]
            );
        } else {
            return response()->json('Failed to add rating');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(rating $rating, $id)
    {
        //menampilkan semua data category
        $rating= rating::with('product')->get()->find($id);
        // respons api data category
        if ($rating){
        return response()->json(
                       $rating
                   );
               }else{
                   return response()->json(
                   'Tidak ada Data'
                   );
               }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rating $rating)
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
            'star'=>'required',
            'product_id'=>'required'
        ]);
        $rating = rating::find($id);
        $rating->star= $request->star;
        $rating->product_id=$request->product_id;

        //response api update
        if ($rating->save()){
            return response()->json(['msg'=>'Succesfully updated rating','rating' => $rating]);
        } else {
            return response()->json('Failed to update rating');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rating $rating, $id)
    {
         //mengambil data berdasarkan idnya
         $product = rating::find($id);
         $product->delete();
            if ($product) {
                return response()->json(['msg'=>'Succesfully deleted rating','rating' => $product]);
            } else {
            return response()->json('Failed to delete rating');
            }
    }
}
