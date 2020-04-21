@extends('layouts.master')

@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h1>  Welcome Blog indy!!!  </h1>
        <h3>ຍິນດີຕ້ອນຮັບທຸກທ່ານເຂົ້າສູ່ ເວັບອິນດີ້ຂອງ ພວກເຮົາ  
        </h3>
    </div>

    <div class="row">
      
        @foreach($dataforblog as $items)
        <div class="col-sm-4" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            
            <a href="#" class="thumbnail">
                <img src="uploads\image\{{$items->image}}" width="100%;" height="200px;">
            </a>
            <h3>{{$items->title}}</h3>
            <p>{!! $items->content!!}
            </p>
           
          
            <h5 style="margin-bottom:0% ">{{$items->created_at}}</h5>
            <a href="{{url('/readmore/'.$items->id)}}" class="btn btn-primary" style="margin-bottom:0% ">Read more</a>
         
      
        </div>
        
        @endforeach
        
    </div>
    <div class="container" style="margin-top: 10px;">{{$dataforblog->links()}}</div>

</div>


@endsection