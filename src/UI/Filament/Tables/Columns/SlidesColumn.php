<?php

namespace AdminKit\Infographics\UI\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;
use Illuminate\Support\Str;

class SlidesColumn extends Column
{
    protected string $view = 'admin-kit-infographics::slides-column';

    public function getState(): mixed
    {
        return $this->record->translated_slides
            ->map(fn ($slide) => Str::of($slide->title)->limit(5))
            ->filter()
            ->join(', ');
    }
}
