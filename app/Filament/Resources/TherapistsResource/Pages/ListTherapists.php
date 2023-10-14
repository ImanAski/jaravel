<?php

namespace App\Filament\Resources\TherapistsResource\Pages;

use App\Filament\Resources\TherapistsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTherapists extends ListRecords
{
    protected static string $resource = TherapistsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
