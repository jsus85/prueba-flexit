@extends('layouts.app')

@section('content')



<div class="panel panel-default">

	<div class="panel-heading">Reset Password</div>

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/recover') }}">

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

		<br>

		<div class="form-group">

			<label for="email" class="col-md-4 control-label">E-Mail Address</label>

			<div class="col-md-6">

			    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" 	required autofocus>
			    </div>

			</div>





		<div class="form-group">

			<div class="col-md-6 col-md-offset-4">

			    <button type="submit" class="btn btn-primary">

			        Reset Password

			    </button>

				<a href="{{ url('/') }}" class="btn btn-danger">Cancelar</a>


			</div>

		</div>

		</form>

	</div>

</div>

@endsection