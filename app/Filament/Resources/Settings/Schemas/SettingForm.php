<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Redes Sociales')
                    ->description('Enlaces a las redes sociales oficiales')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url(),
                                TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url(),
                                TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL')
                                    ->url(),
                            ]),
                    ]),
                Section::make('Contacto')
                    ->description('Correos electrónicos de contacto')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('email_1')
                                    ->label('Email de Contacto 1')
                                    ->email(),
                                TextInput::make('email_2')
                                    ->label('Email de Contacto 2')
                                    ->email(),
                            ]),
                    ]),
                Section::make('Imágenes de Sectores')
                    ->description('Imágenes de fondo para las tarjetas de sectores')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('public_admin_image')
                                    ->label('Administración Pública')
                                    ->image()
                                    ->directory('sectors'),
                                FileUpload::make('health_image')
                                    ->label('Salud')
                                    ->image()
                                    ->directory('sectors'),
                                FileUpload::make('education_image')
                                    ->label('Educativo')
                                    ->image()
                                    ->directory('sectors'),
                                FileUpload::make('social_services_image')
                                    ->label('Servicios Sociales')
                                    ->image()
                                    ->directory('sectors'),
                            ]),
                    ]),
            ]);
    }
}
