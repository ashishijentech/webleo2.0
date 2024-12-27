<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Inventory::all();
    }

    public function map($row): array
    {
        return [
            $row->M2M_SERVICE_PROVIDER,
            "'" . $row->ICCID, // Force as text
            $row->CARD_STATE,
            $row->CARD_STATUS,
            optional($row->ACTIVE_ON)->format('Y-m-d'),
            optional($row->EXPIRY_ON)->format('Y-m-d'),
            $row->DATA_USAGES,
            optional($row->DATA_USAGES_DATE)->format('Y-m-d H:i:s'),
            $row->PRIMARY_TSP,
            "'" . $row->PRIMARY_MSISDN, // Force as text
            $row->PRIMARY_STATUS,
            $row->FALLBACK_TSP,
            "'" . $row->FALLBACK_MSISDN, // Force as text
            $row->FALLBACK_STATUS,
        ];
    }

    public function headings(): array
    {
        return [
            'M2M_SERVICE_PROVIDER',
            'ICCID',
            'CARD_STATE',
            'CARD_STATUS',
            'ACTIVE_ON',
            'EXPIRY_ON',
            'DATA_USAGES',
            'DATA_USAGES_DATE',
            'PRIMARY_TSP',
            'PRIMARY_MSISDN',
            'PRIMARY_STATUS',
            'FALLBACK_TSP',
            'FALLBACK_MSISDN',
            'FALLBACK_STATUS',
        ];
    }
}
