<?php

namespace App\Http\Controllers;
use App\Product;
use App\Manufacturer;
use App\User;
use App\Review;
use App\Picture;
use App\Follow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['edit', 'update', 'destroy']]);
    }
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$products = Product::all();
        $products = Product::paginate(3);
        $suggested = array();
        $friends = array();
        if (Auth::user()) {
            $user = Auth::user();
            $follows = (User::find($user->id))->follows;
            foreach($follows as $follow) {
                array_push($friends, $follow->id);
            }
            foreach($friends as $friend) {
                $friendsfriends = (User::find($friend))->follows;
                foreach($friendsfriends as $friendfriend) {
                    if((in_array($friendfriend->id, $friends) == FALSE) & ($friendfriend->id != $user->id) & (in_array($friendfriend->id, $suggested) == FALSE)) {
                        array_push($suggested, $friendfriend->id);
                    }
                }
            }
            $recommend = array();
            foreach($suggested as $suggest) {
                $match = User::find($suggest);
                array_push($recommend, $match);
            }
        }
        else {
            $recommend = ['No recommended users to follow'];
        }
        return view('products.index')->with('products', $products)->with('recommend', $recommend);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('products.create_form')->with('manufacturers', $manufacturers);
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
            'name' => 'required|max:255|unique:products',
            'price' => 'required|numeric|min:0',
            'manufacturer' => 'exists:manufacturers,id',
            'image' => 'mimes:jpeg,bmp,png'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        if ($request->hasFile('image')) {
            $image_store = request()->file('image')->store('products_images', 'public');
            $product->image = $image_store;
        }
        $product->url = $request->url;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $reviews = $product->reviews()->paginate(5);
        $pictures = $product->pictures;
        #$reviews = Review::paginate(5);
       #$reviews = Review::where('product_id', $id);
        return view('products.show')->with('product', $product)->with('reviews', $reviews)->with('user', $user)->with('pictures', $pictures);
    }
#{{$review->pivot->created_at}} 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->type == 'mod') {
            $product = Product::find($id);
            return view('products.edit_form')->with('product', $product)->with('manufacturers', Manufacturer::all());
        }
        else {
            return view('unauthorised');
        }
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
        $user = Auth::user();
        if ($user->type == 'mod') {
            $this->validate($request,[
                'name' => 'required|max:255',
                'price' => 'required|numeric|min:0',
                'manufacturer' => 'exists:manufacturers,id',
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->manufacturer_id = $request->manufacturer;
            $product->url = $request->url;
            $product->save();
            return redirect("/product/$product->id");
        }
        else {
            return view('unauthorised');
        }
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
        if ($user->type == 'mod') {
            $product = Product::find($id);
            # also delete all reviews
            $reviews = Review::where('product_id', $id);
            foreach ($reviews as $review) {
                $review->delete();
            }
            $pictures = Picture::where('product_id', $id);
            foreach ($pictures as $picture) {
                $picture->delete();
            }
            $product->delete();
            return redirect("/product");
        }
        else {
            return view('unauthorised');
        }
    }
}
