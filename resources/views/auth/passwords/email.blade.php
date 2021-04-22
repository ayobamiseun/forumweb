@extends('layouts.main')

@section('content')
<form action="{{ route('password.email') }}" method="POST">
    {{ csrf_field() }}
    <div class="panel">
        <div class="inner">
            <div class="content">
                <h2 class="login-title">Password recovery</h2>
                <fieldset class="fields1">
                    <dl>
                        <dt><label for="email">Email address:</label></dt>
                        <dd>
                            <input type="email" name="email" id="email" size="25" value="{{ old('email') }}" class="inputbox autowidth" />
                            @if ($errors->has('email'))
                            <br /><span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </dd>
                    </dl>
                    <dl>
                        <dt>&nbsp;</dt>
                        <dd><input type="submit" name="login" value="Send Password Reset Link" class="button1" /></dd>
                    </dl>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="panel">
        {{-- <div class="inner">
            <div class="content">
                <h3>NOTICE</h3>
                <p>The mailing functionality is disabled. No actual email will be sent.</p>
            </div>
        </div> --}}
    </div>
</form>
@endsection
