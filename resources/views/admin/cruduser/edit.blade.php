@extends('layouts.adminstructure')
@section('content')




<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
             
                <h4 class="card-title"> Edit Blog Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @foreach($datafor as $items)


                <div class="container">
                <form action="{{url('/update.user/'.$items->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <input type="text" value="{{$items->name}}"  name="name" class="form-control">
                <input type="text " value="{{$items->email}}" name="email" class="form-control">
                <input type="text" value="{{$items->password}}" class="form-control" name="password">
                <select value="{{$items->usertype}}" name="usertype" class="form-control">
                  @if($items->usertype == 'admin')
                  <option value="admin">admin</option>
                  <option value="user">user</option>
                  @else
                  <option value="user">user</option>
                  <option value="admin">admin</option>

                  @endif
                </select>
               
                <button type="submit" >update</button>

                                
                </form>
                </div>
                </div>
              </div>
            </div>
@endforeach
@endsection