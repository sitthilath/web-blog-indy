@extends('layouts.adminstructure')

@section('title')



@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a href="/insertuser" class="btn btn-primary">insert data</a>
                <h4 class="card-title"> Blog Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ຊື່
                      </th>
                      <th>
                        ເມວ
                      </th>
                      <th>
                        ລະຫັດ
                      </th>
                      <th>
                        ປະເພດ
                      </th>
                     
                      <th class="text-right">
                        ຈັດການ
                      </th>
                    </thead>

                  
                    @foreach($datafor as $items)
                    <tbody>
                    
                    <tr>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                      
                        <td>{{$items->password}}</td>
                        <td>{{$items->usertype}}</td>
                        <td>
                    <form action="{{url('/del.user/'.$items->id)}}" method="post">
                    {{method_field('DELETE')}}
                            {{csrf_field()}}
                         
                    <a href="{{url('/edit.user/'.$items->id)}}" >edit</a>
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




