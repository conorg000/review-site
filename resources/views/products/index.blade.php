@extends('layouts.app')
@section('title')
  Item List
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-2">
      <h3>Products</h3>
      <ul>
        @foreach($products as $product)
          <a href = "/product/{{$product->id}}"><li>{{$product->name}}</li></a>
          @if (!empty($product->image))
            <img src="{{url($product->image)}}" alt="product image" style="height:150px;">
          @endif
        @endforeach
      </ul>
      <br><a class="btn btn-info btn-lg" role="button" href = "/product/create">Add item</a><br><br>
    </div>
    <div class="col-md-4">
      @if (Auth::check())
        <a class="btn btn-info btn-lg" role="button" href="/follow">See who you're following</a>
      @endif
      @if (Auth::check())
        <h3>People you should follow</h3>
        @if (empty($recommend))
          <p>No recommendations</p>
        @else
          @foreach($recommend as $recommendation)
            <p>{{$recommendation->name}}</p>
          @endforeach
        @endif
      @endif
    </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{$products->links()}}
  </div>
</div>
@endsection