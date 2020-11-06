@extends('layouts.app')

@section('content')
  <section class="content">
    <h3> Registrar una nueva consulta veterinaria</h3>
    <a class="btn btn-success col-md-3" data-toggle="collapse" href="#div-new_consultation" role="button" aria-expanded="false" aria-controls="div-new_consultation"><i class="fa fa-plus"></i> Nueva Consulta <i class="fa fa-user-md"></i></a>
    <br><br>
    <div class="collapse" id="div-new_consultation">
      <div class="card card-body">
        <div class="box-header">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 control-label">Consulta Nro :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="consultation_id" disabled>
            </div>
            <label class="col-sm-2 control-label">Empleado </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" value="{{Auth::user()->name}} , {{ Auth::user()->rol->name }}" disabled>
            </div>
          </div>
        </div>
        <form action="/store_new_consultation" class="form-horizontal" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 control-label">Cliente</label>
            <div class="col-sm-4">
              <select class="form-control select2 " name="client_id" id="client_id">
                @foreach ($list_clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
              </select>
            </div>
            <label class="col-sm-1 control-label">C.I. </label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="ci" disabled>
            </div>
            <label class="col-sm-1 control-label">NIT</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="nit" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 control-label">Mascota</label>
            <div class="col-sm-4">
              <select class="form-control select2" name="pet_id" id="pet_id">
              </select>
            </div>
            <label class="col-sm-1 control-label">Peso</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="weight" name="weight" step="any">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 control-label">Edad</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="age" name="age" step="any">
            </div>
            <label class="col-sm-2 control-label">Temperatura</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="temperature" name="temperature" step="any">
            </div>
            <label class="col-sm-2 control-label">Frecuencia cardiaca</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="heart_rate" name="heart_rate" step="any">
            </div>
          </div>
          <div class="form-group row">
          <label class="col-sm-2 control-label">Diagnostico</label>
          <textarea class="form-control col-sm-7" draggable="false" style="resize: none" id="diagnostic" name="diagnostic" rows="3"></textarea>  
          </div>
          <div class="text-center">
            <a href="{{ Route('new_consultation') }}" class="btn btn-block btn-default col-sm-2 float-left">Cancelar</a>
            <a class="btn btn-success col-sm-2 float-right" id="button-create-new_consultation" data-toggle="collapse" href="#div-medical-record" role="button" aria-expanded="false" aria-controls="div-medical record">Guardar</a>
          </div>
        </form>
      </div>
    </div>
    <div class="collapse" id="div-medical-record">
      <div class="card-header">
        <h4 class="card-title w-100">
          <a class="btn btn-block btn-success" data-toggle="collapse" href="#div-treatments" role="button" aria-expanded="false" aria-controls="div-treatments"> <i class="fa fa-plus"></i> Agreger tratamiento <i class="fa fa-stethoscope"> </i></a>
        </h4>
      </div>
      <div id="div-treatments" class="collapse">
        <div class="card-body">
          <form action="/store_medical_record" class="form-horizontal" method="POST" role='form'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 control-label float-left">Tratamiento</label>
              <div class="col-sm-6">
                <select class="form-control" style="width: 100%" name="treatment_id" id="treatment_id">
                  @foreach ($list_treatments as $treatment)
                      <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                  @endforeach
                </select>
              </div>
              <label class="col-sm-1 control-label">Especie</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="species" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-1 control-label">Sexo</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="sex" disabled>
              </div>
              <label class="col-sm-1 control-label">Dias</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="duration_days" disabled>
              </div>
              <label class="col-sm-1 control-label">Semanas</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="duration_weeks" disabled>
              </div>
              <label class="col-sm-1 control-label">Costo</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" name="cost" id="cost" step="any">
              </div>
              <a id="button-add-treatment" class="btn btn-success col-sm-2 float-right"><i class="fa fa-plus"></i> Registrar Tratamiento</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="table-medical_records">
      <div class="box box-warning">
        <table class="table table-bordered table-striped table-responsive-sm">
          <thead>
            <tr class="table-primary">
              <th scope="col">Historial Medico</th>
              <th scope="col">Tipo</th>
              <th scope="col">Costo</th>
            </tr>
          </thead>
          <tbody id="tbody-medical_record">

          </tbody>
        </table>
      </div>
      <div class="form-group row justify-content-end">
        <label class="col-sm-1 control-label">Total Bs:</label>
        <div class="col-sm-2">
          <input type="number" class="form-control" step="any" id="cost_total" disabled>
        </div>
      </div>
      <div class="form-group row justify-content-between">
        <button class="btn btn-primary col-sm-1 float-left" id="bill"><i class="fa fa-file-pdf-o"></i> Facturar</button>
        <a href="{{route('new_consultation')}}" class="btn btn-success col-sm-2 float-right">Guardar</a>
      </div>
    </div>
  </section>
@endsection
