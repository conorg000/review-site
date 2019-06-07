@extends('layouts.app')

@section('title')
    Add new review
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Add Review</h1>
        @if (!empty($errors->get('id')))
            @foreach ($errors->get('id') as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <form method="post" action="/review" enctype="multipart/form-data">
            {{csrf_field()}}
            <p>
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="created" value="{{$created}}">
            </p>
            <p>
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
                <label>Rating:</label><br>
                <select name="rating">
                    @for ($i = 1; $i < 6; $i++)
                        @if ($i == old('rating'))
                            <option value="{{$i}}" selected="selected">{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </p>
            <p>
                <label>Review:</label><br>
                @if (count($errors->get('review')) > 0)
                    <input type="text" name="review" value="{{ old('review') }}"><p>{{($errors->get('review'))[0]}}</p>
                @else
                    <input type="text" name="review" value="{{ old('review') }}">
                @endif
            </p>
            <input type="submit" value="Add review">
        </form>
    </div>
</div>
@endsection