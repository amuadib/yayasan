<?php

namespace App\Filament\Resources\JamKerjaResource\Pages;

use App\Filament\Resources\JamKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJamKerja extends EditRecord
{
    protected static string $resource = JamKerjaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
