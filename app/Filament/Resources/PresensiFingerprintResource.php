<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresensiFingerprintResource\Pages;
use App\Filament\Resources\PresensiFingerprintResource\RelationManagers;
use App\Models\PresensiFingerprint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresensiFingerprintResource extends Resource
{
    protected static ?string $model = PresensiFingerprint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('sn')
    //                 ->required()
    //                 ->maxLength(30),
    //             Forms\Components\DateTimePicker::make('scan_date')
    //                 ->required(),
    //             Forms\Components\TextInput::make('pin')
    //                 ->required()
    //                 ->maxLength(32),
    //             Forms\Components\TextInput::make('verifymode')
    //                 ->required()
    //                 ->numeric(),
    //             Forms\Components\TextInput::make('inoutmode')
    //                 ->required()
    //                 ->numeric()
    //                 ->default(0),
    //             Forms\Components\TextInput::make('reserved')
    //                 ->required()
    //                 ->numeric()
    //                 ->default(0),
    //             Forms\Components\TextInput::make('work_code')
    //                 ->required()
    //                 ->numeric()
    //                 ->default(0),
    //             Forms\Components\TextInput::make('att_id')
    //                 ->required()
    //                 ->maxLength(50)
    //                 ->default(0),
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scan_date')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('pegawai.pegawai_nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('verifymode')
                    ->numeric()
                    ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresensiFingerprints::route('/'),
            'create' => Pages\CreatePresensiFingerprint::route('/create'),
            'view' => Pages\ViewPresensiFingerprint::route('/{record}'),
            'edit' => Pages\EditPresensiFingerprint::route('/{record}/edit'),
        ];
    }
}
