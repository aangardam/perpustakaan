@extends('layouts.index')

@section('login')
	<div class="middle-box text-center loginscreen animated fadeInDown">
		<div>
			<div>
				<h1 class="logo-name">
                        <img alt="image" src="{{asset('img/books-42701_640.png')}}" width="100px" />
                </h1>
            </div>
            <font color="#fff">
			<h3>Selamat Datang di <br> Sistem Perpustakaan</h3>
            <p>Silahkan Login untuk mengakses sistem</p>
            </font>
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div class="form-group">
					{{-- <input type="email" class="form-control" placeholder="Username" required=""> --}}
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{{-- <input type="password" class="form-control" placeholder="Password" required=""> --}}
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
				{{-- <button type="submit" class="btn btn-primary block full-width m-b">Login</button> --}}
				<button type="submit" class="btn btn-primary block full-width m-b">
					{{ __('Login') }}
				</button>
			</form>
			{{-- <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p> --}}
		</div>
	</div>
</div>
@endsection
