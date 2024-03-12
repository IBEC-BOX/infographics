<?php

namespace AdminKit\Infographics;

use Filament\Contracts\Plugin;
use Filament\Panel;
use AdminKit\Infographics\UI\Filament\Resources\InfographicResource;

class FilamentPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-plugin-admin-kit-infographics';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            InfographicResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
