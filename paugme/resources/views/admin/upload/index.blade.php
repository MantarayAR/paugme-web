@extends('admin.layout.master')

@section('content')
    <div class="admin__uploads__content">
        <h1>Uploads</h1>

        <ul class="breadcrumbs">
            @foreach( $breadcrumbs as $path => $disp )
                <li><a href="/admin/upload?folder={{ $path }}">{{$disp}}</a></li>
            @endforeach
        </ul>

        <div class="admin__toolbar">
            <a href="/admin/upload/folder?folder={{$folder}}" class="admin__toolbar__button">
                <i class="fa fa-plus-circle"></i> New Folder
            </a>
            <a href="/admin/upload/file?folder={{$folder}}" class="admin__toolbar__button">
                <i class="fa fa-upload"></i> Upload
            </a>
        </div>

        <div class="admin__uploads">
            @include('admin.partials.errors')
            @include('admin.partials.success')

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Size</th>
                    <th data-sortable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                {{-- The Subfolders --}}
                @foreach ($subfolders as $path => $name)
                    <tr>
                        <td>
                            <a href="/admin/upload?folder={{ $path }}">
                                <i class="fa fa-folder fa-lg fa-fw"></i>
                                {{ $name }}
                            </a>
                        </td>
                        <td>Folder</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            <a type="button" class="button" href="/admin/upload/folder/delete/?folder={!! urlencode( $path ) !!}">
                                <i class="fa fa-times-circle fa-lg"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

                {{-- The Files --}}
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="{{ $file['webPath'] }}">
                                @if (FileService::isImage($file['mimeType']))
                                    <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                @else
                                    <i class="fa fa-file-o fa-lg fa-fw"></i>
                                @endif
                                {{ $file['name'] }}
                            </a>
                        </td>
                        <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                        <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                        <td>{{ FileService::humanFilesize($file['size']) }}</td>
                        <td>
                            <a type="button" class="button" href="/admin/upload/file/delete">
                                <i class="fa fa-times-circle fa-lg"></i>
                                Delete
                            </a>
                            @if (FileService::isImage($file['mimeType']))
                                <button type="button" class="btn btn-xs btn-success"
                                        onclick="preview_image('{{ $file['webPath'] }}')">
                                    <i class="fa fa-eye fa-lg"></i>
                                    Preview
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop