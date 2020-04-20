@extends('layouts.adminstructure')

@section('title')



@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
          
                <h4 class="card-title"> Insert Blog Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <div class="container">
                    <form action="{{url('/done.blog')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                  

                   
                    <input type="file" class="form-control" name="image" >
                    <input type="text" class="form-control" name="title" placeholder="enter title">
                    <input type="text" class="form-control" name="content" placeholder="enter content">
                
                   
                    <button type="submit" >Add</button>


                    </form>
                    </div>
                </div>
              </div>
            </div>



@endsection()



