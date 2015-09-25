@extends('admin.layout.master')

@section('content')
    <div class="blue-backdrop">
        <div class="panel">
            <div class="login__form">
                @include('admin.partials.errors')
                <form role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-group multiline">
                        <label>E-Mail Address</label>
                        <input type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" autofocus>
                    </div>

                    <div class="input-group multiline">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="input-group multiline">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>

                    <div class="input-group multiline">
                        <button type="submit" class="button button-blue">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection