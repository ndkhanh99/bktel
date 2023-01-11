<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\File;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class StudentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $path_name;
    public function __construct( $path_name)
    {
        $this->path_name = $path_name;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
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
    info($importData_arr[3][6]); 
    info(count($importData_arr));
    try{
        $file_get -> status = "Processing";
        $file_get -> save();

        for ($c = 1; $c <= count($importData_arr); $c++) {
        $student = Student::create([
            "last_name" =>$importData_arr[$c][1],
          "first_name" =>$importData_arr[$c][2],                                                                                                                                                                         
          "student_code" =>$importData_arr[$c][3],
          "department" =>$importData_arr[$c][4],
          "faculty" =>$importData_arr[$c][5],
          "address"=>$importData_arr[$c][6],
          "phone"=>$importData_arr[$c][7], 
          "note"=>$importData_arr[$c][8] 
        ]);
       $user = User::create([
          "email" => $importData_arr[$c][9],
          "password" => Hash::make($importData_arr[$c][10]),
          "name" => $importData_arr[$c][2],
          "role_id" => 4
        ]);
        $user -> student_id = $student -> id;
        $user -> save();
      }
    
      //Add Teacher and user
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
