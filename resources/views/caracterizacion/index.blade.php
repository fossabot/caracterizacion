@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])

@section('content')
  <div id="app" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Caracterización') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus caractizar tus usuarios') }}</p>
              </div>
              <buscarcaracterizacion-component></buscarcaracterizacion-component>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                @can('create', App\Model\Caracterizacion\Caracterizacion::class)
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('caracterizacion.create') }}" class="btn btn-sm btn-primary">{{ __('Añadir Caracterización') }}</a>
                  </div>
                </div>
                @endcan
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        {{ __('Nombres') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Facultad') }}
                      </th>
                    <th>
                        {{ __('Indispensable trabajo presencial') }}
                      </th>
                      <th>
                        {{ __('Cargo') }}
                      </th>
                      <th>
                        {{ __('Hora de Entrada') }}
                      </th>
                      <th>
                        {{ __('Hora de Salida') }}
                      </th>
                      <th>
                        {{ __('Viabilidad') }}
                      </th>
                      <th>
                        {{ __('Observación') }}
                      </th>
                      <th>
                        {{ __('Notas/Comentarios') }}
                      </th>
                      <th>
                        {{ __('Envio Consentimiento') }}
                      </th>
                      <th class="text-right">
                        {{ __('Accion') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($caracterizaciones as $dato)
                        <tr>
                          <td>
                            {{ $dato->user->name }} {{ $dato->user->apellido }}
                          </td>
                          <td>
                            {{ $dato->user->email }}
                          </td>
                          <td>
                            {{ $dato->user->unidad->nombre_unidad }}
                          </td>
                          <td>
                            {{ $dato->trabajo_en_casa }}
                          </td>
                          <td>
                            {{ $dato->user->cargo }}
                          </td>
                          <td>
                            {{ $dato->horaEntrada }}
                          </td>
                          <td>
                            {{ $dato->horaSalida }}
                          </td>
                          <td>
                            {{ $dato->viabilidad_caracterizacion }}
                          </td>
                          <td>
                            {{ $dato->observacion_cambios_de_estado }}
                          </td>
                          <td>
                            {{ $dato->notas_comentarios_ma_andrea_leyva }}
                          </td>
                          <td>
                            {{ $dato->envio_de_consentimiento }}
                          </td>
                          @can('update', $dato)
                          <td class="td-actions text-right">
                              <form action="{{ route('caracterizacion.destroy', $dato) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('caracterizacion.edit', $dato) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <a rel="tooltip" class="btn btn-danger btn-link" href="{{ route('caracterizacion.destroy', $dato) }}" data-original-title="" title="">
                                    <i class="material-icons">delete</i>
                                    <div class="ripple-container"></div>
                                  </a>
                              </form>
                          </td>
                          @endcan
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  {{ $caracterizaciones->links() }}
@endsection
