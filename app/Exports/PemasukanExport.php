<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class PemasukanExport implements FromCollection, WithHeadings, WithTitle, WithMapping, ShouldAutoSize
{
    public function title(): string
    {
        return 'Pemasukan';
    }

    public function collection()
    {
        return Pemasukan::select('id', 'keterangan', 'jumlah', 'created_at', 'updated_at')->get();
    }

    public function map($invoice): array
    {
        return [
            $invoice->id,
            $invoice->keterangan,
            $invoice->jumlah,
            $invoice->created_at->format('d/M/Y'),
            $invoice->updated_at->format('d/M/Y')
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'keterangan',
            'jumlah',
            'dibuat',
            'diperbarui'
        ];
    }

}