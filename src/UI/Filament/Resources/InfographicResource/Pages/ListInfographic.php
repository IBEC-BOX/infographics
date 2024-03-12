<?php

namespace AdminKit\Infographics\UI\Filament\Resources\InfographicResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use AdminKit\Infographics\UI\Filament\Resources\InfographicResource;

class ListInfographic extends ListRecords
{
    protected static string $resource = InfographicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
