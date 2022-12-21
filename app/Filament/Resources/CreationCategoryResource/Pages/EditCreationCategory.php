<?php

namespace App\Filament\Resources\CreationCategoryResource\Pages;

use App\Filament\Resources\CreationCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreationCategory extends EditRecord
{
    protected static string $resource = CreationCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
