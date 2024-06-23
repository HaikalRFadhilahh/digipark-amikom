<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KartuMahasiswa;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KartuMahasiswaResource\Pages;
use App\Filament\Resources\KartuMahasiswaResource\RelationManagers;

class KartuMahasiswaResource extends Resource
{
    protected static ?string $model = KartuMahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Daftar Kartu Mahasiswa';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_mahasiswa')->label('Nama Mahasiswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('npm')->label('NIM')
                    ->required()
                    ->maxLength(255)
                    ->unique('kartu_mahasiswas', 'npm'),
                Forms\Components\TextInput::make('nomer_kartu')->label('Nomer Kartu')
                    ->required()
                    ->maxLength(255)
                    ->unique('kartu_mahasiswas', 'nomer_kartu'),
                Forms\Components\Toggle::make('status_kartu')->label('Status Kartu')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mahasiswa')->label('Nama Mahasiswa')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('npm')->label('NIM')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nomer_kartu')->label('Nomer Kartu')
                    ->searchable()->sortable(),
                Tables\Columns\IconColumn::make('status_kartu')->label('Status Kartu')
                    ->boolean()->sortable()
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal Pendaftaran')
                    ->date('d M Y')->sortable()
            ])
            ->defaultSort('npm', 'asc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button()->requiresConfirmation()->label('Hapus'),
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
            'index' => Pages\ListKartuMahasiswas::route('/'),
            'create' => Pages\CreateKartuMahasiswa::route('/create'),
            'edit' => Pages\EditKartuMahasiswa::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('deleted_at', null);
    }
}
