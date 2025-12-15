@extends('layouts.app')

@section('title', 'Data Plans | Particle')

@section('content')
    @if(isset($error))
        <div style="padding: 20px; background: #fee; border: 1px solid #fcc; border-radius: 8px; margin-bottom: 20px;">
            <strong>Error:</strong> {{ $error }}
        </div>
    @endif

    @if(isset($bgImage))
        <div style="width: 85%; height: 275px; border-radius: 12px; overflow: hidden; margin-bottom: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-top: 20px; margin-left: auto; margin-right: auto;">
            <img src="{{ $bgImage }}" alt="{{ $countryCode }} background" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    @endif

    @if(count($plans) > 0)        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px; max-width: 1200px; margin-left: auto; margin-right: auto;">
            @foreach($plans as $plan)
                <div class="plan-card" style="padding: 24px; background: white; border: 2px solid #e0e0e0; border-radius: 12px; transition: all 0.3s ease;">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 16px;">
                        <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #333;">{{ $plan['Name'] }}</h3>
                        @if($plan['Legacy'])
                            <span style="padding: 4px 8px; background: #ffc107; color: #000; font-size: 11px; font-weight: 600; border-radius: 4px;">LEGACY</span>
                        @endif
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
                        @if($plan['AmountMB'] > 0)
                            <div style="font-size: 32px; font-weight: 800; color: #007bff;">
                                {{ number_format($plan['AmountMB'] / 1024, 0) }} GB
                            </div>
                        @else
                            <div style="font-size: 32px; font-weight: 800; color: #007bff;">Unlimited</div>
                        @endif
                        <div style="font-size: 24px; font-weight: 700; color: #333;">€{{ number_format($plan['TotalPrice'], 2) }}</div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <div style="font-size: 14px; color: #666;">
                            {{ $plan['Duration'] }} days
                            @if($plan['AmountMB'] == 0 && $plan['FUP'] > 0)
                                • FUP: {{ number_format($plan['FUP'] / 1024, 0) }} GB
                            @endif
                        </div>
                        <div style="font-size: 12px; color: #999; margin-top: 4px;">
                            Incl. {{ $plan['Tax'] * 100 }}% tax
                        </div>
                    </div>

                    @if(!empty($plan['Networks']))
                        <div style="margin-bottom: 16px;">
                            <div style="font-size: 12px; font-weight: 600; color: #999; margin-bottom: 8px;">SUPPORTED NETWORKS:</div>
                            @foreach(['5G', '4G', '3G', '2G'] as $networkType)
                                @if(!empty($plan['Networks'][$networkType]))
                                    <div style="margin-bottom: 4px;">
                                        <span style="display: inline-block; padding: 2px 6px; background: #007bff; color: white; font-size: 11px; font-weight: 600; border-radius: 3px; margin-right: 6px;">{{ $networkType }}</span>
                                        <span style="font-size: 13px; color: #666;">{{ implode(', ', $plan['Networks'][$networkType]) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <button style="width: 100%; padding: 12px; background: #007bff; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background 0.3s ease;">
                        Select Plan
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 60px 20px;">
            <p style="font-size: 18px; color: #999;">No plans available for this country at the moment.</p>
        </div>
    @endif
@endsection

@section('styles')
<style>
    .plan-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        border-color: #007bff;
    }

    .plan-card button:hover {
        background: #0056b3;
    }
</style>
@endsection
