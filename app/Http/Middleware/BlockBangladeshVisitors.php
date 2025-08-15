<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockBangladeshVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $continent = $this->getContinentFromIp($ip);
        // Allow only North America (NA), South America (SA), Europe (EU)
        $allowedContinents = ['NA', 'SA', 'EU'];
        if (!in_array($continent, $allowedContinents)) {
            return response()->view('blocked-bd');
        }
        return $next($request);
    }

    private function getContinentFromIp($ip)
    {
        // Use a free API for demonstration (ip-api.com)
        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ip}");
            if ($response) {
                $data = json_decode($response, true);
                return $data['continentCode'] ?? null;
            }
        } catch (\Exception $e) {}
        return null;
    }
}
