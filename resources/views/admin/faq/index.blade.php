@extends('layouts.app')

@section('title', 'FAQ Management - Admin Panel')

@section('content')
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">FAQ Management</h1>
            <p style="color: #666; margin: 0;">Manage frequently asked questions and categories.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="/admin/faq/create" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-decoration: none; font-size: 14px;">
                Add New
            </a>
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

    <div style="background: white; border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 2px solid #e0e0e0;">
                    <th style="padding: 16px; text-align: left; font-weight: 600; width: 45%;">Question</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; width: 40%;">Answer</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; width: 5%;">Order</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr style="border-bottom: 1px solid #e0e0e0;">
                    <td style="padding: 16px;">{{ Str::limit($faq->question, 80) }}</td>
                    <td style="padding: 16px; color: #666;">{{ Str::limit($faq->answer, 100) }}</td>
                    <td style="padding: 16px;">{{ $faq->order }}</td>
                    <td style="padding: 16px;">
                        <div style="display: flex; gap: 8px;">
                            <a href="/admin/faq/{{ $faq->id }}/edit" 
                               style="padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-size: 13px;">
                                Edit
                            </a>
                            <form action="/admin/faq/{{ $faq->id }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
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
                @empty
                <tr>
                    <td colspan="4" style="padding: 40px; text-align: center; color: #999;">
                        No FAQs yet. Click "Add New FAQ" to create one.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
