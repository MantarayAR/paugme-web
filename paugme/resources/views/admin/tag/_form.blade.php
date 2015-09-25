<div class="input-group">
    {!! Form::label('Tag') !!}
    {!! Form::text('tag') !!}
</div>
<div class="input-group">
    {!! Form::label('Title') !!}
    {!! Form::text('title') !!}
</div>
<div class="input-group">
    {!! Form::label('Subtitle') !!}
    {!! Form::text('subtitle') !!}
</div>
<div class="input-group">
    {!! Form::label('Meta Description') !!}
    {!! Form::textarea('meta_description') !!}
</div>
<div class="input-group">
    {!! Form::label('Page Image') !!}
    {!! Form::text('page_image') !!}
</div>
<div class="input-group">
    {!! Form::label('Layout') !!}
    {!! Form::text('layout') !!}
</div>
<div class="input-group">
    {!! Form::label('Reverse Direction') !!}
    {!! Form::hidden('reverse_direction', '0') !!}
    {!! Form::checkbox('reverse_direction') !!} Reverse
</div>
