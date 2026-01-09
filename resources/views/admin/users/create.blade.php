@extends('layouts.app')

@section('title', 'Create User - Admin Panel')

@section('content')
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">Create New User</h1>
            <p style="color: #666; margin: 0;">Manually create a new user account.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="/admin/users" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-decoration: none; font-size: 14px;">
                Back to Users
            </a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                    Logout
                </button>
            </form>
        </div>
    </div>

    @if($errors->any())
        <div style="padding: 12px 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="max-width: 600px; background: white; border: 1px solid #e0e0e0; border-radius: 12px; padding: 40px;">
        <form action="/admin/users" method="POST">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
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
                       minlength="8"
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
                <small style="color: #999; font-size: 12px;">Minimum 8 characters</small>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Confirm Password</label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       required 
                       minlength="8"
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" 
                           id="isAdmin" 
                           name="isAdmin" 
                           value="1"
                           style="margin-right: 8px; width: 18px; height: 18px; cursor: pointer;">
                    <span style="font-weight: 600; color: #333;">Make this user an administrator</span>
                </label>
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 14px; background: #28a745; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Create User
            </button>
        </form>
    </div>
</div>
@endsection
