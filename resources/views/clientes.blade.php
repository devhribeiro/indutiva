@extends('home')

@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" id="myInput" class="form-control float-right" placeholder="Buscar">
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 100%;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($result->ResponseDetail->Objects as $Object)
                        <tr>
                            <td>{{$Object->Id}}</td>
                            <td>{{$Object->Identity}}</td>
                            <td>{{$Object->Name}}</td>
                            <td>{{$Object->Phone}}</td>
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
</div>

@endsection
