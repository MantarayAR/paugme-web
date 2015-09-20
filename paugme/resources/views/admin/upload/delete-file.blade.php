@extends('admin.layout.master')

@section('content')
    <div class="admin__uploads__content">
        <h1>File Delete</h1>
        <div class="admin__uploads">
            <div class="admin__upload">
                {!! Form::open(['action' => 'Admin\UploadController@destroyFile', 'method' => 'DELETE']) !!}

                @include('admin.partials.errors')

                {!! Form::hidden('name', $name) !!}
                {!! Form::hidden('folder', $folder) !!}

                <p>Are you sure you want to delete '{{$folder}}/{{$name}}'?</p>

                {!! Form::submit('Delete File', array('class' => 'button button-primary')) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
