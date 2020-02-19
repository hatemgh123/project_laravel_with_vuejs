@extends('layouts.app')
@section('title', "réinitialiser le mot de passe")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="box-shadow: 0 30px 60px 0 rgba(13, 82, 159, 0.12)">
                <h3  class="text-center" ><strong> Réinitialiser le mot de passe</strong></h3>
            <div class="card">
              

                <div class="card-body">
         
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">    <img   src="{{ asset('images/svg/undraw_forgot_password_gi2d.svg') }}" style="    height:  247px;"></div>
        </div>
    </div>
</div>
@endsection
