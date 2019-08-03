<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Order Number',
            'Client Id',
            'Total Amount',
            'Order Date',
            'Order Status',
            'Payment Status',
            'Payment Type',
            'Create at',
            'Updated at',
            'Payment Info',
        ];
    }

}
