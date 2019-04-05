@extends('layouts.app')
@section('content')
@include('admin.include.error')


<div class="panel panel-default">
    <div class="panel-heading">
        Create a new User
    </div>
    <div class="panel-body">
    <form action="{{route('user.store')}}" method="POST">
          {{ csrf_field() }}
      <div class="form-group">
          <label for="name">user</label>
          <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
            <label for="name">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control">
        </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                    Add User
                    </button>
                </div>
        </form>
    </div>
</div>



@stop