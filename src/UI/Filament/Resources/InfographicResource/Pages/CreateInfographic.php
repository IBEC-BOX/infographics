<?php

namespace AdminKit\Infographics\UI\Filament\Resources\InfographicResource\Pages;

use AdminKit\Infographics\UI\Filament\Resources\InfographicResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInfographic extends CreateRecord
{
    protected static string $resource = InfographicResource::class;

    protected function getActions(): array
    {
        return [
            //
        ];
    }

    protected function getRedirectUrl(): string
    {
        return InfographicResource::getUrl();
    }
}
