@extends('layouts.app')

@section('title')
    Add new item
@endsection

@section('content')  
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Add new item</h1>
        <form method="post" action="/product" enctype="multipart/form-data">
            {{csrf_field()}}
            <p>
                <label>Name:</label><br>
                @if (count($errors->get('name')) > 0)
                    <input type="text" name="name" value="{{ old('name') }}"><p>{{($errors->get('name'))[0]}}</p>
                @else
                    <input type="text" name="name" value="{{ old('name') }}">
                @endif
            </p>
            <p>
                <label>Price:</label><br>
                @if (count($errors->get('price')) > 0)
                    <input type="text" name="price" value="{{ old('price') }}"><p>{{($errors->get('price'))[0]}}</p>
                @else
                    <input type="text" name="price" value="{{ old('price') }}">
                @endif
            </p>
            <p>
                <label>Manufacturer:</label>
                <select name="manufacturer">
                @foreach ($manufacturers as $manufacturer)
                    @if ($manufacturer->id == old('manufacturer'))
                        <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
                    @else
                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                    @endif
                @endforeach
                </select>
            </p>
            <p>
                @if (count($errors->get('image')) > 0)
                    <input type="file" name="image"><p>{{($errors->get('image'))[0]}}</p>
                @else
                <input type="file" name="image">
                @endif
            </p>
            <p>
                <label>Link:</label><br>
                @if (count($errors->get('url')) > 0)
                    <input type="url" name="url" value="{{ old('url') }}"><p>{{($errors->get('image'))[0]}}</p>
                @else
                    <input type="url" name="url" value="{{ old('url') }}">
                @endif
            </p>
            <input type="submit" value="Add item">
        </form>
    </div>
</div>
@endsection