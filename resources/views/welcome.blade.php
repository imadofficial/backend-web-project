@extends('layouts.app')

@section('title', 'Home | Particle')

@section('styles')
<style>
    .hero-container {
        position: relative;
        width: 100%;
        height: 350px;
        margin-bottom: 20px;
        margin-top: 25px;
    }
    .hero {
        width: 100%;
        height: 100%;
        border-radius: 12px;
        object-fit: cover;
    }
    .hero-text {
        position: absolute;
        left: 40px;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        text-shadow: 0px 0px 12px rgba(0, 0, 0, 1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .hero-text-content h1 {
        margin: 0 0 10px 0;
        font-size: 2em;
        width: 60%;
    }
    .hero-text-content p {
        margin: 0;
        font-size: 1.2em;
    }
    .hero-button {
        display: inline-block;
        padding: 12px 24px;
        background-color: white;
        color: #333;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        text-shadow: none;
    }
    .hero-button:hover {
        background-color: #f0f0f0;
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 1.8em;
    }

    @media screen and (max-width: 800px) {
        .hero-text {
            left: 20px;
            right: 20px;
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        .hero-text-content h1 {
            font-size: 2em;
            width: 100%;
        }
        .hero-text-content p {
            font-size: 1em;
        }
        .hero {
            opacity: 0.8;
        }
    }
</style>
@endsection

@section('content')
    <h1>Home</h1>
    <p>Welcome to Particle :)</p>

    <div class="hero-container">
        <img class="hero" src="{{ $hero->image ?? '/Assets/heroImage.jpg' }}" alt="Person in a black jacket, standing on the road during snowfall"/>
        <div class="hero-text">
            <div class="hero-text-content">
                <h1>{{ $hero->textLine1 ?? 'Stay connected with your family this holiday season' }}</h1>
                <p>{{ $hero->textLine2 ?? 'Plans starting at €3.99' }}</p>
            </div>
            <a href="{{ $hero->buttonLink ?? '/countries' }}" class="hero-button">{{ $hero->buttonText ?? 'Shop plans now' }}</a>
        </div>
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <h2>Have Questions?</h2>
        <p style="color: #666; margin-bottom: 20px;">Check out our frequently asked questions</p>
        <a href="/faq" style="display: inline-block; padding: 12px 24px; background-color: #007bff; color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">
            View FAQ
        </a>
    </div>
@endsection