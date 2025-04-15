<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KampusAPIService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.kampus_api.base_url');
        $this->token = config('services.kampus_api.token');
    }

    public function getDosenByNIDN($nidn)
    {
        $response = Http::withToken($this->token)
            ->get("{$this->baseUrl}/dosen/$nidn");

        return $response->successful() ? $response->json() : null;
    }
}
