<?php

declare(strict_types=1);

namespace AdminKit\Infographics\UI\API\Controllers;

use AdminKit\Infographics\Models\Infographic;
use AdminKit\Infographics\UI\API\DTO\InfographicDTO;

class InfographicController extends Controller
{
    public function showFirst(): InfographicDTO
    {
        $infographic = Infographic::query()
            ->firstOrFail();

        return InfographicDTO::from($infographic);
    }
}
