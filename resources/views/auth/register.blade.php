@extends('home')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="safe2pay_token" class="col-md-4 col-form-label text-md-right">{{ __('Token') }}</label>

                            <div class="col-md-6">
                                <input id="safe2pay_token" type="text" class="form-control @error('safe2pay_token') is-invalid @enderror" name="safe2pay_token" value="{{ old('safe2pay_token') }}" require>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="safe2pay_secretkey" class="col-md-4 col-form-label text-md-right">{{ __('Secret Key') }}</label>

                            <div class="col-md-6">
                                <input id="safe2pay_secretkey" type="text" class="form-control @error('safe2pay_secretkey') is-invalid @enderror" name="safe2pay_secretkey" value="{{ old('safe2pay_secretkey') }}" require>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="safe2pay_tokenSandbox" class="col-md-4 col-form-label text-md-right">{{ __('Token Sandbox') }}</label>

                            <div class="col-md-6">
                                <input id="safe2pay_tokenSandbox" type="text" class="form-control @error('safe2pay_tokenSandbox') is-invalid @enderror" name="safe2pay_tokenSandbox" value="{{ old('safe2pay_tokenSandbox') }}" require>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="safe2pay_secretSandbox" class="col-md-4 col-form-label text-md-right">{{ __('Secret Key Sandbox') }}</label>

                            <div class="col-md-6">
                                <input id="safe2pay_secretSandbox" type="text" class="form-control @error('safe2pay_secretSandbox') is-invalid @enderror" name="safe2pay_secretSandbox" value="{{ old('safe2pay_secretSandbox') }}" require>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
