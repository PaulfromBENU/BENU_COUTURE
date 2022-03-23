<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreationResource\Pages;
use App\Filament\Resources\CreationResource\RelationManagers;
use Filament\Forms\Components\Select;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\Partner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CreationResource extends Resource
{
    protected static ?string $model = Creation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Créations et Variations';

    protected static function shouldRegisterNavigation(): bool
    {
        return (auth()->user()->role == 'admin' || auth()->user()->role == 'editor');
    }

    public function mount(): void
    {
        abort_unless((auth()->user()->role == 'admin' || auth()->user()->role == 'editor'), 403);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('product_type')
                        ->label('Creation Type')
                        ->options([
                            '0' => "Vêtement ou accessoire",
                            '1' => "Masque enfant",
                            '2' => "Masque adulte",
                            '3' => "Petit article (type bracelet)"
                        ])
                        ->searchable(),
                Select::make('creation_category_id')
                        ->label('Category')
                        ->options(CreationCategory::all()->pluck('name_fr', 'id'))
                        ->searchable(),
                Select::make('partner_id')
                        ->label('Partner')
                        ->options(Partner::all()->pluck('name', 'id'))
                        ->searchable(),
                Forms\Components\TextInput::make('price')
                    ->required(),
                Forms\Components\TextInput::make('weight')
                    ->label('Weight [g]')
                    ->required(),
                Forms\Components\Toggle::make('is_accessory')
                    ->label('Is an accessory?')
                    ->required(),
                Forms\Components\Toggle::make('requires_size')
                    ->label('Requires size filter?')
                    ->required(),
                Forms\Components\Textarea::make('description_lu')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_fr')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_en')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_de')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('origin_link_fr')
                    ->maxLength(255),
                Forms\Components\TextInput::make('origin_link_lu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('origin_link_de')
                    ->maxLength(255),
                Forms\Components\TextInput::make('origin_link_en')
                    ->maxLength(255),
                Forms\Components\Toggle::make('rental_enabled')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product_type')->label('Product type'),
                Tables\Columns\TextColumn::make('articles_count')->counts('articles')->label('Number of articles'),
                Tables\Columns\TextColumn::make('creation_category.name_fr')->label('Category'),
                Tables\Columns\BooleanColumn::make('is_accessory'),
                Tables\Columns\TextColumn::make('price')->money('eur'),
                Tables\Columns\TextColumn::make('weight')->label('Weight [g]'),
                Tables\Columns\BooleanColumn::make('requires_size')->label('Requires Size filter?'),
                Tables\Columns\TextColumn::make('description_lu')->limit('50'),
                Tables\Columns\TextColumn::make('description_fr')->limit('50'),
                Tables\Columns\TextColumn::make('description_en')->limit('50'),
                Tables\Columns\TextColumn::make('description_de')->limit('50'),
                Tables\Columns\TextColumn::make('origin_link_fr')->limit('50'),
                Tables\Columns\TextColumn::make('origin_link_lu')->limit('50'),
                Tables\Columns\TextColumn::make('origin_link_de')->limit('50'),
                Tables\Columns\TextColumn::make('origin_link_en')->limit('50'),
                Tables\Columns\BooleanColumn::make('rental_enabled'),
                Tables\Columns\TextColumn::make('partner.name')->label('Partner'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ArticlesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCreations::route('/'),
            'create' => Pages\CreateCreation::route('/create'),
            'edit' => Pages\EditCreation::route('/{record}/edit'),
        ];
    }
}
