<?php

namespace App\Filament\Resources;

use App\Filament\Exports\JamaahExporter;
use App\Filament\Resources\JamaahResource\Pages;
use App\Filament\Resources\JamaahResource\RelationManagers;
use App\Models\Jamaah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamaahResource extends Resource
{
    protected static ?string $model = Jamaah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Jamaah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required(),

                Forms\Components\TextInput::make('nik')
                    ->required(),

                Forms\Components\TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required(),

                Forms\Components\DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Forms\Components\Textarea::make('alamat')
                    ->required(),

                Forms\Components\Select::make('province_id')
                    ->label('Provinsi')
                    ->relationship('province', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('city_id')
                    ->label('Kab/Kota')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('district_id')
                    ->label('Kecamatan')
                    ->relationship('district', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('village_id')
                    ->label('Kelurahan/Desa')
                    ->relationship('village', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Radio::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('no_paspor')
                    ->label('No. Paspor')
                    ->required(),

                Forms\Components\DatePicker::make('masa_berlaku_paspor')
                    ->label('Masa Berlaku Paspor')
                    ->required(),

                Forms\Components\FileUpload::make('ktp')
                    ->label('Lampiran KTP')
                    ->required(),

                Forms\Components\FileUpload::make('kk')
                    ->label('Lampiran KK')
                    ->required(),

                Forms\Components\FileUpload::make('foto_diri')
                    ->label('Lampiran Foto Diri')
                    ->required(),

                Forms\Components\FileUpload::make('paspor')
                    ->label('Lampiran Paspor')
                    ->required(),

                Forms\Components\TextInput::make('no_visa')
                    ->label('No Visa'),

                Forms\Components\DatePicker::make('berlaku_sampai')
                    ->label('Berlaku Sampai'),

                Forms\Components\Select::make('jenis_paket')
                    ->label('Paket Dipilih')
                    ->options([
                        'Paket Itikaf' => 'Paket Itikaf',
                        'Paket Reguler' => 'Paket Reguler',
                        'Paket VIP' => 'Paket VIP',
                    ])
                    ->required(),

                Forms\Components\Select::make('jenis_kamar')
                    ->label('Kamar Dipilih')
                    ->options([
                        'Quint' => 'Quint',
                        'Quad' => 'Quad',
                        'Triple' => 'Triple',
                        'Double' => 'Double',
                        'Single' => 'Single',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('tempat_lahir'),
                Tables\Columns\TextColumn::make('tgl_lahir'),
                Tables\Columns\TextColumn::make('province.name')->label('Provinsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()->exporter(JamaahExporter::class),
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
            'index' => Pages\ListJamaahs::route('/'),
            'create' => Pages\CreateJamaah::route('/create'),
            'edit' => Pages\EditJamaah::route('/{record}/edit'),
        ];
    }
}
