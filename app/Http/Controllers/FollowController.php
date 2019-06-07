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

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function __construct() {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $user = Auth::user();
        $follows = User::find($user->id)->follows;
        $reviews = array();
        foreach($follows as $follow) {
            $review = (User::find($follow->id))->products;
            array_push($reviews, $review);
        }
        $users = User::all();
        return view('follows.index')->with('follows', $follows)->with('reviews', $reviews)->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $allusers = User::all();
        $follows = User::find($user->id)->follows;
        $tofollow = array();
        $friends = array();
        foreach($follows as $follow) {
                array_push($friends, $follow->id);
            }
        foreach ($allusers as $alluser) {
            if ((in_array($alluser->id, $friends)) == FALSE) {
                array_push($tofollow, $alluser);
            }
        }
        return view('follows.create_follow')->with('user', $user)->with('tofollow', $tofollow);
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
            'follows_id' => 'required'
        ]);
        $tempuser = $request->user_id;
        $tempfollow = $request->follows_id;
        $sql = 'select user_id from follows where user_id = ? and follows_id = ?';
        $result = \DB::select($sql, array($tempuser, $tempfollow));
        if (!empty($result)) {
            return view('alreadyfollowed');
        }
        $follow = new Follow();
        $follow->user_id = $request->user_id;
        $follow->follows_id = $request->follows_id;
        $follow->save();
        return redirect("/follow");
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
        //
    }
}
