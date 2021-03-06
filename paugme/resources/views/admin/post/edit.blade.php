@extends('admin.layout.master')

@section('content')
    <div class="admin__post__content">
        <h2>Posts Edit</h2>

        <div class="admin__posts">
            <div class="admin__post">
                @include('admin.partials.success')
                @include('admin.partials.errors')


                {!! Form::model( $post, array('action' => ['Admin\PostController@update', $post['id']], 'method' => 'PUT')) !!}

                @include('admin.post._form')

                {!! Form::close() !!}

                @include('admin.post._delete-modal')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        // TODO data pickers

        window.postId = '{{$post['id']}}';
    </script>

    <script src="/js/admin.js"></script>
@stop