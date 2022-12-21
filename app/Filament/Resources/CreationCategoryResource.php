<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreationCategoryResource\Pages;
use App\Filament\Resources\CreationCategoryResource\RelationManagers;
use App\Models\CreationCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CreationCategoryResource extends Resource
{
    protected static ?string $label = 'variation category';
    protected static ?string $pluralLabel = 'variation categories';

    protected static ?string $model = CreationCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Site Data';

    protected static function shouldRegisterNavigation(): bool
    {
        $authorized_roles = [
            'admin',
        ];
        return in_array(auth()->user()->role, $authorized_roles);
    }

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
                    ->default('category.')
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('name_fr'),
                Tables\Columns\TextColumn::make('name_lu'),
                Tables\Columns\TextColumn::make('name_de'),
                Tables\Columns\TextColumn::make('name_en'),
                // Tables\Columns\TextColumn::make('translation_key'),
                Tables\Columns\TextColumn::make('filter_key'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCreationCategories::route('/'),
            'create' => Pages\CreateCreationCategory::route('/create'),
            'edit' => Pages\EditCreationCategory::route('/{record}/edit'),
        ];
    }    
}
