@extends('layouts.app')

@section('content')
    <section class="content">
        <h3>Empleados</h3>
    <div class="box-body">
        <div class="box-header">
            <button type="button" class="btn btn-success col-md-2 float-right" data-toggle="modal" data-target="#modal-user-create">Nuevo Empleado <i class="fa fa-user-plus"></i></button>
        </div>      
        <br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Cargo</th>
          <th>Email</th>
          <th>Salario</th>
          <th>Celular</th>
          <th>Direccion</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list_users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->rol->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->salary }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->adress }}</td>
            <td><div class="text-center"><button class="btn btn-warning" data-toggle="modal" data-myuser_id='{{$user->id}}' data-myname='{{$user->name}}' data-myemail='{{$user->email}}' data-myrol_id='{{$user->rol->id}}' data-mysalary='{{$user->salary}}' data-mypassword='{{$user->password}}' data-myphone='{{$user->phone}}' data-myadress='{{$user->adress}}'data-target="#modal-user-edit"> <i class="fa fa-wrench"></i></button>
            </div></td>
            <td><div class="text-center">
              <form action="/users/{{$user->id}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="button" class="btn btn-danger btn-delete"> <i class="fa fa-trash"></i></button></div></td> 
              </form>              
            </tr>
          @endforeach                  
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="modal-user-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Nuevo Empleado </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Empleado : </h4>
            <form action="{{ action('UserController@store') }}" method="POST" class="form-horizontal" role='form'>
              @csrf
              <div class="box-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Rol</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 select2-selection-hidden" style="width: 100%" name="rol_id">
                      @foreach ($list_rols as $rol)
                          <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" name="email">
                  </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">Contraseña</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="min 8 caracteres" name="password">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Celular</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="..." name="phone">
                    </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Salario</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" placeholder="..." name="salary" step="any">
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


    <div class="modal fade" id="modal-user-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-wrench"></i> Editar Empleado</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Empleado : </h4>
            <form action="{{ route('user.update', 'test') }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
              <div class="box-body">
                <input type="hidden" name="user_id" id="user_id">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Rol</label>
                  <div class="col-sm-9">
                    <select class="form-control" style="width: 100%" name="rol_id" id="rol_id">
                      @foreach ($list_rols as $rol)
                          <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" name="email" id="email">
                  </div>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 control-label">Contraseña</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="min 8 caracteres" name="password" id="password">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Celular</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="..." name="phone" id="phone">
                    </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Salario</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="..." name="salary" id="salary">
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
                <button type="submit" class="btn btn-default float-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
    </section>
@endsection
