<?php

namespace AdminKit\Infographics\Models;

use AdminKit\Core\Abstracts\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use AdminKit\Infographics\Database\Factories\InfographicFactory;

class Infographic extends AbstractModel
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'admin_kit_infographics';

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        //
    ];

    protected $translatable = [
        'title',
    ];

    protected static function newFactory(): InfographicFactory
    {
        return new InfographicFactory();
    }
}
