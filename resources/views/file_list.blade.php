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
                                <th>Nombre</th>
                                <th>Creador</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->id  }}</td>
                                    <td>{{ $file->filename  }}</td>
                                    <td>{{ $file->name  }}</td>
                                    <td><a href="{{ route('file_details', ['id' => $file->id]) }}"> Ver Detalle </a></td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

@stop