<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresensiResource\Pages;
use App\Filament\Resources\PresensiResource\RelationManagers;
use App\Models\Presensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresensiResource extends Resource
{
    protected static ?string $model = Presensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('scan_time', 'desc')
            ->columns([
                TextColumn::make('pegawai.nama')
                    ->formatStateUsing(fn(Presensi $record): string => trim($record->pegawai->gelar_depan . ' ' . $record->pegawai->nama . ' ' . $record->pegawai->gelar_belakang . ' (' . strtoupper($record->pegawai->jenis_kelamin) . ')'))
                    ->sortable(),
                TextColumn::make('mesin.nama'),
                TextColumn::make('scan_time')
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresensis::route('/'),
        ];
    }
}
