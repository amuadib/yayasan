<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesinPresensiResource\Pages;
use App\Filament\Resources\MesinPresensiResource\RelationManagers;
use App\Models\MesinPresensi;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MesinPresensiResource extends Resource
{
    protected static ?string $model = MesinPresensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nomor_mesin'),
                TextInput::make('password'),
                TextInput::make('merek')
                    ->required(),
                TextInput::make('tipe'),
                TextInput::make('sn')
                    ->label('Serial Number')
                    ->required(),
                TextInput::make('kode_aktivasi')
                    ->label('Kode Aktivasi Personnel'),
                TextInput::make('kode_aktivasi_easy_link_sdk')
                    ->label('Kode Aktivasi Easy Link SDK'),
                TextInput::make('ip')
                    ->label('Alamat IP'),
                TextInput::make('port'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('merek')
                    ->searchable(),
                TextColumn::make('tipe')
                    ->searchable(),
                TextColumn::make('sn')
                    ->label('Serial'),
                TextColumn::make('ip')
                    ->label('Alamat IP'),
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
            'index' => Pages\ListMesinPresensis::route('/'),
            'create' => Pages\CreateMesinPresensi::route('/create'),
            'view' => Pages\ViewMesinPresensi::route('/{record}'),
            'edit' => Pages\EditMesinPresensi::route('/{record}/edit'),
        ];
    }
}
