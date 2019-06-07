@extends('layouts.app')

@section('title')
    Edit item
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit item</h1>
        <form method="post" action="/product/{{$product->id}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <p>
                <label>Name:</label><br>
                @if (count($errors->get('name')) > 0)
                    <input type="text" name="name" value="{{ old('name') }}"><p>{{($errors->get('name'))[0]}}</p>
                @else
                    <input type="text" name="name" value="{{$product->name}}">
                @endif
            </p>
            <p>
                <label>Price:</label><br>
                @if (count($errors->get('price')) > 0)
                    <input type="text" name="price" value="{{ old('price') }}"><p>{{($errors->get('price'))[0]}}</p>
                @else
                    <input type="text" name="price" value="{{$product->price}}">
                @endif
            </p>
            <p>
                <select name="manufacturer">
                @foreach ($manufacturers as $manufacturer)
                    @if ($manufacturer->id == $product->manufacturer_id)
                        <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
                    @else
                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                    @endif
                @endforeach
                </select>
            </p>
            <p>
                <label>Link:</label><br>
                @if (count($errors->get('url')) > 0)
                    <input type="text" name="url" value="{{ old('url') }}"><p>{{($errors->get('url'))[0]}}</p>
                @else
                    <input type="url" name="url" value="{{$product->url}}">
                @endif
            </p>
            <input type="submit" value="Update">
        </form>
    </div>
</div>
@endsection