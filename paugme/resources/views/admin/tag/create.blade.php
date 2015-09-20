@extends('admin.layout.master')

@section('content')
    <div class="admin__tag__content">
        <h3>Tag Create</h3>

        <div class="admin__tags">
            <div class="admin__tag">
                {!! Form::model( $tag, array('action' => 'Admin\TagController@store'))  !!}

                @include('admin.partials.errors')

                @include('admin.tag._form')

                {!! Form::submit('Add New Tag', array('class' => 'button button-primary')) !!}
                {!! Form:: close() !!}
            </div>

        </div>
    </div>
@stop