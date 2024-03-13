<?php

namespace AdminKit\Infographics\UI\API\DTO;

use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;
use AdminKit\Infographics\Models\Infographic;

class InfographicDTO extends Data
{
    public function __construct(
        public string     $background,
        public array      $action,
        public Collection $slides,
    )
    {
    }

    public static function fromModel(Infographic $infographic): InfographicDTO
    {
        return new self(
            background: $infographic->background,
            action: [
                'title' => $infographic->action_title,
                'link' => $infographic->action_link,
            ],
            slides: $infographic->translated_slides,
        );
    }
}
