<?php

namespace App\Filament\Resources\ContactLeads\Schemas;

use Filament\Schemas\Schema;

class ContactLeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('company'),
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\TextInput::make('phone'),
                \Filament\Forms\Components\TextInput::make('service'),
                \Filament\Forms\Components\TextInput::make('budget'),
                \Filament\Forms\Components\TextInput::make('timeline'),
                \Filament\Forms\Components\Textarea::make('message')->required(),
                \Filament\Forms\Components\Select::make('status')->options(['New' => 'New', 'Contacted' => 'Contacted', 'Closed' => 'Closed'])->default('New'),
                \Filament\Forms\Components\Textarea::make('admin_notes'),
        
            ]);
    }
}
