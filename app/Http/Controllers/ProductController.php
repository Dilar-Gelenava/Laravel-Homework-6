<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_product(Request $request)
    {
        Product::create([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "image"=>$request->input("image"),
            "user_id"=>$request->user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_product($id)
    {
        $product=Product::where("id", $id)->firstOrFail();
        $user=User::where("id", $product["user_id"])->firstOrFail();
        return view("content.view", ["product"=>$product, "username" => $user["name"]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_product(Request $request)
    {
        $product=Product::where("id",$request->input("id"))->firstOrFail();
        return view("forms.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_product(Request $request)
    {
        Product::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "image"=>$request->input("image"),
        ]);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_product(Request $request)
    {
        Product::where("id", $request->input("id"))->delete();
        return redirect()->back();
    }
}
