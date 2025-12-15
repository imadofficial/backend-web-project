@extends('layouts.app')

@section('title', 'Register | Particle')

@section('content')
    <div style="max-width: 400px; margin: 60px auto; padding: 40px; background: white; border: 1px solid #e0e0e0; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px;">Create Account</h1>

        @if($errors->any())
            <div style="padding: 12px; background: #fee; border: 1px solid #fcc; border-radius: 8px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li style="color: #c33;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label for="username" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Username</label>
                <input type="text" 
                       id="username" 
                       name="username" 
                       value="{{ old('username') }}"
                       required 
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

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
                <small style="color: #999; font-size: 12px;">Minimum 8 characters</small>
            </div>

            <div style="margin-bottom: 24px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Confirm Password</label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       required 
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 14px; background: #007bff; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Create Account
            </button>

            <p style="text-align: center; margin-top: 20px; color: #666;">
                Already have an account? <a href="/login" style="color: #007bff; text-decoration: none;">Login here</a>
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
