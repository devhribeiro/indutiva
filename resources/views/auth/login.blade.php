@extends('layouts.app')

@section('content')
<div class="login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <!-- <a href="../../index2.html" class="h1"><b>Aritana</b> SJ</a> -->
                <img src="{{url('')}}/img/indutiva/logo-indutiva.png" style="height: 80px"/>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Faça login para acessar o sistema</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Continuar conectado
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    
                </form>

                <p class="mb-1">
                    <a href="{{ route('password.request') }}">Recuperar senha</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.login-box -->
@endsection