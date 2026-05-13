<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('instagram_url')
                    ->label('Instagram URL')
                    ->url(),
                TextInput::make('facebook_url')
                    ->label('Facebook URL')
                    ->url(),
                TextInput::make('linkedin_url')
                    ->label('LinkedIn URL')
                    ->url(),
                TextInput::make('email_1')
                    ->label('Email de Contacto 1')
                    ->email(),
                TextInput::make('email_2')
                    ->label('Email de Contacto 2')
                    ->email(),
                TextInput::make('public_admin_image')
                    ->label('Imagen Administración Pública (Ruta en public/images o URL)'),
                TextInput::make('health_image')
                    ->label('Imagen Salud (Ruta en public/images o URL)'),
                TextInput::make('education_image')
                    ->label('Imagen Educativo (Ruta en public/images o URL)'),
                TextInput::make('social_services_image')
                    ->label('Imagen Servicios Sociales (Ruta en public/images o URL)'),
                TextInput::make('other_services_image')
                    ->label('Imagen Otros Servicios (Ruta en public/images o URL)'),
            ]);
    }
}
