<?php

namespace App\Filament\Resources\MesinPresensiResource\Pages;

use App\Filament\Resources\MesinPresensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMesinPresensis extends ListRecords
{
    protected static string $resource = MesinPresensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
