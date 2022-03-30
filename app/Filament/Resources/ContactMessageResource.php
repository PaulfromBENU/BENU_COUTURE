<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ContactMessageResource extends Resource
{
    protected static ?string $label = 'all user messages';
    protected static ?string $pluralLabel = 'all user messages';

    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-alt-2';

    protected static ?string $navigationGroup = 'Utilisateurs';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('gender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('is_read')
                    ->required(),
                Forms\Components\Toggle::make('is_answered')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        self::$pluralLabel = "User messages (".ContactMessage::where('is_read', '0')->count().")";
        return $table
            ->columns([
                Tables\Columns\BooleanColumn::make('is_read'),
                Tables\Columns\BooleanColumn::make('is_answered'),
                Tables\Columns\TextColumn::make('message'),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            // 'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
