<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Filament\Resources\VoucherResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Voucher;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-tax';

    protected static ?string $navigationGroup = 'Seller & Sales';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        $new_code = substr(str_shuffle(Str::random(30)."0123456789"), 0, 8);

        while (Voucher::where('code', $new_code)->count() > 0) {
            $new_code = substr(str_shuffle(Str::random(30)."0123456789"), 0, 8);
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('initial_value')
                    ->required(),
                Forms\Components\TextInput::make('remaining_value')
                    ->required(),
                Select::make('user_id')
                    ->label('User email')
                    ->options(User::all()->pluck('email', 'id')),
                Forms\Components\DateTimePicker::make('expires_on'),
                Forms\Components\TextInput::make('code')
                    ->default($new_code)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('expires_on')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('initial_value'),
                Tables\Columns\TextColumn::make('remaining_value'),
                Tables\Columns\TextColumn::make('user.email')->label('E-mail utilisateur'),
                Tables\Columns\TextColumn::make('user.last_name')->label('Nom utilisateur'),
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
            'index' => Pages\ListVouchers::route('/'),
            'create' => Pages\CreateVoucher::route('/create'),
            'edit' => Pages\EditVoucher::route('/{record}/edit'),
        ];
    }
}
