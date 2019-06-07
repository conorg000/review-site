<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\User;
use App\Review;
use App\Picture;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PictureController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
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
        $user = Auth::user();
        $products = Product::all();
        return view('pictures.create_picture')->with('user', $user)->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,bmp,png'
        ]);
        $image_store = request()->file('image')->store('products_images', 'public');
        $picture = new Picture();
        $picture->user_id = $request->id;
        $picture->product_id = $request->product;
        $picture->image = $image_store;
        $picture->save();
        return redirect("/product/$picture->product_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $picture = Picture::find($id);
        if ($user->type == 'mod') {
            $product = $picture->product_id;
            $picture->delete();
            return redirect("/product/$product");
        }
        else {
            if ($user->id == $picture->user_id) {
                $product = $picture->product_id;
                $picture->delete();
                return redirect("/product/$product");
            }
            else {
                return view('unauthorised');
            }
        }
    }
}
