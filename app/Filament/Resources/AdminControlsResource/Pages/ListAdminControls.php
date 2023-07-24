<?php

namespace App\Filament\Resources\AdminControlsResource\Pages;

use App\Filament\Resources\AdminControlsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminControls extends ListRecords
{
    protected static string $resource = AdminControlsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
