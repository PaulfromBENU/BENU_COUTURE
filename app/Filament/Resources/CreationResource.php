<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreationResource\Pages;
use App\Filament\Resources\CreationResource\RelationManagers;
use App\Models\Creation;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('product_type')
                    ->required(),
                Forms\Components\TextInput::make('creation_category_id'),
                Forms\Components\Toggle::make('is_accessory')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required(),
                Forms\Components\TextInput::make('weight')
                    ->required(),
                Forms\Components\TextInput::make('requires_size')
                    ->required(),
                Forms\Components\Textarea::make('description_lu')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_fr')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_en')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('description_de')
                    ->required()
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
                Forms\Components\TextInput::make('partner_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('product_type'),
                Tables\Columns\TextColumn::make('creation_category_id'),
                Tables\Columns\BooleanColumn::make('is_accessory'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\TextColumn::make('requires_size'),
                Tables\Columns\TextColumn::make('description_lu'),
                Tables\Columns\TextColumn::make('description_fr'),
                Tables\Columns\TextColumn::make('description_en'),
                Tables\Columns\TextColumn::make('description_de'),
                Tables\Columns\TextColumn::make('origin_link_fr'),
                Tables\Columns\TextColumn::make('origin_link_lu'),
                Tables\Columns\TextColumn::make('origin_link_de'),
                Tables\Columns\TextColumn::make('origin_link_en'),
                Tables\Columns\BooleanColumn::make('rental_enabled'),
                Tables\Columns\TextColumn::make('partner_id'),
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
