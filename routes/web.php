<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
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

Route::resource('product', 'ProductController');
Route::resource('review', 'ReviewController');
Route::resource('picture', 'PictureController');
Route::resource('follow', 'FollowController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('documentation', function () {
   return view('documentation');
});

Route::get('/showbyrating/{id}', function ($id) {
   $product = Product::find($id);
   $user = Auth::user();
   $reviews = $product->reviewsbyrating()->paginate(5);
   $pictures = $product->pictures;
   return view('products.show')->with('product', $product)->with('reviews', $reviews)->with('user', $user)->with('pictures', $pictures);
   #return redirect("/product/$id")->with('product', $product)->with('reviews', $reviews);
   #$user = User::find(1);
   #$name = 'Apple';
   #$prods = $user->products;
   #foreach($prods as $prod){
   #   echo $prod->pivot->rating;
   #   echo $prod->pivot->rating;
   #}
});

Route::get('/showbydate/{id}', function ($id) {
   $product = Product::find($id);
   $user = Auth::user();
   $reviews = $product->reviewsbytime()->paginate(5);
   $pictures = $product->pictures;
   return view('products.show')->with('product', $product)->with('reviews', $reviews)->with('user', $user)->with('pictures', $pictures);
});

Route::get('/upvote/{id}', function ($id) {
   $review = Review::find($id);
   $product = Product::find($review->product_id);
   $user = Auth::user();
   $sql = 'select user_id from likes where user_id = ? and review_id = ?';
   $result = DB::select($sql, array($user->id, $review->id));
   if (!empty($result)) {
      return view('already');
   }
   $pictures = $product->pictures;
   $review->upvotes = $review->upvotes + 1;
   $review->save();
   $reviews = $product->reviews()->paginate(5);
   $like = new Like();
   $like->user_id = $user->id;
   $like->review_id = $review->id;
   $like->save();
   return view('products.show')->with('product', $product)->with('reviews', $reviews)->with('user', $user)->with('pictures', $pictures);
})->middleware('auth');

Route::get('/downvote/{id}', function ($id) {
   $review = Review::find($id);
   $product = Product::find($review->product_id);
   $user = Auth::user();
   $sql = 'select user_id from likes where user_id = ? and review_id = ?';
   $result = DB::select($sql, array($user->id, $review->id));
   if (!empty($result)) {
      return view('already');
   }
   $pictures = $product->pictures;
   $review->downvotes = $review->downvotes + 1;
   $review->save();
   $reviews = $product->reviews()->paginate(5);
   $like = new Like();
   $like->user_id = $user->id;
   $like->review_id = $review->id;
   $like->save();
   return view('products.show')->with('product', $product)->with('reviews', $reviews)->with('user', $user)->with('pictures', $pictures);
})->middleware('auth');

Route::get('/follows/unfollow', function () {
   $user = Auth::user();
   $follows = User::find($user->id)->follows;
   return view('follows/unfollow')->with('user', $user)->with('follows', $follows);
})->middleware('auth');

Route::post('unfollow_action', function() {
   $user_id = request('user_id');
   $follows_id = request('follows_id');
   $sql = 'select id from follows where user_id = ? and follows_id = ?';
   $result = DB::select($sql, array($user_id, $follows_id));
   if (empty($result)) {
      return view('alreadyfollowed');
   }
   else {
      return view('follows.verify')->with('result', $result);
   }
});

#Route::get('/product/{id}/edit', function ($id) {
#   return view('/product/{id}/edit');
#})->middleware('auth');

// Task 2 - Retrieve Manufacturer with model class
Route::get('/test1', function () {
   $follows = User::find(2)->follows;
   $reviews = array();
   foreach($follows as $follow){
         echo $follow->id;
         $review = (User::find($follow->id))->products;
         array_push($reviews, $review);
      #echo $follow->name;
      #echo $follow->id;
      #$user = User::find($follow->pivot->follows_id)->name;
      #echo $user;
      #echo $follow->name;
      #$reviews = (User::find($follow->id))->products;
      #foreach($reviews as $review){
      #   echo $review->pivot->review;
   }
   foreach($reviews as $revu) {
      foreach($revu as $rev) {
         echo $rev->pivot->user_id;
        # echo $rev->name;
         
         #echo $rev->pivot->rating;
         #echo $rev->pivot->review;
      }
   }
  # @foreach($users as $user)
   #     @if($user->id == $review->pivot->user_id)
    #      <td>{{$user->name}}</td>
    #    @endif
    #  @endforeach
    
    
      #$reviews = array();
      #  foreach($follows as $follow) {
      #      $review = (User::find($follow->id))->products;
      #      array_push($reviews, $review);
      #  }
  #$user = User::find(1);
  #$reviews = $user->products;
  #foreach($reviews as $review) {
#     echo $review->pivot->review;
  #   echo $review->name;
  #   echo $review->pivot->name;
  #}
   #dd($follows);
   
//   $prods = $user->products;
//   $prods = Product::where('manufacturer_id = 1 or manufacturer_id = 2')->get();
//   $m1prod = Manufacturer::find(1)->products()->get();
//   $m2prod = Manufacturer::find(2)->products()->get();
//   $prods = $m1prod->merge($m2prod);
//   dd($products);
#   $name = 'Apple';
#   $prods = $user->products;
#   foreach($prods as $prod){
#      echo $prod->pivot->rating;
#      echo $prod->pivot->rating;
#   }
   /*dd($prods);*/
});

// Task 2 - Retrieve Product with model class
Route::get('/test2', function () {
   #$prod = Product::find(3);
 #  $reviews = $prod->reviews;
   #$reviews = Review::all();
   #$pics = Picture::all();
   #foreach($pics as $pic){
   #   echo $pic;
   #}
#$review = Review::where('product_id', 8);
   #$id = 7;
   #$review = 4;
   #$revu = 'select user_id from likes where user_id = ? and review_id = ?';
   #$items = DB::select($revu, array($id, $review));
   #if (!empty($items)){
   #   echo 'full';
   #}
   #else {
   #   echo 'empty';
   #}
   $suggested = array();
   $friends = array();
   $follows = (User::find(2))->follows;
   foreach($follows as $follow) {
      array_push($friends, $follow->id);
   }
   foreach($friends as $friend) {
      $friendsfriends = (User::find($friend))->follows;
      foreach($friendsfriends as $friendfriend) {
         if((in_array($friendfriend->id, $friends) == FALSE) & ($friendfriend->id != 2)) {
            array_push($suggested, $friendfriend->id);
         }
      }
   }
   foreach($suggested as $suggest) {
      echo $suggest;
   }
   
   #   foreach($reviews as $review){
#      echo $review->name , $review->pivot->name;
#   }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');