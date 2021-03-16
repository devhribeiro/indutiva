@extends('home')

@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Banco</th>
                            <th>Agência</th>
                            <th>Conta</th>
                            <th>Operação</th>
                            <th>Tipo conta</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$result->ResponseDetail->Bank}}</td>
                            <td>{{$result->ResponseDetail->Agency}}-{{$result->ResponseDetail->AgencyDigit}}</td>
                            <td>{{$result->ResponseDetail->Account}}-{{$result->ResponseDetail->AccountDigit}}</td>
                            <td>{{$result->ResponseDetail->Operation}}</td>
                            <td>{{$result->ResponseDetail->AccountType}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
