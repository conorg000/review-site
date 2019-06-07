@extends('layouts.app')
@section('title')
  Following
@endsection
@section('content')  
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h2>Users you're following</h2>
<table>
  @if (count($follows) < 1)
    <tr><td>You're not following anyone</td></tr>
  @else
    @foreach($follows as $follow)
      <tr><td>{{$follow->name}}</td></tr>
    @endforeach
  @endif
</table>
<h2>Reviews by people you're following</h2>
<table class="table table-striped">
  @if (count($follows) < 1)
    <tr><td>You're not following anyone</td></tr>
  @else
    <tr><th>Name</th><th>Product</th><th>Review</th><th>Rating</th></tr>
    @foreach($reviews as $review)
      @foreach($review as $post)
      <tr>
        @foreach($users as $user)
          @if($user->id == $post->pivot->user_id)
            <td>{{$user->name}}</td>
          @endif
        @endforeach
        <td>{{$post->name}}</td><td>{{$post->pivot->review}}</td><td>{{$post->pivot->rating}}</td></tr>
      @endforeach
    @endforeach
  @endif
</table>
</div>
</div>
@endsection