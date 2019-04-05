@extends('layouts.app')
@section('content')
@include('admin.include.error')


<div class="panel panel-default">
    <div class="panel-heading">
         View Your Profile
    </div>
    <div class="panel-body">
            <table class="table">
                    <thead class="thead-dark pull-right">
                      <tr>
                            <th scope="row"> <img src="{{asset($user->profile->avatar)}}" alt="" width="150x" height="150px">
                            </th>
                            <th scope="col"><div class="form-group">
                                    <label for="avatar">Choose new pic</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                      </tr>
                      <tr>
                        <th scope="col">
                      </tr>
                      <tr>
                          <td
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                     
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
    </div>
</div>



@stop