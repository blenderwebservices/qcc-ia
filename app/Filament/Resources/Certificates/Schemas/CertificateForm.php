<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('organization')
                    ->required(),
                TextInput::make('roc')
                    ->required(),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'Vigente' => 'Vigente',
                        'Cancelado' => 'Cancelado',
                        'Suspendido' => 'Suspendido',
                    ])
                    ->required(),
                TextInput::make('reference_standard')
                    ->required(),
                TextInput::make('sectors')
                    ->required(),
                TextInput::make('contact_email')
                    ->email()
                    ->required(),
                TextInput::make('access_password')
                    ->password()
                    ->revealable()
                    ->required(),
            ]);
    }
}
