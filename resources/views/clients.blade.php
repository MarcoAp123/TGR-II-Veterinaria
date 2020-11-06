@extends('layouts.app')

@section('content')
  <!----- index de clientes ----->
  <section class="content">
    <h3>Clientes</h3>
    <button type="button" class="btn btn-success col-md-2 float-right" data-toggle="modal" data-target="#modal-client-create">Nuevo Cliente <i class="fa fa-user-plus"></i></button>
    <br><br>
    <!----- tabla de registros de clientes ----->
    <div class="box-body">
      <div class="box-header"></div>      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>CI</th>
          <th>NIT</th>
          <th>Celular</th>
          <th>Direccion</th>
          <th>Mascotas</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list_clients as $client)
          <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->ci}}</td>
            <td>{{$client->nit}}</td>
            <td>{{$client->phone}}</td>
            <td>{{$client->adress}}</td>
            <td><div class="text-center"><a href="/pets/{{$client->id}}" class="btn btn-primary">mascotas</a></div></td>
            <td><div class="text-center"><button class="btn btn-warning col-md-9" data-toggle="modal" data-myclient_id='{{$client->id}}' data-myname='{{$client->name}}' data-myci='{{$client->ci}}' data-mynit='{{$client->nit}}' data-myadress='{{$client->adress}}' data-myphone='{{$client->phone}}' data-target="#modal-client-edit"> <i class="fa fa-wrench"></i></button></div></td>
            <td>
              <form action="/clients/{{$client->id}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="text-center"><button type="button" class="btn btn-danger btn-delete col-md-7"> <i class="fa fa-trash"></i></button></div>
              </form> 
            </td>             
          </tr>
          @endforeach                  
        </tbody>
      </table>
    </div>
    <!----- Fin de la tabla de cliente ----->


    <!----- Modal de creacion de cliente ----->
    <div class="modal fade" id="modal-client-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Nuevo Cliente </h4>    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Cliente : </h4>
            <br>
            <form action="{{ action('ClientController@store') }}" method="POST" class="form-horizontal" role='form'>
              @csrf
              <div class="box-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 control-label">C.I.</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="..." name="ci">
                    </div>
                  <label for="inputEmail3" class="col-sm-1 control-label">NIT</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" placeholder="..." name="nit">
                        </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">Celular</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" placeholder="..." name="phone">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Direccion</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="adress">
                  </div>
                </div>                
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success float-right">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!----- Fin del Modal de creacion de cliente ----->


    <!----- Modal de edicion de empleado ----->
    <div class="modal fade" id="modal-client-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-wrench"></i> Editar Empleado</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Empleado : </h4>
            <form action="{{ route('client.update', 'test') }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
              <div class="box-body">
                <input type="hidden" name="client_id" id="client_id">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 control-label">C.I.</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="..." name="ci" id="ci">
                    </div>
                  <label for="inputEmail3" class="col-sm-1 control-label">NIT</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" placeholder="..." name="nit" id="nit">
                        </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">Celular</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" placeholder="..." name="phone" id="phone">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Direccion</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="adress" id="adress">
                  </div>
                </div>                
              </div>
              
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  
    <!----- Fin del Modal de edicion de cliente ----->

  </section>
@endsection