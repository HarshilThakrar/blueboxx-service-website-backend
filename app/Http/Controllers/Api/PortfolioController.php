<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;

class PortfolioController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::orderBy('order')->get();
        $projects = PortfolioProject::with('category')->orderBy('order')->get();

        return response()->json([
            'categories' => $categories,
            'projects' => $projects->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'slug' => $project->slug,
                    'category' => $project->category ? $project->category->name : 'Uncategorized',
                    'industry' => $project->industry,
                    'services' => $project->services ?? [],
                    'tags' => $project->tags ?? [],
                    'description' => $project->description,
                    'challenges' => $project->challenges,
                    'solutions' => $project->solutions,
                    'impact' => $project->impact,
                    'image' => $project->image ? asset('storage/' . $project->image) : null,
                    'imageColor' => $project->image_color ?? 'from-theme-blue to-theme-gold',
                    'client_name' => $project->client_name,
                    'url' => $project->url,
                ];
            })
        ]);
    }
}
