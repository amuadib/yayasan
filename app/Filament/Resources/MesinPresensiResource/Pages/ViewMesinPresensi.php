<?php

namespace App\Filament\Resources\MesinPresensiResource\Pages;

use App\Filament\Resources\MesinPresensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMesinPresensi extends ViewRecord
{
    protected static string $resource = MesinPresensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
