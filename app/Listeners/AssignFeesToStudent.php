<?php

namespace App\Listeners;

use App\Events\StudentAssignedToGroup;
use App\Models\Fee;
use App\Models\GradeFee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignFeesToStudent
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentAssignedToGroup $event): void
    {
        $student = $event->student;


        $gradeFees = GradeFee::where('grade_id', $student->group->grade_id)->get();

        foreach ($gradeFees as $gradeFee) {
            // Tambahkan tagihan untuk siswa baru
            Fee::create([
                'student_id' => $student->id,
                'payment_type_id' => $gradeFee->payment_type_id,
                'amount' => $gradeFee->amount,
                'due_date' => $gradeFee->due_date,
                'status' => 'unpaid',
                'paid_amount' => 0,
            ]);
        }
    }
}
