@extends('layouts.app')

@section('title', 'FAQ | Particle')

@section('styles')
<style>
    h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 1.8em;
    }

    details {
        margin-bottom: 12px;
    }

    summary {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 16px;
        font-weight: 600;
        font-size: 1.1em;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    summary:hover {
        border-color: #999;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    summary::-webkit-details-marker {
        display: none;
    }

    summary::after {
        content: '+';
        font-size: 1.5em;
        font-weight: 300;
        color: #666;
        transition: transform 0.3s ease;
    }

    details[open] summary::after {
        content: '−';
    }

    details p {
        margin-top: 12px;
        padding-left: 16px;
        line-height: 1.6;
        color: #555;
    }

    details a {
        color: #0066cc;
        text-decoration: none;
    }

    details a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
    <h1>Frequently Asked Questions</h1>
    <p>Find answers to common questions about Particle services.</p>

    @if($faqs->isEmpty())
        <div style="padding: 40px; text-align: center; color: #999; background: #f8f9fa; border-radius: 8px; margin-top: 20px;">
            <p style="font-size: 1.2em;">No FAQs available yet.</p>
        </div>
    @else
        @foreach($faqs as $faq)
            <details>
                <summary>{{ $faq->question }}</summary>
                <p>{{ $faq->answer }}</p>
            </details>
        @endforeach
    @endif
@endsection
