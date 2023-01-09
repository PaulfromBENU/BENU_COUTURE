<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryFeeResource\Pages;
use App\Filament\Resources\DeliveryFeeResource\RelationManagers;
use App\Models\DeliveryFee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryFeeResource extends Resource
{
    protected static ?string $model = DeliveryFee::class;

    protected static ?string $label = 'delivery fees';
    protected static ?string $pluralLabel = 'delivery fees';

    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-right';

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
                Forms\Components\TextInput::make('max_weight')
                    ->label('Max weight [kg]')
                    ->required(),
                Forms\Components\TextInput::make('fee_zone_1')
                    ->label('Fee for Zone 1 [eur]')
                    ->required(),
                Forms\Components\TextInput::make('fee_zone_2')
                    ->label('Fee for Zone 2 [eur]')
                    ->required(),
                Forms\Components\TextInput::make('fee_zone_3')
                    ->label('Fee for Zone 3 [eur]')
                    ->required(),
                Forms\Components\TextInput::make('fee_zone_4')
                    ->label('Fee for Zone 4 [eur]')
                    ->required(),
                Forms\Components\TextInput::make('fee_zone_5')
                    ->label('Fee for Zone 5 [eur]')
                    ->required(),
                // Forms\Components\TextInput::make('fee_zone_6'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('max_weight')->label('Max weight [kg]'),
                Tables\Columns\TextColumn::make('fee_zone_1')->label('Fee for Zone 1 [eur]'),
                Tables\Columns\TextColumn::make('fee_zone_2')->label('Fee for Zone 2 [eur]'),
                Tables\Columns\TextColumn::make('fee_zone_3')->label('Fee for Zone 3 [eur]'),
                Tables\Columns\TextColumn::make('fee_zone_4')->label('Fee for Zone 4 [eur]'),
                Tables\Columns\TextColumn::make('fee_zone_5')->label('Fee for Zone 5 [eur]'),
                // Tables\Columns\TextColumn::make('fee_zone_6')->label('Fee for Zone 6'),
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
            'index' => Pages\ListDeliveryFees::route('/'),
            'create' => Pages\CreateDeliveryFee::route('/create'),
            'edit' => Pages\EditDeliveryFee::route('/{record}/edit'),
        ];
    }    
}
