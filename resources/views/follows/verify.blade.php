@extends('layouts.app')

@section('title')
    Verify
@endsection

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1>Are you sure?</h1>
    <p>{{$result}}</p>
    <form method="POST" action="/follow">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <input type="submit" value="Delete" class="link">
    </form>
</div>
</div>
@endsection