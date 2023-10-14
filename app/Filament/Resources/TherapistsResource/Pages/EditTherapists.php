<?php

namespace App\Filament\Resources\TherapistsResource\Pages;

use App\Filament\Resources\TherapistsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTherapists extends EditRecord
{
    protected static string $resource = TherapistsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
