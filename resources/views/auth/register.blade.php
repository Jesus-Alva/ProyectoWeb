@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Sign up with') }}</small></div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Or sign up with credentials') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="text-muted font-italic">
                                <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('Estoy de acuerdo con las') }} <a href="#" data-toggle="modal" data-target="#modalPoliticas">{{ __('Politicas de Privacidad') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPoliticas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Aviso de privacidad</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: justify;">
                    Estamos conscientes de la importancia que tiene para usted saber cómo utilizamos sus datos personales y le agradecemos que confíe que lo haremos con cuidado y sensatez. 
                    Este Aviso de Privacidad describe la forma en que Servicios de Librerías, recopilen y tratan sus datos personales a través de los sitios web, productos, servicios, tiendas en línea y aplicaciones que hacen referencia a este Aviso de Privacidad. 
                    Al utilizar nuestros Servicios, usted está dando su consentimiento a las prácticas descritas en este Aviso de Privacidad.
                    <br><br><h4>¿Qué datos Personales acerca de los Clientes recabamos?</h4>
                    Recopilamos sus datos personales con el fin de proporcionar y mejorar continuamente nuestros productos y servicios.
                    Estos son los tipos de datos personales que recabamos:
                    <br>•	Datos que usted Nos proporciona: Recibimos y almacenamos todos los datos que usted nos proporciona. Puede elegir no proporcionar ciertos datos, sin embargo, podría no ser capaz de aprovechar muchos de nuestros Servicios de Librerías. 
                    <br><br><h4>¿Con qué fines se utiliza sus Datos Personales?</h4>
                    Utilizamos sus datos personales para operar, proporcionar, desarrollar y mejorar los productos y servicios que ofrecemos a nuestros clientes. Las finalidades primarias incluyen:
                    <br>•	Proporcionar, solucionar problemas y mejorar los Servicios. Utilizamos sus datos personales para proporcionar funcionalidad, analizar el rendimiento, corregir errores y mejorar la usabilidad y eficacia de los Servicios.
                    <br>•	Recomendaciones y personalización. Utilizamos sus datos personales para recomendar aplicaciones, productos y servicios que puedan ser de su interés, identificar sus preferencias y personalizar su experiencia.
                    <br>•	Prevención de fraude y riesgos de crédito. Utilizamos datos personales para prevenir y detectar fraudes y abusos con el fin de proteger la seguridad de nuestros clientes y otros
                    <br><br><h4>¿Compartimos sus datos?</h4>
                    La información relativa a nuestros clientes es parte fundamental de nuestro negocio y no participamos en la venta a terceros de datos personales de nuestros clientes. 
                    Compartimos los datos personales de los clientes sólo en la forma que se describe a continuación: 
                    <br> •	Solo los datos personales se van a ocupar para que nuestra empresa recopile y haga una comparación de datos, de usuario a usuario.
                    <br>Las cuales están sujetas al presente Aviso de Privacidad o siguen prácticas al menos tan protectoras como las descritas en el presente Aviso de Privacidad.
                    <br><br><h4>Información Automática</h4>
                    Ejemplos de los datos que recabamos y analizamos:
                    <br>•	La dirección IP de internet que utiliza para conectarse a Internet con su computadora o dispositivo.
                    <br>•	Nombre de usuario, dirección de correo electrónico y contraseña.
                    <br>•	Ubicación de su dispositivo o computadora.
                    <br>•	Cuentas y contraseñas bancarias.
                    <br>•	Métricas de dispositivos, como cuando un dispositivo está en uso, uso de aplicaciones, datos de conectividad y cualquier error o falla.
                    <br><br><h4>Información a la que puede acceder</h4>
                    Ejemplos de información a la que puede acceder, incluye:
                        <br>•	Estado de las rentas recientes (incluyendo suscripciones);
                        <br>•	Historial completo de libros.
                        <br>•	Datos personales (incluyendo nombre, correo electrónico, contraseña y libreta de direcciones);
                        <br>•	contenido, dispositivos, servicios y configuraciones relacionadas, comunicaciones y preferencias publicitarias personalizadas;
       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
