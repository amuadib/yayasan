<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesinPresensiResource\Pages;
use App\Filament\Resources\MesinPresensiResource\RelationManagers;
use App\Models\MesinPresensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MesinPresensiResource extends Resource
{
    protected static ?string $model = MesinPresensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('merek')
                    ->required(),
                Forms\Components\TextInput::make('tipe'),
                Forms\Components\TextInput::make('sn')
                    ->required(),
                Forms\Components\TextInput::make('ip'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('merek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip')
                    ->searchable(),
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
