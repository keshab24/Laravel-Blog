@extends('layouts.app')
@section('content')
<div class="panel panel-default">
     
    <div class="panel-body">
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Name</th>
           <th>Permissions</th>
           <th>Delete</th>

       </thead>
       <tbody>
           @foreach($users as $user)
           <tr>
               <td>
               <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px">               </td>
               <td>
                   {{$user->name}}
               </td>
               <td>
                   @if($user->admin)
                   <a href="{{route('user.not.admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove Permission</a>
                   @else
               <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
                   @endif
               </td>
               <td>
                   @if(Auth::id() !==$user->id)
                <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Delete</a>
                @endif
               </td>
           </tr>
       </tbody>
       @endforeach
   </table>
    </div>
</div>
@endsection