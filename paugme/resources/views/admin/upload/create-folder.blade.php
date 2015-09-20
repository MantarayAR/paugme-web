@extends('admin.layout.master')

@section('content')
    <div class="admin__upload__content">
        <h1>Folder Create</h1>
        <div class="admin__uploads">
            <div class="admin__upload">
                {!! Form::open( array( 'action' => 'Admin\UploadController@createFolder'))  !!}

                @include('admin.partials.errors')

                {!! Form::hidden('folder', $folder) !!}

                <div class="input-group">
                    {!! Form::label('Folder Name') !!}
                    {!! Form::text('new_folder') !!}
                </div>

                {!! Form::submit('Create Folder', array('class' => 'button button-primary')) !!}
                {!! Form:: close() !!}
            </div>
        </div>
    </div>
@stop