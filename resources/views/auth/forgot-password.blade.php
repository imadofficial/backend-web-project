@extends('layouts.app')

@section('title', 'Forgot Password | Particle')

@section('content')
    <div style="max-width: 400px; margin: 60px auto; padding: 40px; background: white; border: 1px solid #e0e0e0; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px;">Forgot Password</h1>

        <p style="color: #666; margin-bottom: 20px; text-align: center;">
            Enter your email address and we'll send you a link to reset your password.
        </p>

        @if(session('token'))
            <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <strong>Password Reset Token Generated!</strong>
                <p style="margin: 10px 0 5px 0; font-size: 14px;">Use this link to reset your password:</p>
                <a href="{{ route('password.reset', ['token' => session('token')]) }}?email={{ session('email') }}" 
                   style="color: #155724; word-break: break-all; text-decoration: underline;">
                    {{ route('password.reset', ['token' => session('token')]) }}?email={{ session('email') }}
                </a>
            </div>
        @endif

        @if($errors->any())
            <x-alert type="error">
                <strong>{{ $errors->first() }}</strong>
            </x-alert>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Email</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       required 
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 14px; background: #007bff; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Send Reset Link
            </button>

            <p style="text-align: center; margin-top: 20px; color: #666;">
                Remember your password? <a href="/login" style="color: #007bff; text-decoration: none;">Login here</a>
            </p>
        </form>
    </div>
@endsection
