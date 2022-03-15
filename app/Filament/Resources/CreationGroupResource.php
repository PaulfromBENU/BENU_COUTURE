<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreationGroupResource\Pages;
use App\Filament\Resources\CreationGroupResource\RelationManagers;
use App\Models\CreationGroup;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CreationGroupResource extends Resource
{
    protected static ?string $label = 'type pour les créations';
    protected static ?string $pluralLabel = 'types pour les créations';

    protected static ?string $model = CreationGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Données générales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_fr')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_lu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_de')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('translation_key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('filter_key')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_fr'),
                Tables\Columns\TextColumn::make('name_lu'),
                Tables\Columns\TextColumn::make('name_de'),
                Tables\Columns\TextColumn::make('name_en'),
                Tables\Columns\TextColumn::make('translation_key'),
                Tables\Columns\TextColumn::make('filter_key'),
            ])
            ->filters([
                //
            ]);
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
            'index' => Pages\ListCreationGroups::route('/'),
            'create' => Pages\CreateCreationGroup::route('/create'),
            'edit' => Pages\EditCreationGroup::route('/{record}/edit'),
        ];
    }
}
