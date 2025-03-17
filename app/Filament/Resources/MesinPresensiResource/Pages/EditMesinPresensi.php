<?php

namespace App\Filament\Resources\MesinPresensiResource\Pages;

use App\Filament\Resources\MesinPresensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMesinPresensi extends EditRecord
{
    protected static string $resource = MesinPresensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
