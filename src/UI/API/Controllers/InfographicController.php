<?php

declare(strict_types=1);

namespace AdminKit\Infographics\UI\API\Controllers;

use AdminKit\Infographics\Models\Infographic;

class InfographicController extends Controller
{
    public function index()
    {
        return Infographic::all();
    }

    public function show(int $id)
    {
        return Infographic::findOrFail($id);
    }
}
