<?php

namespace App\Filament\Resources\PresensiFingerprintResource\Pages;

use App\Filament\Resources\PresensiFingerprintResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresensiFingerprints extends ListRecords
{
    protected static string $resource = PresensiFingerprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
