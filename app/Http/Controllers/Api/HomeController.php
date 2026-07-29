<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        $settings = WebsiteSetting::pluck('value', 'key');
        
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();
            
        $testimonials = Testimonial::where('is_visible', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
            
        return response()->json([
            'settings' => $settings,
            'services' => $services,
            'testimonials' => $testimonials,
        ]);
    }
}
