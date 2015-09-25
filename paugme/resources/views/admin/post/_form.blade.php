<div class="row-fluid">
    <div class="column two-thirds">
        <div class="input-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title') !!}
        </div>
        <div class="input-group">
            {!! Form::label('Subtitle') !!}
            {!! Form::text('subtitle') !!}
        </div>
        <div class="input-group">
            {!! Form::label('Content') !!}
            {!! Form::textarea('content') !!}
        </div>
        <div class="input-group">
            {!! Form::label('Meta Description') !!}
            {!! Form::textarea('meta_description') !!}
        </div>
    </div>
    <div class="column one-third">
        {!! Form::submit('Save Post', ['class' => 'button button-block']) !!}
        <a class="button button-block button-danger" href="#" data-show="showDeleteButton" data-action="showDeleteModal">Delete</a>

        <div class="input-group multiline">
            {!! Form::label('Publish Date') !!}
            {!! Form::text('publish_date') !!}
        </div>
        <div class="input-group multiline">
            {!! Form::label('Publish Time') !!}
            {!! Form::text('publish_time') !!}
        </div>
        <div class="input-group multiline">
            {!! Form::hidden('is_draft', '0') !!}
            {!! Form::checkbox('is_draft') !!} Draft?
        </div>
        <div class="input-group multiline">
            {!! Form::label('Page Image') !!}
            {!! Form::text('page_image') !!}
        </div>

        <div class="input-group multiline">
            {!! Form::label('Tags') !!}
            <select name="tags[]" id="tags" multiple>
                @foreach ($allTags as $tag)
                    <option @if (in_array($tag, $tags)) selected @endif
                    value="{{ $tag }}">
                        {{ $tag }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="input-group multiline">
            {!! Form::label('Layout') !!}
            {!! Form::text('layout') !!}
        </div>
        <div class="input-group multiline">
            {!! Form::label('Rendering Type') !!}
            {!! Form::text('rendering_type') !!}
        </div>

    </div>
</div>


