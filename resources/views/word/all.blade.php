@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                     <div class="pull-right">
                        <a href="{{url('/word/all')}}"> All Words</a>
                        |
                        <a href="{{url('/word/add')}}"> Add Word</a>
                    </div>

                </div>

                <div class="panel-body">
                   
                   <div >
                       
                         <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Arabic</th>
                                <th>Bangla</th>
                                <th>English</th>
                                <th>Example</th>
                                <th><a href="{{url('/word/add')}}" class="btn btn-primary">Add New</a></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($words as $word)
                              <tr>
                                <td>{{$word->ar}}</td>
                                <td>{{$word->bn}}</td>
                                <td>{{$word->en}}</td>
                                <td>{{$word->desc}}</td>
                                <td>
                                    <a href="{{url('/word/edit/'.$word->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Del</a>

                                </td>
                                
                               
                              </tr>
                            @endforeach
                            </tbody>
                          </table>

                    </div>

                    {{ $words->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
