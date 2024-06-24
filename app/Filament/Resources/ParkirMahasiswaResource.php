<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParkirMahasiswaResource\Pages;
use App\Filament\Resources\ParkirMahasiswaResource\RelationManagers;
use App\Models\ParkirMahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParkirMahasiswaResource extends Resource
{
    protected static ?string $model = ParkirMahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-s-truck';

    protected static ?string $navigationLabel = 'Daftar Data Parkir Mahasiswa';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_kartu')
                    ->numeric(),
                Forms\Components\TextInput::make('nomer_kendaraan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->query(fn (ParkirMahasiswa $query) => $query->masukTanpaKeluar())
            ->columns([
                // Tables\Columns\TextColumn::make('id_kartu')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('kartuMahasiswa.nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kartuMahasiswa.npm')
                    ->label('NPM Mahasiswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kartuMahasiswa.nomer_kartu')
                    ->label('Nomer Kartu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomer_kendaraan')
                    ->label('Nomer Kendaraan')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('status')->label('Status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Jam Masuk Parkir')
                    ->datetime('H.i.s d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([]);
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
            'index' => Pages\ListParkirMahasiswas::route('/'),
            'create' => Pages\CreateParkirMahasiswa::route('/create'),
            'edit' => Pages\EditParkirMahasiswa::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
