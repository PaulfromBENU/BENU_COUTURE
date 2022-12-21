<?php

namespace App\Filament\Resources\CreationCategoryResource\Pages;

use App\Filament\Resources\CreationCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCreationCategories extends ListRecords
{
    protected static string $resource = CreationCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
