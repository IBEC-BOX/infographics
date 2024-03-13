<?php

namespace AdminKit\Infographics\UI\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;

class SlidesColumn extends Column
{
    protected string $view = 'admin-kit-infographics::slides-column';

    public function getState(): mixed
    {
        return $this->record->translated_slides
            ->map(fn ($slide) => $slide->title)
            ->filter()
            ->join(', ');
    }
}
