<?php

namespace App\Filament\Resources\PortfolioCategories\Schemas;

use Filament\Schemas\Schema;

class PortfolioCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
        
            ]);
    }
}
