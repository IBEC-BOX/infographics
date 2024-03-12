<?php

namespace AdminKit\Infographics\UI\Filament\Resources\InfographicResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use AdminKit\Infographics\UI\Filament\Resources\InfographicResource;

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
