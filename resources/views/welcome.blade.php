@extends('layouts.app')

@section('content')

<div class="content" id="container">
    <div class="row">
        <div class="col-md-12 col-xs-12" style="margin-top:0">
            <!--<img src="{{ asset('images/home/banner-nuevo-1.png') }}" style="width:100%">-->
            <img src="{{ asset('images/video-banner.gif') }}" style="width:100%" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="text-left title-estilo" style="margin-top: 2rem;">Buscar</div>
            <fieldset class="scheduler-border" style="background-color: white !important;">
            <!--<legend class="scheduler-border"><span class="title-estilo">Buscar</span></legend>-->

                <div class="row" style="padding-top: 3rem;">
                    <div class="col-md-6 col-xs-12">
                      <div class="col-md-12 col-xs-12">
                        <div class="col-md-12 col-xs-12 marcas-titulo-tipografia">
                          Marcas Relevantes
                        </div>
                        <carousel  :per-page="5" :autoplay="true" :loop="true" :autoplay-timeout="6000" :autoplay-hover-pause="true" :speed="2000" :navigation-enabled="true" :pagination-enabled="false">
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Audi">
                              <div class="col-md-12 col-xs-12">
                                <img src="{{ asset('images/home/logo-audi.png') }}" style="width:100%">
                              </div>
                                <div class="col-md-12 hidden-xs marcas-tipografia" >
                                  AUDI
                                </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Bmw">
                              <div class="col-md-12 col-xs-12">
                                <img src="{{ asset('images/home/logo-bmw.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                BMW
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Chevrolet">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-chevrolet.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                CHEVROLET
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Ford">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-ford.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                FORD
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Honda">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-honda.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                HONDA
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Hyundai">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-hyundai.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                HYUNDAI
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Mazda">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-mazda.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                MAZDA
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Mercedez">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-mercedez.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                MERCEDEZ
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Mini">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-mini.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                MINI
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Seat">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-seat.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                SEAT
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Subaru">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-subaru.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                SUBARU
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Toyota">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-toyota.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                TOYOTA
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Volkswagen">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-volkswagen.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                VOLKSWAGEN
                              </div>
                            </a>
                          </slide>
                        </carousel>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12" >
                      <div class="col-md-12 col-xs-12">
                        <div class="col-md-12 col-xs-12 marcas-titulo-tipografia">
                          Tipo de Carrocería
                        </div>
                        <carousel :per-page="4" :autoplay="true" :loop="true" :autoplay-timeout="6000" :autoplay-hover-pause="true" :speed="2000" :navigation-enabled="true" :pagination-enabled="false">
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Suv">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/suv.png') }}" style="width:100%" >
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                SUV
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Sedan">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/sedan.png') }}" style="width:100%" >
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                SEDAN
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Convertible">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/convertible.png') }}" style="width:100%" >
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                CONVERTIBLE
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Coupe">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/coupe.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                COUPE
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=DobleCabina">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/doble-cabina.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                DOBLE CABINA
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Furgon">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/furgon.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                FURGON
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Hatchback">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/hatchback.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                HATCHBACK
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Micro">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/micro.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                MICRO
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Minivan">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/minivan.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                MINIVAN
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Pickup">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/pickup.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                PICKUP
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=StationVagon">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/station-vagon.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                STATION VAGON
                              </div>
                            </a>
                          </slide>
                          <slide>
                            <a href="{{route('publicaciones.index')}}?buscar=Otro">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/otro.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                OTRO
                              </div>
                            </a>
                          </slide>
                        </carousel>
                      </div>
                  </div>
                </div>

                <hr>
                <form method="post" action="{{ route('publicaciones.index')}}" onsubmit="ventanaCargando()">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-xs-12">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" style="padding-bottom:  5px;padding-top: 5px;">
                                        Buscar
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-md-12 col-xs-12 accordion" >
                  <v-collapse-wrapper class=" accordion" >
                    <div style="text-align:center;padding:20px;text-decoration: underline;text-decoration-style:dotted;color: #248adf;" v-collapse-toggle>
                        <p>Búsqueda avanzada</p>
                    </div>
                    <div style="width:100%;overflow-y: auto;" v-collapse-content >
                      <form method="post" action="{{ route('publicaciones.index')}}" onsubmit="ventanaCargando()">
                        {{ csrf_field() }}
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <select name="tipo" class="form-control">
                                        <option value="">Tipos de  Carrocería</option>
                                        @foreach( $tipos as $tipo)
                                          <option value="{{ $tipo->id }}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                  <select name="combustible" class="form-control">
                                      <option value="">Combustible</option>
                                      @foreach( $combustible as $c)
                                          <option value="{{ $c->id }}">{{$c->descripcion}}</option>
                                      @endforeach
                                  </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                  <select name="marca" v-model="marca_id" class="form-control" @change="obtenermodelos()">
                                      <option value="" >Marcas</option>
                                      @foreach( $marcas as $marca)
                                          <option value="{{ $marca->id }}">{{$marca->descripcion}}</option>
                                      @endforeach
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                  <select name="modelo" class="form-control">
                                      <option value="">Modelo</option>
                                      <option v-for="item in modelos" :value="item.id">@{{item.descripcion}}</option>
                                  </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                  <select name="region_id" class="form-control" name="region">
                                      <option value="">Region</option>
                                      @foreach( $regiones as $region)
                                          <option value="{{ $region->id }}">{{$region->descripcion}}</option>
                                      @endforeach
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <div class="form-group">
                                  <select name="anio" class="form-control">
                                      <option value="">Año</option>
                                      @foreach( $anios as $anio)
                                          <option value="{{ $anio->id }}">{{$anio->descripcion}}</option>
                                      @endforeach
                                  </select>
                                  </div>
                              </div>
                          </div>
                              <div class="row">
                                  <div class="col-md-6 col-xs-12">
                                      <div class="form-group">
                                      <select name="kilometraje" class="form-control">
                                          <option value="">Kilometraje</option>
                                          @foreach( $kilometrajes as $kilometraje)
                                              <option value="{{ $kilometraje->id }}">{{number_format($kilometraje->descripcion,0,'','.')}} Km</option>
                                          @endforeach
                                      </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-xs-6">
                                      <div class="form-group">
                                      <select name="transmision" class="form-control">
                                          <option value="">Transmision</option>
                                          @foreach( $trasmision as $t)
                                              <option value="{{ $t->id }}">{{$t->descripcion}}</option>
                                          @endforeach
                                      </select>
                                      </div>
                                  </div>
                              </div>

                          <div class="row">
                              <div class="col-md-12 col-xs-12">
                                      <button class="btn  btn-primary" type="submit">Buscar</button>
                              </div>
                          </div>
                    </form>
                  </v-collapse-wrapper>
                </div>
      
        </fieldset>
        </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12">
          <div class="title-estilo" style="text-align: left;">Últimos Publicados</div>
          @foreach ($publicaciones as $publicacion)
                <a href="{{ route('publicaciones.details',$publicacion->id) }}">
                  <div class="col-md-3">
                    <div class="row">
                     <div class="col-sm-12 col-md-12">
                       <div class="thumbnail">
                        <img src="{{ route('imagen_almacenada',base64_encode($publicacion->imagenes->first()->ruta)) }}"   style="max-width: 100%;max-height: 100%;height:200px;" >
                         <div class="caption">
                          @php $i=0 @endphp
                           @foreach ($publicacion->atributos as  $atributo)
                             <h5 class="text-left" @if($i==0) style="color: black;font-weight: bold;font-size: 16px;" @elseif($i==1) style="color: #01b3e3;font-weight: bold;text-transform: uppercase;" @elseif($i==2) style="font-style: italic;color: gray;font-weight: bold;" @endif>{{$atributo->descripcion}}</h5>
                             @php $i++ @endphp
                            @endforeach
                         </div>
                       </div>
                     </div>
                   </div>
                </div>
              </a>
           @endforeach
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12">
          <a href="/publicaciones" style="text-align:center;padding:20px;text-decoration: underline;text-decoration-style:dotted;color: #248adf;">Cargar más</a>
        </div>
      </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12 text-left">
         <div class="title-estilo" style="text-align: left;">Blog</div>
          @foreach ($publicacionesWp as $publicacion)
           <div class="row" style="background-color: white;border: 1px solid #ddd;border-radius: 4px;padding-top: 20px;">
              <div class="col-md-4">
                 {!! $publicacion['image'] !!}
              </div>
              <div class="col-md-8">
                  <div>
                      <a target="_blank" class="link_block" href="{!! $publicacion['link'] !!}">
                      {!! $publicacion['title'] !!}
                      </a>
                  </div>
                  <div style="font-style: italic;">
                    {!! $publicacion['excerpt'] !!}
                  </div>
              </div>
           </div>
            <hr>
           @endforeach
      </div>
    </div>


</div>
@push('scripts')
<script src="{{asset('js/carrusel.js')}}"></script>
<script src="{{ asset('js/validaciones.js') }}"></script>
@endpush
@endsection
