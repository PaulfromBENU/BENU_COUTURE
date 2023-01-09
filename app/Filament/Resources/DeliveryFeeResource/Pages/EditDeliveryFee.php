<?php

namespace App\Filament\Resources\DeliveryFeeResource\Pages;

use App\Filament\Resources\DeliveryFeeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryFee extends EditRecord
{
    protected static string $resource = DeliveryFeeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
