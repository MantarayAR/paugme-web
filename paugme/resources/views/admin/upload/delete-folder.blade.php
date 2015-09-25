@extends('admin.layout.master')

@section('content')
    <div class="admin__uploads__content">
        <h1>Folder Delete</h1>
        <div class="admin__uploads">
            <div class="admin__upload">
                {!! Form::open(['action' => 'Admin\UploadController@destroyFolder', 'method' => 'DELETE']) !!}

                @include('admin.partials.errors')

                {!! Form::hidden('folder', $folder) !!}

                <p>Are you sure you want to delete '{{$folder}}'?</p>

                {!! Form::submit('Delete Folder', array('class' => 'button button-primary')) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
