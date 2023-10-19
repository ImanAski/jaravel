<?php

namespace App\Filament\Resources\LibraryButtonsResource\Pages;

use App\Filament\Resources\LibraryButtonsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLibraryButtons extends EditRecord
{
    protected static string $resource = LibraryButtonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
