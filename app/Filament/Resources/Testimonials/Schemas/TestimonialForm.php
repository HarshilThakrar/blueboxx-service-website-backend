<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('client_name')->required(),
                \Filament\Forms\Components\TextInput::make('company'),
                \Filament\Forms\Components\TextInput::make('position'),
                \Filament\Forms\Components\Textarea::make('review')->required(),
                \Filament\Forms\Components\TextInput::make('rating')->numeric()->default(5)->maxValue(5),
                \Filament\Forms\Components\TextInput::make('image'),
                \Filament\Forms\Components\Toggle::make('is_visible')->default(true),
        
            ]);
    }
}
