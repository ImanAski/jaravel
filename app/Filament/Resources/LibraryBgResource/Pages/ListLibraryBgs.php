<?php

namespace App\Filament\Resources\LibraryBgResource\Pages;

use App\Filament\Resources\LibraryBgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLibraryBgs extends ListRecords
{
    protected static string $resource = LibraryBgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
