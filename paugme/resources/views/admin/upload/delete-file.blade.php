@extends('admin.layout.master')

@section('content')
    <div class="admin__uploads__content">
        <h1>File Delete</h1>
        <div class="admin__uploads">
            <div class="admin__upload">
                {!! Form::open(['route' => 'Admin\UploadController@destroyFile', 'action' => 'DELETE']) !!}

                @include('admin.partials.errors')

                {!! Form::hidden('file', $file) !!}

                <p>Are you sure you want to delete '{{$file}}'?</p>

                {!! Form::submit('Delete File', array('class' => 'button button-primary')) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
