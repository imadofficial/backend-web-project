<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class plancontroller
{
    private static $continentMap = [
        // Europe
        'AL' => 'Europe', 'AD' => 'Europe', 'AT' => 'Europe', 'BY' => 'Europe', 'BE' => 'Europe',
        'BA' => 'Europe', 'BG' => 'Europe', 'HR' => 'Europe', 'CY' => 'Europe', 'CZ' => 'Europe',
        'DK' => 'Europe', 'EE' => 'Europe', 'FI' => 'Europe', 'FR' => 'Europe', 'DE' => 'Europe',
        'GR' => 'Europe', 'HU' => 'Europe', 'IS' => 'Europe', 'IE' => 'Europe', 'IT' => 'Europe',
        'XK' => 'Europe', 'LV' => 'Europe', 'LI' => 'Europe', 'LT' => 'Europe', 'LU' => 'Europe',
        'MK' => 'Europe', 'MT' => 'Europe', 'MD' => 'Europe', 'MC' => 'Europe', 'ME' => 'Europe',
        'NL' => 'Europe', 'NO' => 'Europe', 'PL' => 'Europe', 'PT' => 'Europe', 'RO' => 'Europe',
        'RU' => 'Europe', 'SM' => 'Europe', 'RS' => 'Europe', 'SK' => 'Europe', 'SI' => 'Europe',
        'ES' => 'Europe', 'SE' => 'Europe', 'CH' => 'Europe', 'UA' => 'Europe', 'GB' => 'Europe',
        'VA' => 'Europe',
        // Asia
        'AF' => 'Asia', 'AM' => 'Asia', 'AZ' => 'Asia', 'BH' => 'Asia', 'BD' => 'Asia',
        'BT' => 'Asia', 'BN' => 'Asia', 'KH' => 'Asia', 'CN' => 'Asia', 'GE' => 'Asia',
        'HK' => 'Asia', 'IN' => 'Asia', 'ID' => 'Asia', 'IR' => 'Asia', 'IQ' => 'Asia',
        'IL' => 'Asia', 'JP' => 'Asia', 'JO' => 'Asia', 'KZ' => 'Asia', 'KW' => 'Asia',
        'KG' => 'Asia', 'LA' => 'Asia', 'LB' => 'Asia', 'MO' => 'Asia', 'MY' => 'Asia',
        'MV' => 'Asia', 'MN' => 'Asia', 'MM' => 'Asia', 'NP' => 'Asia', 'KP' => 'Asia',
        'OM' => 'Asia', 'PK' => 'Asia', 'PS' => 'Asia', 'PH' => 'Asia', 'QA' => 'Asia',
        'SA' => 'Asia', 'SG' => 'Asia', 'KR' => 'Asia', 'LK' => 'Asia', 'SY' => 'Asia',
        'TW' => 'Asia', 'TJ' => 'Asia', 'TH' => 'Asia', 'TL' => 'Asia', 'TR' => 'Asia',
        'TM' => 'Asia', 'AE' => 'Asia', 'UZ' => 'Asia', 'VN' => 'Asia', 'YE' => 'Asia',
        // Africa
        'DZ' => 'Africa', 'AO' => 'Africa', 'BJ' => 'Africa', 'BW' => 'Africa', 'BF' => 'Africa',
        'BI' => 'Africa', 'CM' => 'Africa', 'CV' => 'Africa', 'CF' => 'Africa', 'TD' => 'Africa',
        'KM' => 'Africa', 'CG' => 'Africa', 'CD' => 'Africa', 'CI' => 'Africa', 'DJ' => 'Africa',
        'EG' => 'Africa', 'GQ' => 'Africa', 'ER' => 'Africa', 'ET' => 'Africa', 'GA' => 'Africa',
        'GM' => 'Africa', 'GH' => 'Africa', 'GN' => 'Africa', 'GW' => 'Africa', 'KE' => 'Africa',
        'LS' => 'Africa', 'LR' => 'Africa', 'LY' => 'Africa', 'MG' => 'Africa', 'MW' => 'Africa',
        'ML' => 'Africa', 'MR' => 'Africa', 'MU' => 'Africa', 'YT' => 'Africa', 'MA' => 'Africa',
        'MZ' => 'Africa', 'NA' => 'Africa', 'NE' => 'Africa', 'NG' => 'Africa', 'RE' => 'Africa',
        'RW' => 'Africa', 'ST' => 'Africa', 'SN' => 'Africa', 'SC' => 'Africa', 'SL' => 'Africa',
        'SO' => 'Africa', 'ZA' => 'Africa', 'SS' => 'Africa', 'SD' => 'Africa', 'SZ' => 'Africa',
        'TZ' => 'Africa', 'TG' => 'Africa', 'TN' => 'Africa', 'UG' => 'Africa', 'ZM' => 'Africa',
        'ZW' => 'Africa',
        // North America
        'AI' => 'North America', 'AG' => 'North America', 'AW' => 'North America', 'BS' => 'North America',
        'BB' => 'North America', 'BZ' => 'North America', 'BM' => 'North America', 'BQ' => 'North America',
        'CA' => 'North America', 'KY' => 'North America', 'CR' => 'North America', 'CU' => 'North America',
        'CW' => 'North America', 'DM' => 'North America', 'DO' => 'North America', 'SV' => 'North America',
        'GL' => 'North America', 'GD' => 'North America', 'GP' => 'North America', 'GT' => 'North America',
        'HT' => 'North America', 'HN' => 'North America', 'JM' => 'North America', 'MQ' => 'North America',
        'MX' => 'North America', 'MS' => 'North America', 'NI' => 'North America', 'PA' => 'North America',
        'PR' => 'North America', 'BL' => 'North America', 'KN' => 'North America', 'LC' => 'North America',
        'MF' => 'North America', 'PM' => 'North America', 'VC' => 'North America', 'SX' => 'North America',
        'TT' => 'North America', 'TC' => 'North America', 'US' => 'North America', 'VG' => 'North America',
        'VI' => 'North America',
        // South America
        'AR' => 'South America', 'BO' => 'South America', 'BR' => 'South America', 'CL' => 'South America',
        'CO' => 'South America', 'EC' => 'South America', 'FK' => 'South America', 'GF' => 'South America',
        'GY' => 'South America', 'PY' => 'South America', 'PE' => 'South America', 'SR' => 'South America',
        'UY' => 'South America', 'VE' => 'South America',
        // Oceania
        'AS' => 'Oceania', 'AU' => 'Oceania', 'CK' => 'Oceania', 'FJ' => 'Oceania', 'PF' => 'Oceania',
        'GU' => 'Oceania', 'KI' => 'Oceania', 'MH' => 'Oceania', 'FM' => 'Oceania', 'NR' => 'Oceania',
        'NC' => 'Oceania', 'NZ' => 'Oceania', 'NU' => 'Oceania', 'NF' => 'Oceania', 'MP' => 'Oceania',
        'PW' => 'Oceania', 'PG' => 'Oceania', 'PN' => 'Oceania', 'WS' => 'Oceania', 'SB' => 'Oceania',
        'TK' => 'Oceania', 'TO' => 'Oceania', 'TV' => 'Oceania', 'VU' => 'Oceania', 'WF' => 'Oceania',
    ];

    public function showCountries() //Source: https://laravel.com/docs/12.x/http-client
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
                    'name' => $countryNameList[$code] ?? $code,
                    'continent' => $this->getContinent($code)
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

    private function getContinent($countryCode)
    {
        return self::$continentMap[strtoupper($countryCode)] ?? 'Unknown';
    }


    public function displayPlans()
    {
        return view('plans.index');
    }

    public function getPlans(Request $request)
    {
        $countryCode = $request->input('countryCode', 'BE');
        $residentCountry = $request->input('residentCountry', 'BE');
        $mode = $request->input('mode', 2);

        $response = Http::get('https://particle-api.raven.co.com/getPlans', [
            'countryCode' => $countryCode,
            'residentCountry' => $residentCountry,
            'mode' => $mode
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            return view('plans.list', [
                'plans' => $data['Plans'] ?? [],
                'bgImage' => $data['BGImage'] ?? null,
                'offset' => $data['Offset'] ?? 0,
                'countryCode' => $countryCode
            ]);
        }

        return view('plans.list', [
            'plans' => [],
            'error' => 'Failed to fetch plans',
            'countryCode' => $countryCode
        ]);
    }
}
