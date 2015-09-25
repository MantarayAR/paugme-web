@extends('admin.layout.master')

@section('content')
    <div class="admin__post__content">
        <h2>Posts Create</h2>

        <div class="admin__posts">
            <div class="admin__post">
                @include('admin.partials.errors')


                {!! Form::model( $post, array('action' => 'Admin\PostController@store')) !!}

                @include('admin.post._form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        // TODO data pickers
    </script>
@stop