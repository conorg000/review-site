@extends('layouts.app')

@section('title')
    Edit review
@endsection

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1>Edit Review</h1>
    <form method="post" action="/review/{{$review->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <p>
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="created" value="{{$review->created}}">
            <input type="hidden" name="prodid" value="{{$review->product_id}}">
        </p>
        <p>
            <label>Product:</label><br>
            @if (count($errors->get('product')) > 0)
                <input type="text" name="product" value="{{ old('product') }}" disabled><p>{{($errors->get('product'))[0]}}</p>
            @else
                <input type="text" name="product" value="{{$product->name}}" disabled>
            @endif
        </p>
        <p>
            <label>Rating:</label><br>
                <select name="rating">
                @if (empty($errors))
                    @for ($i = 1; $i < 6; $i++)
                        @if ($i == $review->rating))
                            <option value="{{$i}}" selected="selected">{{$review->rating}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                @else
                    @for ($i = 1; $i < 6; $i++)
                        @if ($i == old('rating'))
                            <option value="{{$i}}" selected="selected">{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                @endif
                </select>
        </p>
        <p>
            <label>Review:</label><br>
            @if (count($errors->get('review')) > 0)
                <input type="text" name="review" value="{{ old('review') }}"><p>{{($errors->get('review'))[0]}}</p>
            @else
                <input type="text" name="review" value="{{$review->review}}">
            @endif
        </p>
        <input type="submit" value="Update">
    </form>
</div>
</div>
@endsection