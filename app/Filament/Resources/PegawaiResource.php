<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('gelar_depan'),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('gelar_belakang'),
                Radio::make('jenis_kelamin')
                    ->options(['l' => 'Laki-laki', 'p' => 'Perempuan'])
                    ->inline()
                    ->inlineLabel(false)
                    ->required(),
                TextInput::make('tempat_lahir'),
                DatePicker::make('tanggal_lahir')
                    ->format('Y-m-d')
                    ->displayFormat('d F Y')
                    ->native(false),
                TextInput::make('nik')
                    ->label('NIK'),
                Forms\Components\Textarea::make('alamat')
                    ->default('JATIKEPLEK 02/06 KLEMUNAN WLINGI'),
                TextInput::make('no_hp'),
                DatePicker::make('tmt')
                    ->label('Tanggal Mulai Tugas')
                    ->native(false)
                    ->format('Y-m-d')
                    ->displayFormat('d F Y')
                    ->required(),
                Radio::make('status')
                    ->options(array_combine($s = config('local.pegawai.status'), $s))
                    ->inline()
                    ->inlineLabel(false)
                    ->required(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('niy')
            ->columns([
                TextColumn::make('niy')
                    ->label('NIY')
                    ->searchable(),
                TextColumn::make('nama')
                    ->formatStateUsing(fn(Pegawai $record): string => trim($record->gelar_depan . ' ' . $record->nama . ' ' . $record->gelar_belakang . ' (' . strtoupper($record->jenis_kelamin) . ')'))
                    ->searchable(),
                TextColumn::make('alamat'),
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
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('ubah_status')
                    ->icon('heroicon-o-pencil-square')
                    ->form([
                        Radio::make('status')
                            ->options(array_combine($s = config('local.pegawai.status'), $s))
                            ->inline()
                            ->inlineLabel(false)
                            ->required()
                    ])
                    ->action(fn(\Illuminate\Database\Eloquent\Collection $records, array $data) => $records->each->update(['status' => $data['status']]))
                    ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'view' => Pages\ViewPegawai::route('/{record}'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
