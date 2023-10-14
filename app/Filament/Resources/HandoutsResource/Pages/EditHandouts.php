<?php

namespace App\Filament\Resources\HandoutsResource\Pages;

use App\Filament\Resources\HandoutsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHandouts extends EditRecord
{
    protected static string $resource = HandoutsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
