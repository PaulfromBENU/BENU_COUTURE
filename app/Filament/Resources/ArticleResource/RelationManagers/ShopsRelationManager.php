<?php

namespace App\Filament\Resources\ArticleResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ShopsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'shops';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('stock'),
            ])
            ->filters([
                //
            ]);
    }

    public static function attachForm(Form $form): Form
{
    return $form
        ->schema([
            static::getAttachFormRecordSelect(),
            Forms\Components\TextInput::make('stock')->required(),
            // ...
        ]);
}
}
