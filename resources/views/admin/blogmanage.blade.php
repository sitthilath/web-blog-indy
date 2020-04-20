@extends('layouts.adminstructure')

@section('title')



@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a href="/insertblog">insert data</a>
                <h4 class="card-title"> Blog Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ຮູບ
                      </th>
                      <th>
                        ຫົວຂໍ້
                      </th>
                      <th>
                        ເນື້ອໃນ
                      </th>
                    
                     
                      <th class="text-right">
                        ຈັດການ
                      </th>
                    </thead>

                  
                    @foreach($datafor as $items)
                    <tbody>
                    
                    <tr>
                        <td>{{$items->image}}
                      
                        </td>
                        <td>{{$items->title}}</td>
                      
                        <td>{{$items->content}}</td>
                        
                        <td>
                    <form action="{{url('/del.blog/'.$items->id)}}" method="post">
                    {{method_field('DELETE')}}
                            {{csrf_field()}}
                         
                    <a href="{{url('/edit.blog/'.$items->id)}}" >edit</a>
                    <button type="submit" >delete</button>
                    </form>

                        </td>
                    </tr>

                    </tbody>

                    @endforeach


                  </table>
                </div>
              </div>
            </div>
@endsection()




