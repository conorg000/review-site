@extends('layouts.app')

@section('title')
    Add new picture
@endsection

@section('content') 
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1>Add Picture</h1>
    @if (!empty($errors->get('id')))
        @foreach ($errors->get('id') as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form method="post" action="/picture" enctype="multipart/form-data">
        {{csrf_field()}}
        <p>
            <input type="hidden" name="id" value="{{$user->id}}">
        </p>
        <p>
            <label>Product:</label><br>
            <select name="product">
            @foreach ($products as $product)
                @if ($product->id == old('product'))
                    <option value="{{$product->id}}" selected="selected">{{$product->name}}</option>
                @else
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endif
            @endforeach
            </select>
        </p>
        <p>
            <label>Image:</label><br>
            @if (count($errors->get('image')) > 0)
                <input type="file" name="image"><p>{{($errors->get('image'))[0]}}</p>
            @else
                <input type="file" name="image">
            @endif
        </p>
        <input type="submit" value="Upload">
    </form>
</div>
</div>
@endsection