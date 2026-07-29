<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\Textarea::make('description'),
                \Filament\Forms\Components\Select::make('icon')
                    ->options([
                        'Code2' => 'Code (Development)',
                        'Bot' => 'Bot (AI)',
                        'Database' => 'Database (CRM)',
                        'Server' => 'Server (ERP)',
                        'MonitorPlay' => 'Monitor (Web)',
                        'Smartphone' => 'Smartphone (Mobile)',
                        'LayoutDashboard' => 'Dashboard (Game/App)',
                        'Cloud' => 'Cloud (Outsourcing)',
                        'Users' => 'Users (Team)',
                        'Megaphone' => 'Megaphone (Marketing)',
                        'Target' => 'Target (Performance)',
                        'Briefcase' => 'Briefcase (Consulting)',
                        'Settings' => 'Settings',
                        'Shield' => 'Shield',
                        'Zap' => 'Lightning/Zap',
                    ])
                    ->searchable()
                    ->placeholder('Select an icon...'),
                \Filament\Forms\Components\Toggle::make('is_active')->default(true),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
            ]);
    }
}
