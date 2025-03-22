<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JamKerjaResource\Pages;
use App\Filament\Resources\JamKerjaResource\RelationManagers;
use App\Models\JamKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;

class JamKerjaResource extends Resource
{
    protected static ?string $model = JamKerja::class;
    protected static ?string $modelLabel = 'Jam Mengajar';
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('nama'),
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
                Forms\Components\Repeater::make('jam_kerja')
                    ->schema([
                        Forms\Components\Radio::make('hari')
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
                    ->searchable(),
                Tables\Columns\ViewColumn::make('jam_kerja')
                    ->label('Jam Mengajar')
                    ->view('filament.tables.columns.jadwal'),
                TextColumn::make('pegawai.nama')
                    ->label('Ustadz/Ustadzah')
                    ->listWithLineBreaks()
                    ->bulleted()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
