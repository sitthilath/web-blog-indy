@extends('layouts.master')

@section('content')
<div class="container">
    <div class="jumbotron text-center">
    
        <h1>  Hello World!!!  </h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam
             eos sunt placeat facilis 
            quibusdam beatae praesentium culpa, consectetur 
            alias saepe dicta itaque ex mollitia laborum, natus ad, incidunt est quae.
        </p>
    </div>

    <div class="row">
    
    @foreach($datafor as $items)
        <div class="col-sm" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
       
            <a href="#" class="thumbnail">
            <img src="..\uploads\image\{{$items->image}}" alt="kak" width="100%; " height="300px;">
            </a>
            <h3>{{$items->title}}</h3>
            <p>{!!$items->content!!}
            </p>
           
          
            <h5 style="margin-bottom:0% ">{{$items->created_at}}</h5>
          
          
            <p>
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9c07cc338d88a5"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_jfsw"></div>         
        </p>
        </div>
        
        @endforeach
        
    </div>


</div>


@endsection