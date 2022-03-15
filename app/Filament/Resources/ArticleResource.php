<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Créations et Variations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('creation_id'),
                Forms\Components\TextInput::make('size_id'),
                Forms\Components\TextInput::make('color_id'),
                Forms\Components\TextInput::make('secondary_color')
                    ->maxLength(255),
                Forms\Components\TextInput::make('third_color')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mask_stripes')
                    ->maxLength(255),
                Forms\Components\Toggle::make('mask_filter')
                    ->required(),
                Forms\Components\TextInput::make('voucher_value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('voucher_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('singularity_lu')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('singularity_fr')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('singularity_en')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('singularity_de')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('translation_key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('creation_date')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_returned')
                    ->required(),
                Forms\Components\DatePicker::make('return_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('creation_id'),
                Tables\Columns\TextColumn::make('size_id'),
                Tables\Columns\TextColumn::make('color_id'),
                Tables\Columns\TextColumn::make('secondary_color'),
                Tables\Columns\TextColumn::make('third_color'),
                Tables\Columns\TextColumn::make('mask_stripes'),
                Tables\Columns\BooleanColumn::make('mask_filter'),
                Tables\Columns\TextColumn::make('voucher_value'),
                Tables\Columns\TextColumn::make('voucher_type'),
                Tables\Columns\TextColumn::make('singularity_lu'),
                Tables\Columns\TextColumn::make('singularity_fr'),
                Tables\Columns\TextColumn::make('singularity_en'),
                Tables\Columns\TextColumn::make('singularity_de'),
                Tables\Columns\TextColumn::make('translation_key'),
                Tables\Columns\TextColumn::make('creation_date'),
                Tables\Columns\BooleanColumn::make('is_returned'),
                Tables\Columns\TextColumn::make('return_date')
                    ->date(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ShopsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
