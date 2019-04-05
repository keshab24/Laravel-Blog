@extends('layouts.app')
@section('content')
@include('admin.include.error')


<div class="panel panel-default">
    <div class="panel-heading">
        Editing a User Profile
    </div>
    <div class="panel-body">
    <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

      <div class="form-group">
          <label for="name">username</label>
          <input type="text" name="name" value="{{$user->name}}" class="form-control">
      </div>

      <div class="form-group">
            <label for="email">Email</label>
      <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="avatar">Choose new avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div class="form-group">
            <label for="facebook">Facebook profile</label>
        <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="youtube">Youtube profile</label>
            <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="about">About You</label>
           <textarea name="about" id="about" cols="6" rows="6" value="{{$user->profile->about}}" class="form-control"></textarea>
        </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                   Update User Profile
                    </button>
                </div>
        </form>
    </div>
</div>



@stop