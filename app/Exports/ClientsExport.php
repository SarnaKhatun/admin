<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $clients = Customer::select("customers.id", "customers.client_number", "customers.name", "customers.phone", "customers.email", "customers.dob", "customers.nid_number", "customers.date")->get();

        return $clients;
    }


    public function headings(): array
    {
        return ["ClientID", "ClientNumber", "Name","Phone","Email","Dob","Nid Number" ,"Created Date"];
    }
}
