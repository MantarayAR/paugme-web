@extends('master')

@section('content')
{!! Form:: open(array('action' => 'ContactController@store'))  !!}

<div class="blue-backdrop">
    <div class="panel">
        <h2>Contact Us</h2>
        <ul class="errors">
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            {!! Form:: text ('email', '', array('placeholder' => 'Your Email', 'class' => 'form-control', 'id' => 'email' )) !!}
            {!! Form:: textarea ('message', '', array('placeholder' => 'Message', 'class' => 'form-control', 'id' => 'message', 'rows' => '4' )) !!}
        </div>
        <div class="modal-footer">
            {!! Form::submit('Submit', array('class' => 'button button-primary')) !!}
            {!! Form:: close() !!}
        </div>
    </div>

</div>
@stop
