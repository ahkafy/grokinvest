<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockBangladeshVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $countryCode = $this->getCountryCodeFromIp($ip);
        // List of allowed country codes for North America, South America, and Europe
        $allowedCountries = [
            // North America
            'US','CA','MX','GL','BM','BS','BZ','CR','SV','GT','HN','NI','PA','AI','AG','AW','BB','BQ','VG','KY','CU','CW','DM','DO','GD','GP','HT','JM','MQ','MS','PR','BL','KN','LC','MF','PM','VC','SX','TT','TC','VI',
            // South America
            'AR','BO','BR','CL','CO','EC','FK','GF','GY','PY','PE','SR','UY','VE',
            // Europe
            'AL','AD','AM','AT','AZ','BY','BE','BA','BG','HR','CY','CZ','DK','EE','FO','FI','FR','GE','DE','GI','GR','HU','IS','IE','IT','KZ','XK','LV','LI','LT','LU','MT','MD','MC','ME','NL','MK','NO','PL','PT','RO','RU','SM','RS','SK','SI','ES','SJ','SE','CH','TR','UA','GB','VA'
        ];
        if (!in_array($countryCode, $allowedCountries)) {
            return response()->view('blocked-bd');
        }
        return $next($request);
    }

    private function getCountryCodeFromIp($ip)
    {
        // Use a free API for demonstration (ip-api.com)
        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ip}?fields=countryCode");
            if ($response) {
                $data = json_decode($response, true);
                return $data['countryCode'] ?? null;
            }
        } catch (\Exception $e) {}
        return null;
    }
}
