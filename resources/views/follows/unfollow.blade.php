@extends('layouts.app')

@section('title')
    Unfollow User
@endsection

@section('content')  
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1>Unfollow a user</h1>
    <form method="post" action="unfollow_action">
        {{csrf_field()}}
        <p>
            <input type="hidden" name="user_id" value="{{$user->id}}">
        </p>
        <p>
            <label>User to unfollow:</label><br>
            <select name="follows_id">
            @foreach ($follows as $follow)
                @if ($follow->id != $user->id)
                    <option value="{{$follow->id}}">{{$follow->name}}</option>
                @endif
            @endforeach
            </select>
        </p>
        <input type="submit" value="Unfollow">
    </form>
</div>
</div>
@endsection