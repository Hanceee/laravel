<?php

namespace App\Filament\Resources\AdminControlsResource\Pages;

use App\Filament\Resources\AdminControlsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminControls extends EditRecord
{
    protected static string $resource = AdminControlsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
