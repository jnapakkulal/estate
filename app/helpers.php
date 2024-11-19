<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

if (!function_exists('getWeather')) {
    /**
     * Fetch weather information for the authenticated user.
     *
     * @return array
     */
    function getWeather()
    {
        // Get the authenticated user
        $user = auth()->user();

        if (!$user || empty($user->city)) {
            return [
                'temperature' => 'N/A',
                'description' => 'City not found for the user',
                'icon' => null,
            ];
        }

        $city = $user->city;
        $apiKey = '3c53eef123e7c5f775e8cc644ab7c6d0';
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        try {
            $response = Http::get($apiUrl);

            if ($response->ok()) {
                $data = $response->json();

                return [
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'icon' => $data['weather'][0]['icon'],
                ];
            } else {
                return [
                    'temperature' => 'N/A',
                    'description' => 'Unable to fetch weather',
                    'icon' => null,
                ];
            }
        } catch (\Exception $e) {
            return [
                'temperature' => 'N/A',
                'description' => 'Unable to fetch weather',
                'icon' => null,
            ];
        }
    }
}
