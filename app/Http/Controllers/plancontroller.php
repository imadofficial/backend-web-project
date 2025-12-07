<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class plancontroller extends Controller
{
    public function showCountries()
    {
        $countryResponse = Http::get('https://particle-api.raven.co.com/getCountries');
        $countryNames = Http::get('https://country.io/names.json');

        if ($countryResponse->successful() && $countryNames->successful()) {

            $data = $countryResponse->json();
            $countryCodes = $data['Countries']['SingleUse'] ?? [];

            $countryNameList = $countryNames->json();

            $countries = [];
            foreach ($countryCodes as $code) {
                $countries[] = [
                    'code' => $code,
                    'name' => $countryNameList[$code] ?? $code
                ];
            }

            return view('plans.countries', [
                'countries' => $countries
            ]);
        }

        return view('plans.countries', [
            'countries' => [],
            'error' => 'Failed to fetch countries'
        ]);
    }
}
