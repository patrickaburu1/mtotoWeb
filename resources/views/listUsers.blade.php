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
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel panel-inverse " >
                        <div class="panel-heading" style="background-color:#28abcb" >
                            <h3 style="color: white">Vetinaries</h3>

                        </div>

                        <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                            <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                            <th><span class="glyphicon glyphicon-edit"></span> First Name</th>
                            <th><span class="glyphicon glyphicon-edit"></span> Last Name</th>
                            <th><span class="glyphicon glyphicon-map-dollar"></span> Phone</th>
                            <th colspan="3"><span></span> Action</th>
                            @foreach($user as $content)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $content->firstName  }}</td>
                                    <td>{{ $content->lastName  }}</td>
                                    <td>{{ $content->phone  }}</td>

                                    <td><a  data-toggle="modal" data-target="#myModalEdit{{ $content->id }}" href="blockUser/{{ $content->id  }}"><span class="glyphicon glyphicon-edit" >Block</span></a> </td>

                                </tr>


                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection