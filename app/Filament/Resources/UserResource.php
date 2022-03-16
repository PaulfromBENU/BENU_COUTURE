<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $label = 'liste des utilisateurs';
    protected static ?string $pluralLabel = 'liste des utilisateurs';

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Utilisateurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('badge')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('client_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('general_comment')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('newsletter')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('client_number')->searchable(),
                Tables\Columns\TextColumn::make('last_login')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\BooleanColumn::make('is_over_18'),
                Tables\Columns\BooleanColumn::make('legal_ok'),
                Tables\Columns\BooleanColumn::make('newsletter'),
                Tables\Columns\TextColumn::make('origin'),
                Tables\Columns\TextColumn::make('badge'),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('general_comment'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
