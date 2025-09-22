<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Investment;
use App\Models\Sale;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsersExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function collection()
    {
        $users = User::all();
        return $users->map(function($user) {
            return [
                'Name' => $user->name,
                'Email' => $user->email,
                'Total Investment' => Investment::where('user_id', $user->id)
                    ->whereBetween('invested_at', [$this->startDate, $this->endDate])
                    ->sum('shares') ?? 0,
                'Total Sale' => Sale::where('user_id', $user->id)
                    ->whereBetween('sold_at', [$this->startDate, $this->endDate])
                    ->sum('shares') ?? 0,
                'Total Payment' => Payment::where('user_id', $user->id)
                    ->whereBetween('paid_at', [$this->startDate, $this->endDate])
                    ->sum('amount') ?? 0,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Total Investment(shares)',
            'Total Sale(shares)',
            'Total Payment(amount)',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 30, // Name
            'B' => 30, // Email
            'C' => 20, // Total Investment
            'D' => 20, // Total Sale
            'E' => 20, // Total Payment
        ];
    }
}