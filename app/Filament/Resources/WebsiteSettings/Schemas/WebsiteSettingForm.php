<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use Filament\Schemas\Schema;

class WebsiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('key')->required(),
                \Filament\Forms\Components\Textarea::make('value'),
                \Filament\Forms\Components\TextInput::make('type')->default('text'),
                \Filament\Forms\Components\TextInput::make('group')->default('general'),
        
            ]);
    }
}
