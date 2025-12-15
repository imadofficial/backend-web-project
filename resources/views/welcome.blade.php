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
        <img class="hero" src="/Assets/heroImage.jpg" alt="Person in a black jacket, standing on the road during snowfall"/>
        <div class="hero-text">
            <div class="hero-text-content">
                <h1>Stay connected with your family this holiday season</h1>
                <p>Plans starting at €3.99</p>
            </div>
            <a href="/countries" class="hero-button">Shop plans now</a>
        </div>
    </div>

    <h2>FAQ</h2>

    <details>
        <summary>Is the quality of roaming services abroad the same as in my country?</summary>
        <p>When our roamingservices are available, the quality of the service, the quality of service in that country could different from that in your country,
            due to varying local coverage, available speed, available latency, and agreements with local providers.
        </p>
        <p>
            Want to know which technologies are supported in the country you are visiting? Check out our <a href="./Assets/Particle Networks.pdf">coverage document</a> (4.38MB) for more information.
        </p>
    </details>

    <details>
        <summary>Do I lose my number by using Particle?</summary>
        <p>No, your Particle eSIM works alongside your existing SIM card while you're abroad. You're still going to be able to recieve 2FA codes, texts or calls with your own SIM. You just use ours with data you preload. Have a look at our plans. </p>
        </p>
    </details>
@endsection