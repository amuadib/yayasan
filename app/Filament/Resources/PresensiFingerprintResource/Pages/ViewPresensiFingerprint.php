<?php

namespace App\Filament\Resources\PresensiFingerprintResource\Pages;

use App\Filament\Resources\PresensiFingerprintResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPresensiFingerprint extends ViewRecord
{
    protected static string $resource = PresensiFingerprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
