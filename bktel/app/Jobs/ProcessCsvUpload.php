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
use App\Models\Teacher;
use App\Models\User;
use Exception;


class ProcessCsvUpload implements ShouldQueue
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
    public function handle()
    {
        Redis::throttle('upload-csv')->allow(1)->every(20)->then(function () {
            Import::updateOrCreate([
                'id' => $this->import->id,
            ],['status' => '1',]);
        try {
             $data = array_map('str_getcsv', file($this->file));
            foreach ($data as $row)
                {   
                    $teacher =  Teacher::create(
                        [
                            'first_name' => $row[0],
                            'last_name' => $row[1],
                            'teacher_code' => $row[2],
                            'teacher_email'=>$row[3],
                            'faculty' => $row[5],
                            'department' => $row[5],
                            'address' => $row[6],
                            'phone' => $row[7],
                            'note' => $row[8],
                        ]
                    );
                    User::create(
                        [
                            'name' => $row[0],
                            'email' => $row[3],
                            'password'=> Hash::make($row[4]),
                            'role_id' => 3,
                            'teacher_id'=>  $teacher ->id ,
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
    // public function failed($e)
    // {
        
    // }
}
