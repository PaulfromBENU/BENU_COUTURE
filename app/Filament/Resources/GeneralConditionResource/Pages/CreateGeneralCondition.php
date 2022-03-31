<?php

namespace App\Filament\Resources\GeneralConditionResource\Pages;

use App\Filament\Resources\GeneralConditionResource;
use Filament\Resources\Pages\CreateRecord;

use App\Models\User;

class CreateGeneralCondition extends CreateRecord
{
    protected static string $resource = GeneralConditionResource::class;

    protected function afterValidate(): void
    {
        User::where('last_conditions_agreed', '1')->update([
            'last_conditions_agreed' => '0',
        ]);
    }
}
