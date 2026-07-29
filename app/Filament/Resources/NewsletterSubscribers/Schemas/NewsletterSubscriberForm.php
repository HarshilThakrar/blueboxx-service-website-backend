<?php

namespace App\Filament\Resources\NewsletterSubscribers\Schemas;

use Filament\Schemas\Schema;

class NewsletterSubscriberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\Select::make('status')->options(['subscribed' => 'Subscribed', 'unsubscribed' => 'Unsubscribed'])->default('subscribed'),
        
            ]);
    }
}
