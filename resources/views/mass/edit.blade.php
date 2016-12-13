@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Crowd Word
                     <div class="pull-right">
                        <a href="{{url('/mass/word/all')}}"> All Crowd Words</a>
                        |
                        <a href="{{url('/word/add')}}"> Add Word</a>
                    </div>
                </div>

                <div class="panel-body">
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/mass/word/edit/'.$word->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ar') ? ' has-error' : '' }}">
                            <label for="ar" class="col-md-4 control-label">Arabic</label>

                            <div class="col-md-6">
                                <input id="ar" type="text" class="form-control" name="ar" value="{{ old('ar')? : $word->ar }}"  autofocus>

                                @if ($errors->has('ar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('en') ? ' has-error' : '' }}">
                            <label for="en" class="col-md-4 control-label">English</label>

                            <div class="col-md-6">
                                <input id="en" type="text" class="form-control" name="en" value="{{ old('en') ? : $word->en}}" >

                                @if ($errors->has('en'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bn') ? ' has-error' : '' }}">
                            <label for="bn" class="col-md-4 control-label">Bangla</label>

                            <div class="col-md-6">
                                <input id="bn" type="text" class="form-control" name="bn" value="{{ old('bn') ? : $word->bn}}" >

                                @if ($errors->has('bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                            <label for="desc" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="desc" class="form-control" name="desc">{{ old('desc') ? : $word->desc}}</textarea>

                                @if ($errors->has('desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                 <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
