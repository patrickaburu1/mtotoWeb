@extends('side')
{{--<style>--}}
    {{--#here{--}}
        {{--background-color: black!important;--}}
    {{--}--}}
{{--</style>--}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
@section('data')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Teacher</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/teacher') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Id Number</label>

                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="idno" value="{{ old('idno') }}" required autofocus>

                                    @if ($errors->has('idnumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tsc') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Tsc Number</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="tsc_no" value="{{ old('tsc_no') }}" required autofocus>

                                    @if ($errors->has('tsc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tsc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('tsc') ? ' has-error' : '' }}">--}}
                                {{--<label  class="col-md-4 control-label">Tsc Number</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input  type="text" class="form-control" name="tsc_no" value="{{ old('tsc_no') }}" required autofocus>--}}

                                    {{--@if ($errors->has('tsc'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('tsc') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}




                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--Register--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
<script src="/js/app.js"></script>