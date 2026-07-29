<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('category')->default('General'),
                \Filament\Forms\Components\TextInput::make('question')->required(),
                \Filament\Forms\Components\Textarea::make('answer')->required(),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
        
            ]);
    }
}
