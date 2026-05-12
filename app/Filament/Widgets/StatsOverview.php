<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Certificate;
use App\Models\AiProvider;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Certificates\CertificateResource;
use App\Filament\Resources\AiProviders\AiProviderResource;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Número de Usuarios', User::count())
                ->description('Total de usuarios registrados')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->url(UserResource::getUrl('index')),
            Stat::make('Número de Certificados', Certificate::count())
                ->description('Certificados emitidos')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary')
                ->url(CertificateResource::getUrl('index')),
            Stat::make('Número de Agentes de IA', AiProvider::count())
                ->description('Proveedores y agentes configurados')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color('warning')
                ->url(AiProviderResource::getUrl('index')),
        ];
    }
}
