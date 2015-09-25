@extends('admin.layout.master')

@section('content')
    <div class="admin__post__content">
        <h2>Posts</h2>
        <div class="admin__toolbar">
            <a href="/admin/post/create" class="admin__toolbar__button">
                <i class="fa fa-plus-circle"></i> New Post
            </a>
        </div>

        <div class="admin__posts">
            @include('admin.partials.errors')
            @include('admin.partials.success')

            <table id="posts-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Published</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th data-sortable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td data-order="{{ $post->published_at->timestamp }}">
                            {{ $post->published_at->format('j-M-y g:ia') }}
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->subtitle }}</td>
                        <td>
                            <a href="/admin/post/{{ $post->id }}/edit"
                               class="button">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="/blog/{{ $post->slug }}"
                               class="button">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop