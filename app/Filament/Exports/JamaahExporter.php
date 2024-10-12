<?php

namespace App\Filament\Exports;

use App\Models\Jamaah;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class JamaahExporter extends Exporter
{
    protected static ?string $model = Jamaah::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id'),
            ExportColumn::make('nama_lengkap'),
            ExportColumn::make('nik'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('alamat'),
            ExportColumn::make('province.name')->label('Provinsi'),
            ExportColumn::make('city.name')->label('Kab/Kota'),
            ExportColumn::make('district.name')->label('Kecamatan'),
            ExportColumn::make('village.name')->label('Kelurahan/Desa'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('no_paspor'),
            ExportColumn::make('masa_berlaku_paspor'),
            ExportColumn::make('ktp'),
            ExportColumn::make('kk'),
            ExportColumn::make('foto_diri'),
            ExportColumn::make('paspor'),
            ExportColumn::make('no_visa'),
            ExportColumn::make('berlaku_sampai'),
            ExportColumn::make('jenis_paket'),
            ExportColumn::make('jenis_kamar'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your jamaah export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
