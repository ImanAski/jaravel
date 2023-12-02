<?php

namespace App\Filament\Resources\SitePagesResource\Pages;

use App\Filament\Resources\SitePagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSitePages extends EditRecord
{
    protected static string $resource = SitePagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
