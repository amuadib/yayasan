<?php

namespace App\Filament\Resources\JamKerjaResource\RelationManagers;

use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PegawaiRelationManager extends RelationManager
{
    protected static string $relationship = 'pegawai';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                TextColumn::make('niy')
                    ->label('NIY')
                    ->searchable(),
                TextColumn::make('nama')
                    ->formatStateUsing(fn(Pegawai $record): string => trim($record->gelar_depan . ' ' . $record->nama . ' ' . $record->gelar_belakang . ' (' . strtoupper($record->jenis_kelamin) . ')'))
                    ->searchable(),
                TextColumn::make('alamat'),
                TextColumn::make('mesin.mesin_presensi.nama')
                    ->label('Mesin Presensi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Diniyah' => 'info',
                        'SDIMU' => 'success',
                        default => 'primary',
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Almarhum' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label('Tambah')
                    ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\DetachAction::make()
                    ->label('Hapus'),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
