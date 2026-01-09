@extends('layouts.app')

@section('title', 'User Dashboard - Particle')


@section('content')
    <main style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1 style="margin: 0;">User Dashboard</h1>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                    Logout
                </button>
            </form>
        </div>
        
        <p>Welcome to your personal dashboard, {{ Auth::user()->name }}!</p>
        
        <div style="margin-top: 30px;">
            <h2>Your Account</h2>
            <p>Email: {{ Auth::user()->email }}</p>
        </div>
    </main>
@endsection