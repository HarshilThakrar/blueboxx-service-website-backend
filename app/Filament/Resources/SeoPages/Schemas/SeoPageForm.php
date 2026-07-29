<?php

namespace App\Filament\Resources\SeoPages\Schemas;

use Filament\Schemas\Schema;

class SeoPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('page_name')->required(),
                \Filament\Forms\Components\TextInput::make('title'),
                \Filament\Forms\Components\Textarea::make('description'),
                \Filament\Forms\Components\TextInput::make('keywords'),
                \Filament\Forms\Components\TextInput::make('og_image'),
        
            ]);
    }
}
