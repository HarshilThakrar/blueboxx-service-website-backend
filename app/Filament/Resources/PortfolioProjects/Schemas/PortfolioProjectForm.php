<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Schemas\Schema;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\Select::make('portfolio_category_id')->relationship('category', 'name')->required(),
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\TextInput::make('client_name'),
                \Filament\Forms\Components\TextInput::make('url')->url(),
                \Filament\Forms\Components\Select::make('status')->options(['completed' => 'Completed', 'in_progress' => 'In Progress'])->default('completed'),
                \Filament\Forms\Components\FileUpload::make('image')->image()->directory('portfolio'),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),

                // Premium Portfolio Fields
                \Filament\Forms\Components\TextInput::make('industry'),
                \Filament\Forms\Components\TagsInput::make('services'),
                \Filament\Forms\Components\TagsInput::make('tags')->label('Tech Stack'),
                \Filament\Forms\Components\Textarea::make('description')->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('challenges')->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('solutions')->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('impact')->columnSpanFull(),
                \Filament\Forms\Components\TextInput::make('image_color')->default('from-theme-blue to-theme-gold')->label('Image Gradient Color'),
        
            ]);
    }
}
