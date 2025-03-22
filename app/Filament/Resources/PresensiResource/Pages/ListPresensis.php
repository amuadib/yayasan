<?php

namespace App\Filament\Resources\PresensiResource\Pages;

use App\Filament\Resources\PresensiResource;
use App\Models\MesinPresensi;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresensis extends ListRecords
{
    protected static string $resource = PresensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\Action::make('pull')
                ->label('Tarik Data')
                ->form([
                    \Filament\Forms\Components\Select::make('mesin_sn')
                        ->label('Nama Mesin')
                        ->options(MesinPresensi::all()->pluck('nama', 'sn'))
                        ->required(),
                ])
                ->action(function ($data, \App\Actions\TarikData $tarik) {
                    $tarik(['sn' => $data['mesin_sn']]);
                }),
        ];
    }
}
