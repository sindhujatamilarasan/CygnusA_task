<?php

namespace App\Providers;


use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class RestCountriesProvider extends ServiceProvider
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('app.rest_countries_api_url');
    }

    public function getCountryCode($countryName)
    {
        $response = Http::get("{$this->baseUrl}name/{$countryName}");
        
        if ($response->successful()) {
            $countryData = $response->json();
            $countryCode = $countryData[0]['country_code'];
            return $countryCode;
        }
        
        return null;
    }
}
