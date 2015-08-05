{!! Form:: open(array('action' => 'SignUpController@store'))  !!}
<ul class="errors">
    @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
</ul>

<div class="input-group">
{!! Form:: text ('email', '', array('placeholder' => 'Your Email', 'class' => 'input-large', 'id' => 'email' )) !!}
{!! Form::submit('Send Me Updates', array('class' => 'button button-yellow button-large')) !!}
</div>

{!! Form:: close() !!}
