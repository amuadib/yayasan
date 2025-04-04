<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JamKerjaResource\Pages;
use App\Filament\Resources\JamKerjaResource\RelationManagers;
use App\Models\JamKerja;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class JamKerjaResource extends Resource
{
    protected static ?string $model = JamKerja::class;
    protected static ?string $modelLabel = 'Jam Mengajar';
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('nama'),
                TextEntry::make('keterangan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                \Filament\Infolists\Components\Fieldset::make('Prioritas')
                    ->schema([
                        TextEntry::make('prioritas')
                            ->badge()
                            ->formatStateUsing(fn(string $state): string => match ($state) {
                                'n' => 'Normal',
                                'y' => 'Prioritas',
                            })
                            ->color(fn(string $state): string => match ($state) {
                                'n' => 'gray',
                                'y' => 'danger',
                            }),
                        TextEntry::make('tgl_mulai_prioritas')
                            ->placeholder('-'),
                        TextEntry::make('tgl_selesai_prioritas')
                            ->placeholder('-'),
                    ])
                    ->columns(3),
                \Filament\Infolists\Components\ViewEntry::make('jam_kerja')
                    ->label('Jadwal')
                    ->view('filament.infolists.entries.jadwal')
                    ->columnSpanFull(),
            ]);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->columnSpanFull(),
                Forms\Components\fieldset::make('Prioritas Jadwal')
                    ->schema([
                        Radio::make('prioritas')
                            ->helperText('Jadwal prioritas akan menimpa jadwal dengan Nama sama pada Tanggal yang ditentukan')
                            ->options(['y' => 'Ya', 'n' => 'Tidak'])
                            ->inline()
                            ->inlineLabel(false)
                            ->live()
                            ->required(),
                        DatePicker::make('tgl_mulai_prioritas')
                            ->visible(fn(Get $get) => $get('prioritas') == 'y')
                            ->required(fn(Get $get) => $get('prioritas') == 'y'),
                        DatePicker::make('tgl_selesai_prioritas')
                            ->visible(fn(Get $get) => $get('prioritas') == 'y')
                            ->required(fn(Get $get) => $get('prioritas') == 'y'),
                    ])
                    ->columns(3),

                Forms\Components\Repeater::make('jam_kerja')
                    ->schema([
                        Radio::make('hari')
                            ->options(config('local.hari'))
                            ->inline()
                            ->inlineLabel(false)
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\TimePicker::make('mulai')
                            ->seconds(false)
                            ->required(),
                        Forms\Components\TimePicker::make('selesai')
                            ->seconds(false)
                            ->required(),
                    ])
                    ->cloneable()
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->description(fn(JamKerja $record): string => $record->keterangan ?? '')
                    ->searchable(),
                Tables\Columns\ViewColumn::make('jam_kerja')
                    ->label('Jam Mengajar')
                    ->view('filament.tables.columns.jadwal'),
                TextColumn::make('pegawai')
                    ->label('Ustadz/Ustadzah')
                    ->formatStateUsing(fn($state): string => trim($state->gelar_depan . ' ' . $state->nama . ' ' . $state->gelar_belakang . ' (' . strtoupper($state->jenis_kelamin) . ')'))
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->limitList(5)
                    ->expandableLimitedList(),
                TextColumn::make('prioritas')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'n' => 'Normal',
                        'y' => 'Prioritas',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'n' => 'gray',
                        'y' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\ReplicateAction::make()
                        ->color('info'),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PegawaiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJamKerjas::route('/'),
            'create' => Pages\CreateJamKerja::route('/create'),
            'view' => Pages\ViewJamKerja::route('/{record}'),
            'edit' => Pages\EditJamKerja::route('/{record}/edit'),
        ];
    }
}
