@extends('admin.layout.master')

@section('content')
    <div class="admin__upload__content">
        <h1>File Create</h1>
        <div class="admin__uploads">
            <div class="admin__upload">
                {!! Form::open( array( 'action' => 'Admin\UploadController@uploadFile', 'files' => true))  !!}

                @include('admin.partials.errors')

                {!! Form::hidden('folder', $folder) !!}

                <div class="input-group">
                    {!! Form::label('File') !!}
                    {!! Form::file('new_file') !!}
                </div>

                <div class="input-group">
                    {!! Form::label('Filename (Optional)') !!}
                    {!! Form::text('filename') !!}
                </div>

                {!! Form::submit('Upload File', array('class' => 'button button-primary')) !!}
                {!! Form:: close() !!}
            </div>
        </div>
    </div>
@stop