@extends('layouts.app')

@section('title', 'User Management - Admin Panel')

@section('content')
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">User Management</h1>
            <p style="color: #666; margin: 0;">Manage users and their permissions.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                    Logout
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div style="padding: 12px 20px; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="padding: 12px 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 8px; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        <a href="/admin/users/create" style="padding: 12px 24px; background-color: #28a745; color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">
            + Create New User
        </a>
    </div>

    <div style="background: white; border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 2px solid #e0e0e0;">
                    <th style="padding: 16px; text-align: left; font-weight: 600;">Name</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600;">Email</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr style="border-bottom: 1px solid #e0e0e0;">
                    <td style="padding: 16px;">{{ $user->name }}</td>
                    <td style="padding: 16px;">{{ $user->email }}</td>
                    <td style="padding: 16px;">
                        <div style="display: flex; gap: 10px;">
                            <form action="/admin/users/{{ $user->id }}/toggle-admin" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" 
                                        style="padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 13px;">
                                    @if($user->isAdmin)
                                        Remove Admin
                                    @else
                                        Make Admin
                                    @endif
                                </button>
                            </form>
                            
                            <form action="/admin/users/{{ $user->id }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        style="padding: 6px 12px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 13px;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
