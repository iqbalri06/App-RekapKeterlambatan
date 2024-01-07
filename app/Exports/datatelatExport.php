<?php

namespace App\Exports;

use App\Models\lates;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

use function PHPSTORM_META\map;

class datatelatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return lates::with('student')
            ->get()
            ->groupBy('student_id')
            ->map(function ($group) {
                $lates = $group->first(); // Assuming you want to get the first record if there are multiple for the same student

                return [
                    $lates->student->nis,
                    $lates->student->name,
                    $lates->student->rombel->rombel,
                    $lates->student->rayon->rayon,
                    $group->count()
                ];
            });
        
    }

    public function headings(): array {
        return [
            'NIS', 'Nama', 'Rombel', 'Rayon', 'Jumlah Keterlambatan'
        ];
    }

}
