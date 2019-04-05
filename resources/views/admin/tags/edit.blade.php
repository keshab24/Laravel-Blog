@extends('layouts.app')
@section('content')
@include('admin.include.error')


<div class="panel panel-default">
    <div class="panel-heading">
        Edit Tag: {{$tag->tag}}
    </div>
    <div class="panel-body">
    <form action="{{route('tag.update',['id'=>$tag->id])}}" method="POST">
          {{ csrf_field() }}
      <div class="form-group">
          <label for="name">Tag</label>
      <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
      </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update tag
                    </button>
                </div>
        </form>
    </div>
</div>



@stop