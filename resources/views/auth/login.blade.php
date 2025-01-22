@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: #121212; /* Fondo negro minimalista */
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            background-color: #1c1c1c;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        /* Header */
        .card-header {
            background: linear-gradient(135deg, #8e44ad, #5a2d82);
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
        }

        .card-header h4 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
        }

        /* Botón púrpura */
        .btn-purple {
            background: linear-gradient(90deg, #8e44ad, #5a2d82);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-purple:hover {
            background: linear-gradient(90deg, #5a2d82, #8e44ad);
            transform: translateY(-2px);
        }

        .btn-purple:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(142, 68, 173, 0.5);
        }

        /* Inputs */
        input.form-control {
            background: #333;
            border: none;
            color: #fff;
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 1rem;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        input.form-control:focus {
            border-color: #8e44ad;
            box-shadow: 0 0 8px rgba(142, 68, 173, 0.5);
            transform: scale(1.02);
        }

        /* Checkbox */
        .form-check-input:checked {
            background-color: #8e44ad;
            border-color: #8e44ad;
        }

        /* Links */
        a {
            color: #bbb;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        a:hover {
            color: #8e44ad;
        }
    </style>
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card w-50">
        <div class="card-header">
            <h4>{{ __('Login') }}</h4>
        </div>
        <div class="card-body px-5 py-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-4">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4 d-flex align-items-center">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="accent-color: #8e44ad;">
                    <label class="form-check-label mb-0 text-white" for="remember">{{ __('Remember Me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-purple">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
