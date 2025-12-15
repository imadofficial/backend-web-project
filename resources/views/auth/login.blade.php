@extends('layouts.app')

@section('title', 'Login | Particle')

@section('content')
    <div style="max-width: 400px; margin: 60px auto; padding: 40px; background: white; border: 1px solid #e0e0e0; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px;">Login</h1>

        @if($errors->any())
            <div style="padding: 12px; background: #fee; border: 1px solid #fcc; border-radius: 8px; margin-bottom: 20px;">
                <strong style="color: #c33;">{{ $errors->first() }}</strong>
            </div>
        @endif

        <form method="POST" action="/login">
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

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Password</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required 
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 24px; display: flex; align-items: center;">
                <input type="checkbox" id="remember" name="remember" style="margin-right: 8px;">
                <label for="remember" style="margin: 0; color: #666; font-size: 14px;">Remember me</label>
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 14px; background: #007bff; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Login
            </button>

            <p style="text-align: center; margin-top: 20px; color: #666;">
                Don't have an account? <a href="/register" style="color: #007bff; text-decoration: none;">Register here</a>
            </p>
        </form>
    </div>
@endsection

@section('styles')
<style>
    button[type="submit"]:hover {
        background: #0056b3;
    }
    input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
</style>
@endsection
