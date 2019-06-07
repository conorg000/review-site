<?php

namespace App\Http\Controllers;
use App\Product;
use App\Manufacturer;
use App\User;
use App\Review;
use App\Picture;
use App\Like;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DateTime;

class ReviewController extends Controller
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
        $now = new DateTime;
        $created = $now->format('Y-m-d');
        return view('reviews.create_review')->with('user', $user)->with('created', $created)->with('products', $products);
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
            'rating' => 'required|numeric',
            'review' => 'required|max:255'
        ]);
        $tempuser = $request->id;
        $tempprod = $request->product;
        $sql = 'select user_id from reviews where user_id = ? and product_id = ?';
        $result = \DB::select($sql, array($tempuser, $tempprod));
        if (!empty($result)) {
            return view('alreadyreviewed');
        }
        $review = new Review();
        $review->user_id = $request->id;
        $review->product_id = $request->product;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->created = $request->created;
        $review->save();
        return redirect("/product/$review->product_id");
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
        $user = Auth::user();
        $review = Review::find($id);
        $product = Product::find($review->product_id);
        if ($user->type == 'mod') {
            return view('reviews.edit_review')->with('user', $user)->with('review', $review)->with('product', $product);
        }
        else {
            if ($user->id == $review->user_id) {
                return view('reviews.edit_review')->with('user', $user)->with('review', $review)->with('product', $product);
            }
            else {
                return view('unauthorised');
            }
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
        $this->validate($request,[
            'rating' => 'required|numeric',
            'review' => 'required|max:255'
        ]);
        $user = Auth::user();
        $review = Review::find($id);
        if ($user->type == 'mod') {
            $review->user_id = $request->id;
            $review->product_id = $request->prodid;
            $review->rating = $request->rating;
            $review->review = $request->review;
            $review->created = $request->created;
            $review->save();
            return redirect("/product/$review->product_id");
        }
        else {
            if ($user->id == $review->user_id) {
                $review->user_id = $request->id;
                $review->product_id = $request->prodid;
                $review->rating = $request->rating;
                $review->review = $request->review;
                $review->created = $request->created;
                $review->save();
                return redirect("/product/$review->product_id");
            }
            else {
                return view('unauthorised');
            }
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
        $review = Review::find($id);
        if ($user->type == 'mod') {
            $product = $review->product_id;
            $review->delete();
            return redirect("/product/$product");
        }
        else {
            if ($user->id == $review->user_id) {
                $product = $review->product_id;
                $review->delete();
                return redirect("/product/$product");
            }
            else {
                return view('unauthorised');
            }
        }
    }
}
