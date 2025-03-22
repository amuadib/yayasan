<?php

namespace App\Filament\Resources\JamKerjaResource\Pages;

use App\Filament\Resources\JamKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJamKerja extends ViewRecord
{
    protected static string $resource = JamKerjaResource::class;

    protected static string $view = 'filament.resources.jam-kerja.pages.view';
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
