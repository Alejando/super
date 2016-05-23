@extends('layouts.m_inicio')
@section('titulo')Iniciar Sesión
@endsection
@section('contenido')
    <div class="login-form">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        <div class="top">
          <img src="img/logo.jpg" alt="icon" class="icon">
          <h1>SUPER</h1>
          <h4>Sistema Unico de Pago Electrónico para Rutas</h4>
        </div>
        <div class="form-area">
                     {!! csrf_field() !!}
              <div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email"  placeholder="Correo">
                    <i class="fa fa-user"></i>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
             </div>
            <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                     <i class="fa fa-key"></i>
            
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            

          <div class="checkbox checkbox-primary">
            <input id="checkbox101" name="remember" type="checkbox" checked>
            <label for="checkbox101"> Recordarme</label>
          </div>
          <button type="submit" class="btn btn-default btn-block">Iniciar Sesión</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="{{ url('/register') }}"><i class="fa fa-external-link"></i> ¡Registrarmé!</a></div>
        <div class="col-xs-6 text-right"><a href="{{ url('/password/reset') }}"><i class="fa fa-lock"></i>¿Olvidaste tu contraseña?</a></div>
      </div>
    </div>
@endsection
