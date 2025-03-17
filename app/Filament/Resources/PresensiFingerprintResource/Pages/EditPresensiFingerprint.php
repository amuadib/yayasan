<?php

namespace App\Filament\Resources\PresensiFingerprintResource\Pages;

use App\Filament\Resources\PresensiFingerprintResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresensiFingerprint extends EditRecord
{
    protected static string $resource = PresensiFingerprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
