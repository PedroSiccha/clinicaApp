@extends('layouts.app')

@section('content')


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
        <!-- Bootstrap -->
        <link href="{{asset('../vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('../vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('../vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('../vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    
        <!-- Custom Theme Style -->
        <link href="{{asset('../build/css/custom.min.css')}}" rel="stylesheet">
      </head>
    
      <body class="login">
        <div>
          <a class="hiddenanchor" id="signup"></a>
          <a class="hiddenanchor" id="signin"></a>
    
          <div class="login_wrapper">
            <div class="animate form login_form">
              <section class="login_content">
                <form form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                  <h1>Acceder al Sistema</h1>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Usuario"/>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                     @endif
                  </div>
                  <div div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña"/>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                     @endif
                  </div>
                  <div>
                    <button type="submit" class="btn btn-default">Acceder</button>
                    <a  class="btn btn-link" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
                  </div>
    
                  <div class="clearfix"></div>
    
                  <div class="separator">
                    <div class="clearfix"></div>
                    <br />
    
                    <div>
                      <h1><i class="fa fa-heart"></i> Clinica System!</h1>
                      
                    </div>
                  </div>
                </form>
              </section>
            </div>
          </div>
        </div>
      </body>



@endsection
