@extends('layouts.app')

@section('content')
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('home') }}" class="nav-link">Inicio</a>
            </li>

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link mr-4">Sair</a>
            </li>
        </ul>

        
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('')}}" class="brand-link">
            <img src="{{url('')}}/img/indutiva/logo-agencia-indutiva-comunicacao-branca-site.png" alt="Indutiva Logo" class="elevation-5 ml-5" style="height: 40px;">
            <!-- <span class="brand-text font-weight-light"> .</span> -->
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                    <li class="nav-header"></li>
                    
                    <li class="nav-item menu-open">
                        <a href="{{ url('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Acesso Rápido
                            </p>
                        </a>
                    </li>

                    <li class="nav-header"></li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-suitcase nav-icon"></i>
                            <p>
                                Operacional
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <a href="{{ url('transacoes') }}" class="nav-link">
                                <i class="nav-icon fas fa-fire"></i>
                                <p>
                                    Tempo Real
                                </p>
                            </a>

                            <a href="{{ url('transacoes') }}" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <p>
                                    Transações
                                </p>
                            </a>

                            <a href="{{ url('clientes') }}" class="nav-link">
                                <i class="far fa-address-book nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-dollar-sign nav-icon"></i>
                            <p>
                                Financeiro
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <a href="{{ url('depositos') }}" class="nav-link">
                                <i class="fas fa-wallet nav-icon"></i>
                                <p>Conta Corrente</p>
                            </a>

                            <a href="{{ url('dados-bancarios') }}" class="nav-link">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Dados bancários</p>
                            </a>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-credit-card nav-icon"></i>
                            <p>
                                Pagamento
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <a href="{{ url('dados-bancarios') }}" class="nav-link">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Cobrança</p>
                            </a>

                            <a href="{{ url('depositos') }}" class="nav-link">
                                <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Carnê</p>
                            </a>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-hand-holding-usd nav-icon"></i>
                            <p>
                                Cobranças Recorrentes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <a href="{{ url('dados-bancarios') }}" class="nav-link">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Planos</p>
                            </a>

                            <a href="{{ url('depositos') }}" class="nav-link">
                                <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Assinaturas</p>
                            </a>

                            <a href="{{ url('depositos') }}" class="nav-link">
                                <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Recorrência</p>
                            </a>

                            <a href="{{ url('depositos') }}" class="nav-link">
                                <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Gerenciamento de Recorrência</p>
                            </a>
                        </ul>
                    </li>


                    <li class="nav-header"></li>
                    
                    <li class="nav-item">

                        <a href="#" class="nav-link">
                            <i class="fas fa-cogs nav-icon"></i>
                            <p>
                                Configurações
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <a href="{{url('usuarios')}}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>
                                    Usuarios
                                </p>
                            </a>
                            
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">

                        @yield('main')

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- http://system/wrapper -->

<!-- REQUIRED SCRIPTS -->
@endsection