<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Redis;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Exception;

class ProcessCsvUpload_stu implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;
    public $import;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file,$import)
    {
        $this->file = $file;
        $this->import = $import;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    // upload file CSV
    public function handle()
    {
        Redis::throttle('upload-csv')->allow(1)->every(20)->then(function () {
            // updateImportTable
            Import::updateOrCreate([
                'id' => $this->import->id,
            ],['status' => '1',]);
        try {
             $data = array_map('str_getcsv', file($this->file));
            foreach ($data as $row)
                {   
                    $student =  Student::create(
                        [
                            'first_name' => $row[0],
                            'last_name' => $row[1],
                            'student_code' => $row[2],
                            'student_email'=>$row[4],
                            'faculty' => $row[6],
                            'department' => $row[5],
                            'address' => $row[7],
                            'phone' => $row[8],
                            'note' => $row[9],
                        ],
                    );
                    info($student);
                    User::create(
                        [
                            'name' => $row[0],
                            'email' => $row[4],
                            'password'=> Hash::make($row[3]),
                            'role_id' => 4,
                            'student_id'=>  $student -> id,
                        ]
                    );
                }
                  // updateImportTable
                    Import::updateOrCreate(
                        [
                            'id' => $this->import->id,
                        ],
                        [   'status' => '3' ,]
                    );
            }
        catch (Exception $e)
        {
            // updateImportTable
            Import::updateOrCreate(
                [
                    'id' => $this->import->id,
                ],
                ['status' => '4' ,]
            );
        }

        },
        function () {
            return $this->release(10);
        });
    }
    
}
