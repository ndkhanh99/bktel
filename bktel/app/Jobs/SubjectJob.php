<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Subject;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
class SubjectJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job subject (task09).
     *
     * @return void
     */
    public $path_name;
    public function __construct($path_name)
    {
    $this->path_name = $path_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $test_bug = 0 ;
        $path_name = $this->path_name;
    
        $file_path = storage_path('app/data/'.$path_name);
        $file_get = File::orderBy('id', 'DESC')->first();  
    
        $file = fopen($file_path, "r");
        $importData_arr = array(); 
        $i = 0;
    //Read the contents of the uploaded file 
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
          $num = count($filedata);
        // Skip first row (Remove below comment if you want to skip the first row)
          if ($i == 0) {
            $i++;
            continue;
          }
          for ($c = 0; $c < $num; $c++) {
            $importData_arr[$i][] = $filedata[$c];
          }
          $i++;
        }
        
        fclose($file); //Close after reading
        info($importData_arr);
        info(count($importData_arr));

        try{

            $file_get -> status = "Processing";
            $file_get -> save();

            for ($c = 1; $c <= count($importData_arr); $c++) {
              Subject::create([
                "name" => $importData_arr[$c][1],
                "code" => $importData_arr[$c][2],
                "note" => $importData_arr[$c][3],
              ]); //create subject by csv file
            }
          //catch error and update status
        }catch(\Exception $e){ 
           $file_get -> status = "Finished with error";
            $file_get -> save();
            $test_bug = 1 ; 
          }

        if($test_bug !=1){
          $file_get -> status = "Finished without error";
          $file_get -> save();
        }
        }
    }

