@extends('layouts.app')

@section('title', 'Admin Panel - Particle')

@section('content')
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">Admin Dashboard</h1>
            <p style="color: #666; margin: 0;">Welcome, {{ Auth::user()->name }}!</p>
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                Logout
            </button>
        </form>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
            <h3 style="margin-top: 0;">Hero Management</h3>
            <p style="color: #666;">Customize the hero image & text belonging to it.</p>
            <a href="/admin/modifyHero" style="color: #007bff; text-decoration: none;">Edit →</a>
        </div>
        
        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
            <h3 style="margin-top: 0;">Plans Management</h3>
            <p style="color: #666;">Manage subscription plans</p>
            <a href="#" style="color: #007bff; text-decoration: none;">View Plans →</a>
        </div>
        
        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
            <h3 style="margin-top: 0;">FAQ Management</h3>
            <p style="color: #666;">Manage frequently asked questions</p>
            <a href="#" style="color: #007bff; text-decoration: none;">View FAQs →</a>
        </div>
    </div>
</div>
@endsection
