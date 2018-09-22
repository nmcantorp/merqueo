@extends('app')

@section('title', 'File uploaded')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Files Uploaded</div>

                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Caracter</th>
                                <th>Numero Aparicion</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->id  }}</td>
                                    <td>{{ $file->character  }}</td>
                                    <td>{{ $file->count  }}</td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

@stop