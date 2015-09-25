@extends('admin.layout.master')

@section('content')
    <div class="admin__tag__content">
        <h3>Tag Delete</h3>

        <div class="admin__tags">
            <div class="admin__tag">
                {!! Form::open(array('action' => ['Admin\TagController@destroy', $tag->id], 'method' => 'delete') )  !!}

                @include('admin.partials.errors')
                @include('admin.partials.success')

                {!! Form::hidden('id', $tag->id) !!}

                <p>Are you sure you want to delete "{{$tag->title}}" tag?</p>

                <div class="modal-footer">
                    {!! Form::submit('Delete Tag', array('class' => 'button button-danger')) !!}
                    {!! Form:: close() !!}
                </div>
            </div>

        </div>
    </div>
@stop