@extends('layouts.app')

@section('title', 'Admin Panel - Particle')

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

    .container {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 20px;
    }
    .container div {
        background-color: #f1f1f1;
        border: 1px solid black;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        border-radius: 10px;
    }
    .container div p {
        margin: 0 0 10px 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }
    .container div input {
        width: 100%;
        font-size: 16px;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
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
<div style="padding: 40px 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 32px; margin-bottom: 10px; margin-top: 0;">Today view</h1>
            <p style="color: #666; margin: 0;">Modify the home screen's today view.</p>
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                Logout
            </button>
        </form>
    </div>

    @if(session('success'))
        <div style="padding: 12px 20px; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="hero-container">
        <img id="heroImage" class="hero" src="{{ $hero->image ?? '/Assets/heroImage.jpg' }}" alt="Person in a black jacket, standing on the road during snowfall"/>
        <div class="hero-text">
            <div class="hero-text-content">
                <h1 id="Title1">{{ $hero->textLine1 ?? 'Stay connected with your family this holiday season' }}</h1>
                <p id="Title2">{{ $hero->textLine2 ?? 'Plans starting at €3.99' }}</p>
            </div>
            <a href="{{ $hero->buttonLink ?? '#' }}" class="hero-button" id="Title3">{{ $hero->buttonText ?? 'Shop plans now' }}</a>
        </div>
    </div>

    <form action="/admin/hero" method="POST">
        @csrf
        <div class="container">
            <div>
                <p>Title</p>
                <input type="text" name="textLine1" class="hero-input" placeholder="Title1" value="{{ $hero->textLine1 ?? '' }}" oninput="handleInputChange(this)" required/>
            </div>
            <div>
                <p>Description</p>
                <input type="text" name="textLine2" class="hero-input" placeholder="Title2" value="{{ $hero->textLine2 ?? '' }}" oninput="handleInputChange(this)" required/>
            </div>
            <div>
                <p>Image route</p>
                <input type="text" name="image" class="hero-input" placeholder="URL" value="{{ $hero->image ?? '' }}" oninput="handleInputChange(this)" required/>
            </div>

            <div>
                <p>Button text</p>
                <input type="text" name="buttonText" class="hero-input" placeholder="Title3" value="{{ $hero->buttonText ?? '' }}" oninput="handleInputChange(this)" required/>
            </div>

            <div>
                <p>Button route</p>
                <input type="text" name="buttonLink" class="hero-input" placeholder="URL" value="{{ $hero->buttonLink ?? '' }}" oninput="handleInputChange(this)" required/>
            </div>

            <div style="display: flex; align-items: flex-end;">
                <button type="submit" style="width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease;">
                    Create
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function handleInputChange(input) {
    const placeholder = input.getAttribute('placeholder');
    if (placeholder === 'URL') {
        const elem = document.getElementById('heroImage');
        if (elem && input.name === 'image') {
            elem.src = input.value;
        }
    } else {
        const elem = document.getElementById(placeholder);
        if (elem) {
            elem.textContent = input.value;
        }
    }
}
</script>

@endsection
