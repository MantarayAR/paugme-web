@extends('admin.layout.master')

@section('content')
    <div class="admin__tag__content">
        <h3>Tag Edit</h3>

        <div class="admin__tags">
            <div class="admin__tag">
                {!! Form::model( $tag, array('action' => ['Admin\TagController@update', $tag['id']], 'method' => 'put'))  !!}

                @include('admin.partials.errors')
                @include('admin.partials.success')

                {!! Form::hidden('id', $tag['id']) !!}

                @include('admin.tag._form')

                <div class="modal-footer">
                    {!! Form::submit('Save Changes', array('class' => 'button button-primary')) !!}
                    {!! Form:: close() !!}
                </div>
            </div>

        </div>
    </div>
@stop