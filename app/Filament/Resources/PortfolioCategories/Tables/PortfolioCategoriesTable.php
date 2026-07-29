<?php

namespace App\Filament\Resources\PortfolioCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PortfolioCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('slug'),
                \Filament\Tables\Columns\TextColumn::make('order')->sortable(),
        
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
