@extends('layouts.app')
@section('content')
<div class="panel panel-default">
     
    <div class="panel-body">
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Title</th>
           <th>Editing</th>
           <th>Trashing</th>

       </thead>
       <tbody>
           @if($posts->count() > 0)
           @foreach($posts as $post)
           <tr>
               <td>
                  
               <img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px">
               </td>
               <td>
                   {{$post->title}}
               </td>
               <td>
                
               <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-xs btn-info">
            <span class="glyphicon glyphicon-pencil"></span></a>
               </td>
               <td>
                  
                <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-xs btn-danger">
             <span class="glyphicon glyphicon-trash"></span></a>
                </td>
           </tr>
           @endforeach
           @else
           <tr>
                <th colspan="5" class="text-cener">
                 No posts yet.
                </th>
            </tr>
       </tbody>
       @endif
      
   </table>
    </div>
</div>
@endsection