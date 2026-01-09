@extends('layouts.app')

@section('title', 'Edit FAQ - Admin Panel')

@section('content')
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">Edit FAQ</h1>
            <p style="color: #666; margin: 0;">Update the question and answer.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="/admin/faq" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-decoration: none; font-size: 14px;">
                Back to FAQs
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

    <div style="max-width: 800px; background: white; border: 1px solid #e0e0e0; border-radius: 12px; padding: 40px;">
        <form action="/admin/faq/{{ $faq->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 20px;">
                <label for="question" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Question</label>
                <input type="text" 
                       id="question" 
                       name="question" 
                       value="{{ old('question', $faq->question) }}"
                       required 
                       maxlength="500"
                       placeholder="Enter the question"
                       style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="answer" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Answer</label>
                <textarea id="answer" 
                          name="answer" 
                          required 
                          rows="6"
                          placeholder="Enter the answer"
                          style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box; resize: vertical;">{{ old('answer', $faq->answer) }}</textarea>
            </div>

            <div style="margin-bottom: 24px;">
                <label for="order" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Order (Optional)</label>
                <input type="number" 
                       id="order" 
                       name="order" 
                       value="{{ old('order', $faq->order) }}"
                       min="0"
                       placeholder="0"
                       style="width: 150px; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
                <small style="color: #999; font-size: 12px; display: block; margin-top: 4px;">Lower numbers appear first</small>
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 14px; background: #007bff; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Update FAQ
            </button>
        </form>
    </div>
</div>
@endsection
