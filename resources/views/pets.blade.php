@extends('layouts.app')

@section('content')
    <section class="content">
        <h3>Mascotas</h3>
    <div class="box-body">
        <div class="box-header">
            <button type="button" class="btn btn-success col-md-2 float-right" data-toggle="modal" data-target="#modal-pet-create">Nuevo Mascota <i class="fa fa-plus"></i></button>
        </div>      
        <br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Sexo</th>
          <th>Edad</th>
          <th>Raza</th>
          <th>Peso</th>
          <th>Color</th>
          <th>Propietario</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list_pets as $pet)
          <tr>
            <td>{{ $pet->id }}</td>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->species }}</td>
            <td>{{ $pet->sex }}</td>
            <td>{{ $pet->age }}</td>
            <td>{{ $pet->race }}</td>
            <td>{{ $pet->weight }}</td>
            <td>{{ $pet->color }}</td>
            <td>{{ $pet->client->name }}</td>
            <td><div class="text-center"><button class="btn btn-warning" data-toggle="modal" data-mypet_id='{{$pet->id}}' data-myname='{{$pet->name}}' data-myspecies='{{$pet->species}}' data-myage='{{$pet->age}}' data-myrace='{{$pet->race}}' data-myweight='{{$pet->weight}}' data-mycolor='{{$pet->color}}' data-mysex='{{$pet->sex}}' data-myclient_id='{{$pet->client_id}}' data-target="#modal-pet-edit"> <i class="fa fa-wrench"></i></button>
            </div></td>
            <td><div class="text-center">
              <form action="/pets/{{$pet->id}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="button" class="btn btn-danger btn-delete"> <i class="fa fa-trash"></i></button></div></td> 
              </form>              
            </tr>
          @endforeach                  
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="modal-pet-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Nuevo Mascota </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Mascota : </h4>
            <form action="{{ action('PetController@store') }}" method="POST" class="form-horizontal" role='form'>
              @csrf
              <div class="box-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" f>Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Especie</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="species">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-4 ">
                    <select class="form-control" style="width: 100%" name="sex">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select> 
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Edad</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Años" name="age">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Raza</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="..." name="race">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Peso</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="Kgs." name="weight" step="any">
                    </div>
                    <label for="inputEmail3" class="col-sm-1 control-label">Color</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="..." name="color">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Propietario</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 select2-selection-hidden" style="width: 100%" name="client_id" >
                      @foreach ($list_clients as $client)
                          <option value="{{ $client->id }}">{{ $client->name }}</option>
                      @endforeach
                    </select>
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

    <div class="modal fade" id="modal-pet-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-wrench"></i> Editar Mascota</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"> Mascota : </h4>
            <form action="{{ route('pet.update', 'test') }}" method="POST" class="form-horizontal">
              @method('PUT')
              @csrf
              <div class="box-body">
                <input type="hidden" name="pet_id" id="pet_id">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" f>Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Especie</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="" name="species" id="species">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-4 ">
                    <select class="form-control" style="width: 100%" name="sex" id="sex">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select> 
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Edad</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Años" name="age" id="age">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Raza</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="..." name="race" id="race">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Peso</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="Kgs." name="weight" step="any" id="weight">
                    </div>
                    <label for="inputEmail3" class="col-sm-1 control-label">Color</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="..." name="color" id="color">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Propietario</label>
                  <div class="col-sm-9">
                    <select class="form-control" style="width: 100%" name="client_id" id="client_id">
                      @foreach ($list_clients as $client)
                          <option value="{{ $client->id }}">{{ $client->name }}</option>
                      @endforeach
                    </select>
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
