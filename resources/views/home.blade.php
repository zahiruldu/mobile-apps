@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                </div>

                <div class="panel-body">
                    <div class="list-group">
                      <a href="{{url('/word/all')}}" class="list-group-item">Dictionary Management</a>
                      <a href="#" class="list-group-item">Another project</a>
                      <a href="#" class="list-group-item">Another project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
