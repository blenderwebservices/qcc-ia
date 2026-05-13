<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instagram_url')
                    ->label('Instagram')
                    ->limit(30),
                TextColumn::make('email_1')
                    ->label('Email principal'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
