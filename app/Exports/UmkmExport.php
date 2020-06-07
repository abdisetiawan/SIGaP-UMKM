<?php

namespace App\Exports;

use App\Umkm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class UmkmExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Umkm::all();
    }
    
    public function map($umkm): array
    {
        return [
            $umkm->nama_umkm,
            $umkm->member->nama,
            $umkm->kecamatan->nama_kcmtn,
            $umkm->kelurahan->nama_klrhn,
            $umkm->kategori->nama_ktgr,
            $umkm->alamat,
            $umkm->keterangan
        ];
    }

    public function headings(): array
    {
        return [
            'Nama UMKM',
            'Nama Pemilik',
            'Kecamatan',
            'Kelurahan',
            'Kategori',
            'Alamat',
            'Keterangan'
        ];
    }
    
}
