@extends('layouts.app')

@section('title', 'Available Countries | Particle')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; gap: 20px; flex-wrap: wrap;">
        <h1 style="margin-top: 10;">Available Countries</h1>
        <input type="text" 
               id="countrySearch" 
               placeholder="Search countries..." 
               style="padding: 10px 16px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; min-width: 250px; outline: none; transition: border-color 0.3s ease;"
               onkeyup="filterCountries()">
    </div>
    
    @if(isset($error))
        <div style="padding: 20px; background: #fee; border: 1px solid #fcc; border-radius: 8px; margin-bottom: 20px;">
            <strong>Error:</strong> {{ $error }}
        </div>
    @endif
    
    @if(count($countries) > 0)
        <p>We support {{ count($countries) }} countries:</p>
        
        <a id="country-box" href="">
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; margin-top: 20px;">
                @foreach($countries as $country)
                    <div class="country-card" data-country-name="{{ strtolower($country['name']) }}" data-country-code="{{ strtolower($country['code']) }}" style="padding: 16px; background: white; border: 1px solid #e0e0e0; border-radius: 8px; text-align: center; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.3s ease;">
                        <img src="https://flagcdn.com/w80/{{ strtolower($country['code']) }}.png" 
                            alt="{{ $country['name'] }} flag" 
                            style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <span style="font-weight: 600; font-size: 14px;">{{ $country['name'] }}</span>
                        <span style="font-size: 12px; color: #999;">{{ $country['code'] }}</span>
                    </div>
                @endforeach
            </div>
        </a>
    @else
        <p>No countries available at the moment.</p>
    @endif
    
    <p id="noResults" style="display: none; text-align: center; margin-top: 40px; color: #999; font-size: 16px;">
        No countries found matching your search.
    </p>
@endsection

@section('styles')
<style>
    #c:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    },
    .country-box{
        text-decoration: none;
        color: inherit;
    }
</style>

<script>
function filterCountries() {
    const searchInput = document.getElementById('countrySearch').value.toLowerCase();
    const countryCards = document.querySelectorAll('.country-card');
    const noResults = document.getElementById('noResults');
    let visibleCount = 0;
    
    countryCards.forEach(card => {
        const countryName = card.getAttribute('data-country-name');
        const countryCode = card.getAttribute('data-country-code');
        
        if (countryName.includes(searchInput) || countryCode.includes(searchInput)) {
            card.style.display = 'flex';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
@endsection
