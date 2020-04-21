@extends('layouts.adminstructure')

@section('title')

@endsection

@section('link')

@endsection

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
                  

                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" >
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="enter title">
                    <label for="content">Content</label> 
                    <textarea name="content"  class="summernote"></textarea>
                   
                    <button type="submit" >Add</button>


                    </form>
                    </div>
                </div>
              </div>
            </div>

   

@endsection()

@section('script')
<script>
 $(document).ready(function() {
  $('.summernote').summernote();
});
</script>






@endsection

