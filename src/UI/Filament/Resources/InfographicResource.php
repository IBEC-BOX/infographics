<?php

namespace AdminKit\Infographics\UI\Filament\Resources;

use AdminKit\Core\Forms\Components\TranslatableTabs;
use AdminKit\Infographics\Models\Infographic;
use AdminKit\Infographics\UI\Filament\Resources\InfographicResource\Pages;
use AdminKit\Infographics\UI\Filament\Tables\Columns\SlidesColumn;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Resource;
use Filament\Tables;

class InfographicResource extends Resource
{
    protected static ?string $model = Infographic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\SpatieMediaLibraryFileUpload::make('background')
                    ->collection('background')
                    ->directory('infographic')
                    ->label(__('admin-kit-infographics::infographics.resource.background'))
                    ->image()
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Section::make('Кнопка действия')->schema([
                    TranslatableTabs::make(fn ($locale) => Tab::make($locale)->schema([
                        Forms\Components\TextInput::make('action_title.'.$locale)
                            ->label(__('admin-kit-infographics::infographics.resource.title'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('action_link.'.$locale)
                            ->label(__('admin-kit-infographics::infographics.resource.link'))
                            ->url()
                            ->maxLength(255),
                    ])),
                ]),
                Forms\Components\Repeater::make('slides')
                    ->label(__('admin-kit-infographics::infographics.resource.slides'))
                    ->schema([
                        TranslatableTabs::make(fn ($locale) => Tab::make($locale)->schema([
                            Forms\Components\TextInput::make('title.'.$locale)
                                ->label(__('admin-kit-infographics::infographics.resource.title'))
                                ->maxLength(255),
                            Forms\Components\TextInput::make('subtitle.'.$locale)
                                ->label(__('admin-kit-infographics::infographics.resource.subtitle'))
                                ->maxLength(255),
                            Forms\Components\Repeater::make('numbers')
                                ->label(__('admin-kit-infographics::infographics.resource.numbers'))
                                ->schema([
                                    Forms\Components\FileUpload::make('icon')
                                        ->label(__('admin-kit-infographics::infographics.resource.icon'))
                                        ->image()
                                        ->columnSpan(2),
                                    Forms\Components\TextInput::make('number')
                                        ->label(__('admin-kit-infographics::infographics.resource.number'))
                                        ->required()
                                        ->numeric(),
                                    Forms\Components\TextInput::make('postfix.'.$locale)
                                        ->label(__('admin-kit-infographics::infographics.resource.postfix'))
                                        ->placeholder(__('admin-kit-infographics::infographics.resource.postfix_placeholder'))
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('subtitle.'.$locale)
                                        ->label(__('admin-kit-infographics::infographics.resource.subtitle'))
                                        ->columnSpan(2),
                                ])
                                ->columns(2)
                                ->defaultItems(1)
                                ->reorderableWithButtons()
                                ->addActionLabel(__('admin-kit-infographics::infographics.action.add_number')),
                        ])),
                    ])
                    ->columnSpan(2)
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->addActionLabel(__('admin-kit-infographics::infographics.action.add_slide')),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('admin-kit-infographics::infographics.resource.id')),
                SlidesColumn::make('slides')
                    ->label(__('admin-kit-infographics::infographics.resource.slides')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin-kit-infographics::infographics.resource.created_at')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->reorderable('sort')
            ->defaultSort('sort');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInfographic::route('/'),
            'create' => Pages\CreateInfographic::route('/create'),
            'edit' => Pages\EditInfographic::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('admin-kit-infographics::infographics.resource.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('admin-kit-infographics::infographics.resource.plural_label');
    }
}
