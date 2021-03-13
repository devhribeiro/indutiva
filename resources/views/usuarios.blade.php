@extends('home')

@section('main')

<div class="row">
    <div class="col-md-2 mb-4">
        <a href="/registrar"><button type="button" class="btn btn-block btn-outline-primary btn-flat">Novo</button></a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Token</th>
                            <th>Secret Key</th>
                            <th>Token Sandbox</th>
                            <th>Secret Key Sandbox</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>VICTOR HUGO RIBEIRO</td>
                            <td>94632FD5DFC74A2E9CB7DF66B41EA7FB</td>
                            <td>715A4CF7AEC542A7B5133D926FBC60A7C6EB55C3DB874968994CAAB8ABE5E451</td>
                            <td>916996D1D2B141C4B234255E1124155A</td>
                            <td>5C376DABBF4C40B8BE04457F0FE6A31C74F9D5FCDA264E3882F835EF70278CDC</td>
                            <td>
                                <a href="#"><i class="fas fa-user-edit"></i></a>
                                <a href="#" class="ml-2"><i class="fas fa-trash"></i></i></a>
                            </td>
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