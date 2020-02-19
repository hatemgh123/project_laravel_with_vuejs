@extends('layouts.app')
@section('title', "s'inscrire")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="box-shadow: 0 30px 60px 0 rgba(13, 82, 159, 0.12)">
                <h3  class="text-center" ><strong> Registre</strong></h3>
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf 
                         <div class="form-group row">
                               
                            <label for="matricule" class="col-md-4 col-form-label text-md-right">Matricule</label>

                            <div class="col-md-6">
                                <input id="matricule" type="text" class="form-control{{ $errors->has('matricule') ? ' is-invalid' : '' }}" name="matricule" value="{{ old('matricule') }}" required autofocus>

                                @if ($errors->has('matricule'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('matricule') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                               
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adresse E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmez le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        registre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">    <img   src="{{ asset('images/svg/undraw_authentication_fsn5.svg') }}" style="    height:  247px;"></div>
        </div>
        
    </div>
</div>
@endsection
