<?php

namespace App\Filament\Resources\LibraryBgResource\Pages;

use App\Filament\Resources\LibraryBgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLibraryBg extends EditRecord
{
    protected static string $resource = LibraryBgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
