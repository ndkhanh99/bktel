<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Redis;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Import;
use App\Models\Subject;
use Exception;

class ProcessCsvUpload_sub implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;
    public $import;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $import)
    {
        $this -> file = $file;
        $this -> import = $import;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
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
                    $subject =  Subject::create(
                        [
                            'name' => $row[0],
                            'code' => $row[1],
                            'note' => $row[2],
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
