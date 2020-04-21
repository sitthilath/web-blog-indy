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
                <form action="{{url('/update.blog/'.$items->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <label for="image">Image</label>
                <input type="file"   name="image" class="form-control">
                <label for="title">Title</label>
                <input type="text " value="{{$items->title}}" name="title" class="form-control">
                <label for="content">Content</label>
                <textarea name="content"  class="summernote">{{$items->content}}</textarea>
               
                <button type="submit" >update</button>

                                
                </form>
                </div>
                </div>
              </div>
            </div>
@endforeach
@endsection

@section('script')
<script>
 $(document).ready(function() {
  $('.summernote').summernote();
});
</script>






@endsection
