@extends('home')

@section('main')

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
                    echo str_replace('.', ',', number_format($pnrecusado, 2, '.', ''))
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transações</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection

