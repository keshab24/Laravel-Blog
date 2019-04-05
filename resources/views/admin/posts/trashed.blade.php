@extends('layouts.app')
@section('content')
<div class="panel panel-default">
     
    <div class="panel-body">
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Title</th>
           <th>Editing</th>
           <th>Restoring</th>
           <th>Deleting</th>
        </thead>
       <tbody>
           @foreach($posts as $post)
           <tr>
               <td>
                  
               image
               </td>
               <td>
                   {{$post->title}}
               </td>
               <td>
                   Edit
               {{--<a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-xs btn-info">
            <span class="glyphicon glyphicon-pencil"></span></a>--}}
               </td>
               <td>
                  
                <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-xs btn-success">Restore
             </a>
                </td>
                <td>
                        <a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-xs btn-danger">Delete
                            </a>
                </td>
           </tr>
       </tbody>
       @endforeach
   </table>
    </div>
</div>
@endsection