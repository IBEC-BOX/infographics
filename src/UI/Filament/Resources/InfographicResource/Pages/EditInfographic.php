<?php

namespace AdminKit\Infographics\UI\Filament\Resources\InfographicResource\Pages;

use AdminKit\Infographics\UI\Filament\Resources\InfographicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfographic extends EditRecord
{
    protected static string $resource = InfographicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
