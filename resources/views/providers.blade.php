@extends('layouts.app')

@section('content')
    <section class="content">
        <h3>Proveedores</h3>
    <div class="box-body">
        <div class="box-header">
            <button type="button" class="btn btn-success col-md-2 float-right" data-toggle="modal" data-target="#modal-provider-create">Nuevo Proveedor <i class="fa fa-user-plus"></i></button>
        </div>      
        <br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Empresa</th>
          <th>Descripcion</th>
          <th>C.I.</th>
          <th>NIT</th>
          <th>E-Mail</th>
          <th>Celular</th>
          <th>Direccion</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list_providers as $provider)
          <tr>
            <td>{{ $provider->id }}</td>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->company }}</td>
            <td>{{ $provider->description }}</td>
            <td>{{ $provider->ci }}</td>
            <td>{{ $provider->nit }}</td>
            <td>{{ $provider->email }}</td>
            <td>{{ $provider->phone }}</td>
            <td>{{ $provider->adress }}</td>
            <td><div class="text-center"><button class="btn btn-warning" data-toggle="modal" data-myprovider_id='{{$provider->id}}' data-myname='{{$provider->name}}' data-mycompany='{{$provider->company}}' data-mydescription='{{$provider->description}}' data-myci='{{$provider->ci}}' data-mynit='{{$provider->nit}}' data-myphone='{{$provider->phone}}' data-myemail='{{$provider->email}}' data-myadress='{{$provider->adress}}'data-target="#modal-provider-edit"> <i class="fa fa-wrench"></i></button>
            </div></td>
            <td><div class="text-center">
              <form action="/providers/{{$provider->id}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="button" class="btn btn-danger btn-delete"> <i class="fa fa-trash"></i></button></div></td> 
              </form>              
            </tr>
          @endforeach                  
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="modal-provider-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Nuevo Proveedor </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Proveedor : </h4>
            <form action="{{ action('ProviderController@store') }}" method="POST" class="form-horizontal" role='form'>
              @csrf
              <div class="box-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" f>Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Empresa</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="company">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Descripcion</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="description">
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
                <label for="inputEmail3" class="col-sm-3 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" name="email">
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
                    <input type="text" class="form-control" placeholder="#, calle, zona" name="adress">
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


    <!----- Modal de edicion de empleado ----->
    <div class="modal fade" id="modal-provider-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-wrench"></i> Editar Empleado</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Empleado : </h4>
            <form action="{{ route('provider.update', 'test') }}" method="POST" class="form-horizontal">
              @method('PUT')
              @csrf
              <div class="box-body">
                <input type="hidden" name="provider_id" id="provider_id">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="inputEmail3" >Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Empresa</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="company" id="company">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Descripcion</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="description" id="description">
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
                <label for="inputEmail3" class="col-sm-3 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" name="email" id="email">
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
                    <input type="text" class="form-control" placeholder="#, calle, zona" name="adress" id="adress">
                  </div>
                </div>
              
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning float-right">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </section>
@endsection
