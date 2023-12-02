<?php

namespace App\Filament\Resources\SitePagesResource\Pages;

use App\Filament\Resources\SitePagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSitePages extends ListRecords
{
    protected static string $resource = SitePagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
