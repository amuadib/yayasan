<?php

namespace App\Filament\Resources\MesinPresensiResource\Pages;

use App\Filament\Resources\MesinPresensiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMesinPresensi extends CreateRecord
{
    protected static string $resource = MesinPresensiResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
