@extends('home')

@section('main')


<div class="row mb-3 col-md-12" style="justify-content: flex-end;">
    <div class="">
        <a href="#">
            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">Hoje</button>
        </a>
    </div>
    <div class="ml-3">
        <a href="#">
            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">Últimos 7 dias</button>
        </a>
    </div>
    <div class="ml-3">
        <a href="#">
            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">Últimos 30 dias</button>
        </a>
    </div>
    <div class="ml-3">
        <a href="#">
            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">Últimos 3 meses</button>
        </a>
    </div>
    <div class="ml-3">
        <a href="#">
            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">Período Personalizado</button>
        </a>
    </div>
</div>

<!-- Small Box (Stat card) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$result->ResponseDetail->TotalItems}}</h3>

                <p>Total de Vendas</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>R$
                    @php
                    echo str_replace('.', ',', number_format($pgconfirmado, 2, '.', ''))
                    @endphp
                </h3>
                <p>Pagamentos Autorizados</p>
            </div>
            <div class="icon">
                <i class="fas fa-wallet"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>R$
                    @php
                    echo str_replace('.', ',', number_format($pgpendente, 2, '.', ''))
                    @endphp
                </h3>
                <p>Pagamentos Pendentes</p>
            </div>
            <div class="icon">
                <i class="fas fa-funnel-dollar"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>R$
                    @php
                    echo str_replace('.', ',', number_format($pgrecusado, 2, '.', ''))
                    @endphp
                </h3>
                <p>Pagamentos Recusados</p>
            </div>
            <div class="icon">
                <i class="fas fa-comments-dollar"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 100%;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th>Taxas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result->ResponseDetail->Objects as $Object)
                        <tr>
                            <td>{{$Object->IdTransaction}}</td>
                            <td>
                                @php
                                switch ($Object->PaymentMethod) {
                                case 1:
                                echo "Boleto";
                                break;
                                case 2:
                                echo "Cartão de Crédito";
                                break;
                                case 3:
                                echo "Criptomoedas";
                                break;
                                case 4:
                                echo "Cartão de Débito";
                                break;
                                case 15:
                                echo "Antecipação";
                                break;
                                }
                                @endphp
                            </td>
                            <td>{{$Object->Customer->Name}}</td>
                            <td>
                                @php
                                $date = new DateTime($Object->CreatedDate);
                                echo $date->format('d/m/Y');
                                @endphp
                            </td>
                            <td><span class="tag tag-success">{{$Object->Message}}</span></td>
                            <td><span class="tag tag-success">R$
                                    @php
                                    echo str_replace('.', ',', number_format($Object->Amount, 2, '.', ''))
                                    @endphp</span></td>
                            <td><span class="tag tag-success">R$
                                    @php
                                    echo str_replace('.', ',', number_format($Object->NegotiationTax, 2, '.', ''))
                                    @endphp</span></td>
                            <td>
                                <a href="#"><i class="fas fa-eye"></i></a>
                                <a href="#" class="ml-2"><i class="fas fa-exchange-alt"></i></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @endsection
