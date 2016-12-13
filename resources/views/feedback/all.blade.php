@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Feedbacks
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
                                <th>Comments</th>
                                <th>Name</th>
                                <th>Email</th>
                                
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedbacks as $comment)
                              <tr>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                               
                                <td>
                                    
                                    

                                    <form action="{{url('/feedback/'.$comment->id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit"  class="btn btn-danger" value="Del">
                                    </form>

                                </td>
                                
                               
                              </tr>
                            @endforeach
                            </tbody>
                          </table>

                    </div>

                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
