<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Filament\Resources\VoucherResource\RelationManagers;
use App\Models\Voucher;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;

use App\Models\User;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-tax';

    protected static ?string $navigationGroup = 'Seller & Sales';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        $increment = rand(0, 9).rand(0, 9);
        $value_code = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
        $new_code = strtoupper("BC".date('mY').$increment.$value_code.Str::random(2).rand(10, 99));
        while (Voucher::where('unique_code', $new_code)->count() > 0) {
            $increment = rand(0, 9).rand(0, 9);
            $value_code = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
            $new_code = strtoupper("BC".date('mY').$increment.$value_code.Str::random(2).rand(10, 99));
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('initial_value')
                    ->required(),
                Forms\Components\TextInput::make('remaining_value')
                    ->required(),
                Select::make('user_id')
                    ->label('User e-mail (optionnal)')
                    ->options(User::all()->pluck('email', 'id'))
                    ->searchable(),
                Forms\Components\DateTimePicker::make('expires_on')->hidden(),
                Forms\Components\TextInput::make('unique_code')
                    ->required()
                    ->maxLength(16)
                    ->default($new_code),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unique_code'),
                Tables\Columns\TextColumn::make('initial_value')->money('eur'),
                Tables\Columns\TextColumn::make('remaining_value')->money('eur'),
                Tables\Columns\TextColumn::make('user.email')->label('User email'),
                Tables\Columns\TextColumn::make('user.last_name')->label('User name'),
                Tables\Columns\TextColumn::make('expires_on')
                    ->dateTime(),
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
