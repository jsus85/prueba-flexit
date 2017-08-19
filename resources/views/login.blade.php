@extends('layouts.app')

@section('content')

<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">

    <div class="panel-heading"><b>EnhanceTv Account</b></div>
    <div class="panel-body">
        <form class="form-horizontal"  role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

              @if(session('notification'))
                        <div class="alert alert-danger">
                           {{session('notification')}}
                        </div>
                    @endif

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <div class="form-group">
                <div class="col-md-12">
                    <input id="email" placeholder="Ingrese su Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>                
                </div>
            </div>

            <div class="form-group">                
                <div class="col-md-12">
                    <input id="password" placeholder="Ingrese su Clave" type="password" class="form-control" name="password" required />                 
                </div>
            </div>

			<div class="row">
				<div class="col-md-4">
					<a class="btn btn-link" href="{{ url('/recover') }}">
                        Forgot Your <br>Password?
                    </a>
                </div>
				<div class="col-md-4">
					<div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                        </label>
                    </div>
                </div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary">
                        Login
                    </button>
                 </div>
			</div>

        </form>
    </div>
</div>
</div>
       
@endsection