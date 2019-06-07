@extends('layouts.app')

@section('title')
  Products Show
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <a href="/product/{{$product->id}}"><h1>{{$product->name}}</h1></a>
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if (!empty($product->image))
      <img src="{{url($product->image)}}" alt="product image" style="width:450px;">
    @endif
    <h3>Price: ${{$product->price}}</h3>
    <h3>Made by: {{$product->manufacturer->name}}</h3>
    @if (!empty($product->url))
      <h3>Link: <a href="{{$product->url}}">{{$product->url}}</a></h3>
    @endif
    <h3><a class="btn btn-info btn-sm" href ='/product'>Home</a></h3>
    @if (Auth::check())
      @if ($user->type == 'mod')
        <p><a class="btn btn-info btn-sm" href ='/product/{{$product->id}}/edit'>Edit</a></p>
        <p>
          <form method="POST" action="/product/{{$product->id}}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" class="link">
          </form>
        </p>
      @endif
    @endif
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if (count($reviews) < 1)
      <h3>No reviews</h3>
    @else
      <h3>User reviews</h3>
      <a class="btn btn-info btn-sm" role="button" href="/showbyrating/{{$product->id}}">Sort by rating</a>
      <a class="btn btn-info btn-sm" role="button" href="/showbydate/{{$product->id}}">Sort by date</a><br><br>
      <table class="table table-striped">
        <tr><td>Rating</td><td>User Review</td><td>Username</td><td>Date</td><td>Upvotes</td><td>Downvotes</td><td></td><td></td><td></td><td></td></tr>
        {{-- Loop through the array of reviews, printing out key info from each review --}}
        @foreach($reviews as $review)
          @if ($review->pivot->upvotes >= $review->pivot->downvotes)
            <tr class="success">
          @else
            <tr class="danger">
          @endif
            <td align="center">{{$review->pivot->rating}} / 5</td><td>{{$review->pivot->review}}</td><td>{{$review->name}}</td>
            <td>{{$review->pivot->created}}</td><td>{{$review->pivot->upvotes}}</td><td>{{$review->pivot->downvotes}}</td>
            @if (Auth::check())
              @if ($user->type == 'mod')
                <td><a role="button" class="btn btn-default btn-xs" href="/review/{{$review->pivot->id}}/edit">Edit</a></td>
                <td>  
                  <form method="POST" action="/review/{{$review->pivot->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="link">
                  </form>
                </td>
              @elseif ($user->name == $review->name)
                <td><a role="button" class="btn btn-default btn-xs" href="/review/{{$review->pivot->id}}/edit">Edit</a></td>
                <td>  
                  <form method="POST" action="/review/{{$review->pivot->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="link">
                  </form>
                </td>
              @else 
                <td></td><td></td>
              @endif
              <td><a href="/upvote/{{$review->pivot->id}}">👍</a><a href="/downvote/{{$review->pivot->id}}">👎</td>
              <td><a href="/follow/create">Follow</a></td><td><a href="/follows/unfollow">Unfollow</a></td>
            @endif
          </tr>
        @endforeach
      </table>    
    @endif
    {{$reviews->links()}}
    @if (Auth::check())
      <br><a class="btn btn-info btn-lg" role="button" href="/review/create">Share your opinion</a>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if (count($pictures) < 1)
      <h3>No pictures uploaded</h3>
    @else
      <h3>Pictures</h3>
      <table class="table table-striped">
        <tr><th align="center">Picture</th><th align="center">User</th></tr>
        {{-- Loop through the array of reviews, printing out key info from each review --}}
        @foreach($pictures as $picture)
          <tr><td align="center"><img src="{{url($picture->pivot->image)}}" alt="product image" style="width:150px;"></td><td>{{$picture->name}}</td>
          @if (Auth::check())
            @if ($user->type == 'mod')
              <td>  
                <form method="POST" action="/picture/{{$picture->pivot->id}}">
                  {{csrf_field()}}
                  {{ method_field('DELETE') }}
                  <input type="submit" value="Delete" class="link">
                </form>
              </td>
            @elseif ($user->name == $picture->name)
              <td>  
                <form method="POST" action="/picture/{{$picture->pivot->id}}">
                  {{csrf_field()}}
                  {{ method_field('DELETE') }}
                  <input type="submit" value="Delete" class="link">
                </form>
              </td>
            @endif
          @endif
          </tr>
        @endforeach
      </table>    
    @endif
    @if (Auth::check())
      <br><a class="btn btn-info btn-lg" role="button" href="/picture/create">Share a picture</a>
    @endif
  </div>
</div>
@endsection