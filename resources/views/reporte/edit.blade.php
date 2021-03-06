@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => __('Eventos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('eventos.update', $evento) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Evento') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('eventos') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('nombre') }}" value="{{ old('nombre', $evento->nombre) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombre'))
                        <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('descripcion') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">  
                       <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="input-descripcion" type="" placeholder="{{ __('descripcion') }}" value="{{ old('descripcion', $evento->descripcion) }}" rows="3">{{ old('descripcion', $evento->descripcion) }}</textarea>
                      @if ($errors->has('descripcion'))
                        <span id="descripcion-error" class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-fecha">{{ __(' fecha') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" input type="date" name="fecha" id="input-fecha" placeholder="{{ __('fecha') }}" value="{{ old('fecha', $evento->fecha) }}" />
                      @if ($errors->has('fecha'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('fecha') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="hora" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora', $evento->hora) }}"  />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-imagen">{{ __('imagen') }}</label>
                  <div class="col-sm-7">
                    <div class="form-control-file">
                      <input class="form-control-file" name="imagen" id="input-imagen" type="file" value="{{ old('imagen', $evento->imagen) }}"/>
                    </div>
                  </div>
                </div>  <br>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('estado') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                      <div class="togglebutton">
                        <label>
                          <input name="estado" type="checkbox" {{ $evento->estado ? ' checked' : '' }}  value="{{ old('estado', 1) }}">
                          <span class="toggle"></span>         
                        </label>
                      </div> 
                      @if ($errors->has('estado'))
                      <span id="estado-error" class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                      @endif
                    </div>
                  </div>
                </div>               
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection