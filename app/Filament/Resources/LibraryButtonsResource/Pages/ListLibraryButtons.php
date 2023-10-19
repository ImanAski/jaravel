<?php

namespace App\Filament\Resources\LibraryButtonsResource\Pages;

use App\Filament\Resources\LibraryButtonsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLibraryButtons extends ListRecords
{
    protected static string $resource = LibraryButtonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
