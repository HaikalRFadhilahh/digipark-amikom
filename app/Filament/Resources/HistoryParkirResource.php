<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryParkirResource\Pages;
use App\Filament\Resources\HistoryParkirResource\RelationManagers;
use App\Models\HistoryParkir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoryParkirResource extends Resource
{
    protected static ?string $model = HistoryParkir::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-chart-bar';

    protected static ?string $navigationLabel = 'History Parkir Mahasiswa';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_kartu')
                    ->numeric(),
                Forms\Components\TextInput::make('nomer_kendaraan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jam_masuk')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_masuk')
                    ->required(),
                Forms\Components\TextInput::make('jam_keluar')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_keluar')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kartuMahasiswa.nama_mahasiswa')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('kartuMahasiswa.npm')
                    ->searchable()
                    ->sortable()
                    ->label('NIM Mahasiswa'),
                Tables\Columns\TextColumn::make('kartuMahasiswa.nomer_kartu')
                    ->searchable()
                    ->sortable()
                    ->label('Nomer Kartu'),
                Tables\Columns\TextColumn::make('nomer_kendaraan')
                    ->searchable()
                    ->sortable()
                    ->label('Nomer Kendaraan'),
                Tables\Columns\TextColumn::make('jam_masuk')
                    ->sortable()
                    ->searchable()
                    ->label('Jam Masuk Parkir'),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Tanggal Masuk Parkir'),
                Tables\Columns\TextColumn::make('jam_keluar')
                    ->sortable()
                    ->searchable()
                    ->label('Jam Keluar Parkir'),
                Tables\Columns\TextColumn::make('tanggal_keluar')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Tanggal Keluar Parkir'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
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
            'index' => Pages\ListHistoryParkirs::route('/'),
            'create' => Pages\CreateHistoryParkir::route('/create'),
            'edit' => Pages\EditHistoryParkir::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
