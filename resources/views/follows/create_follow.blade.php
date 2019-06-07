@extends('layouts.app')

@section('title')
    Follow User
@endsection

@section('content')  
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1>Follow a user</h1>
    <form method="post" action="/follow" enctype="multipart/form-data">
        {{csrf_field()}}
        <p>
            <input type="hidden" name="user_id" value="{{$user->id}}">
        </p>
        <p>
            <label>User to follow:</label><br>
            <select name="follows_id">
            @foreach ($tofollow as $person)
                @if ($person->id != $user->id)
                    <option value="{{$person->id}}">{{$person->name}}</option>
                @endif
            @endforeach
            </select>
        </p>
        <input type="submit" value="Follow">
    </form>
</div>
</div>
@endsection