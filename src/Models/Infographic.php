<?php

namespace AdminKit\Infographics\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use AdminKit\Core\Abstracts\Models\AbstractModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AdminKit\Infographics\Database\Factories\InfographicFactory;

/**
 * @property-read string $background
 * @property-read Collection $slides
 * @property-read ?string $action_title
 * @property-read ?string $action_link
 * @property-read Collection $translated_slides
 */
class Infographic extends AbstractModel implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $table = 'admin_kit_infographics';

    protected $fillable = [
        'action_title',
        'action_link',
        'slides',
    ];

    protected array $translatable = [
        'action_title',
        'action_link',
        'slides',
    ];

    public function background(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getFirstMediaUrl('background')
        );
    }

    public function translatedSlides(): Attribute
    {
        $locale = app()->getLocale();
        return new Attribute(
            get: fn () => collect($this->getTranslations('slides'))
                ->transform(fn ($slide) => (object)[
                    'title' => $slide['title'][$locale] ?? '',
                    'subtitle' => $slide['subtitle'][$locale] ?? '',
                    'numbers' => collect($slide['numbers'])
                        ->transform(fn ($number) => (object)[
                            'postfix' => $number['postfix'][$locale] ?? '',
                            'subtitle' => $number['subtitle'][$locale] ?? '',
                            'icon' => $number['icon'] ? asset('storage/'.$number['icon']) : null,
                            'number' => $number['number'],
                        ]),
                ])
        );
    }

    protected static function newFactory(): InfographicFactory
    {
        return new InfographicFactory();
    }
}
