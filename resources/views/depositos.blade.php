@extends('home')

@section('main')

<!-- Small Box (Stat card) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$dptotais}}</h3>
                <p>Total de depositos</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
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
                    echo str_replace('.', ',', number_format($dpconfirmado, 2, '.', ''))
                @endphp
                </h3>
                <p>Depositos confirmados</p>
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
                    echo str_replace('.', ',', number_format($dpconfirmado, 2, '.', ''))
                @endphp
                </h3>
                <p>Depositos pendentes</p>
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
                <h3>0</h3>
                <p>Depositos não efetuados</p>
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
                <h3 class="card-title">Depositos</h3>

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
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Taxas</th>
                            <th>Transferencia</th>
                            <th>Numero Pagamento</th>
                            <th>Confirmação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result->ResponseDetail->Deposits as $Deposit)
                        <tr>
                            <td>
                            @php
                                $date = new DateTime($Deposit->DepositDate);
                                echo $date->format('d/m/Y');
                            @endphp    
                            </td>
                            <td>R$ 
                            @php
                                echo str_replace('.', ',', number_format($Deposit->Amount, 2, '.', ''))
                            @endphp
                            </td>
                            <td>R$ 
                            @php
                                echo str_replace('.', ',', number_format($Deposit->Tax, 2, '.', ''))
                            @endphp
                            </td>
                            <td>{{$Deposit->Message}}</td>
                            <td>
                            @php
                                if($Deposit->PaymentNumber == null)
                                {
                                    echo 'Não haverá depósito';
                                }
                                else 
                                {
                                    echo $Deposit->PaymentNumber;
                                }
                            @endphp</td>
                            <td>
                            @php
                                if($Deposit->HashConfirmation == null)
                                {
                                    echo 'Não haverá depósito';
                                }
                                else 
                                {
                                    echo $Deposit->HashConfirmation;
                                }
                            @endphp
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