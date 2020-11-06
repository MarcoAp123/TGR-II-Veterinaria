@extends('layouts.app')

@section('content')
    <section class="content">
        <h3>Tratamientos</h3>
        <button type="button" class="btn btn-success col-md-2 float-right" data-toggle="modal" data-target="#modal-treatment-create">Nuevo Tratamiento <i class="fa fa-plus"></i></button>
    <br><br>
    <!----- tabla de registros de clientes ----->
    <div class="box-body">
      <div class="box-header"></div>      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Sex</th>
          <th>Dias de duracion</th>
          <th>Semanas de duracion</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list_treatments as $treatment)
          <tr>
            <td>{{$treatment->id}}</td>
            <td>{{$treatment->name}}</td>
            <td>{{$treatment->species}}</td>
            <td>{{$treatment->sex}}</td>
            <td>{{$treatment->duration_days}}</td>
            <td>{{$treatment->duration_weeks}}</td>
            <td><div class="text-center"><button class="btn btn-warning col-md-9" data-toggle="modal" data-mytreatment_id='{{$treatment->id}}' data-myname='{{$treatment->name}}' data-myspecies='{{$treatment->species}}' data-mysex='{{$treatment->sex}}' data-myduration_days='{{$treatment->duration_days}}' data-myduration_weeks='{{$treatment->duration_weeks}}' data-target="#modal-treatment-edit"> <i class="fa fa-wrench"></i></button></div></td>
            <td>
              <form action="/treatments/{{$treatment->id}}" method="POST">
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
    

    <div class="modal fade" id="modal-treatment-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Nuevo Tratamiento </h4>    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Tratamiento : </h4>
            <br>
            <form action="{{ action('TreatmentController@store') }}" method="POST" class="form-horizontal" role='form'>
              @csrf
              <div class="box-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="..." name="species">
                    </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
                    <select class="form-control col-sm-3" style="width: 100%" name="sex">
                      <option value="Macho">Macho</option>
                      <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label">Dias de duracion</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="..." name="duration_days">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 control-label">Semanas de duracion</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" placeholder="" name="duration_weeks">
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
    

    <div class="modal fade" id="modal-treatment-edit">
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
                <input type="hidden" name="treatment_id" id="treatment_id">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre de la mascota" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="..." name="species" id="species">
                    </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
                    <select class="form-control col-sm-3" name="sex" id="sex">
                      <option value="Macho">Macho</option>
                      <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label">Dias de duracion</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="..." name="duration_days" id="duration_days">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 control-label">Semanas de duracion</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" placeholder="" name="duration_weeks" id="duration_weeks">
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
    </section>
@endsection
