<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\File;
use App\Imports\TeachersImport;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
class FileJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  //This file for create Teacher (task07)
  
  public $path_name;

  //construct
  public function __construct($path_name)
  {
    $this->path_name = $path_name;
  }

  //handle
  public function handle()
  {

    $test_bug = 0 ; //for update status

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
    info(count($importData_arr)); //For Debugging
    
    try{
      $file_get -> status = "Processing"; // update processing while it work
      $file_get -> save();

      for ($c = 1; $c <= count($importData_arr); $c++) {
        $teacher = Teacher::create([
          "first_name" =>$importData_arr[$c][1],                                                                                                                                                                         
          "last_name" =>$importData_arr[$c][2],
          "teacher_code" =>$importData_arr[$c][3],
          "department" =>$importData_arr[$c][4],
          "faculty" =>$importData_arr[$c][5],
          "address"=>$importData_arr[$c][6],
          "phone"=>$importData_arr[$c][7], 
          "note"=>$importData_arr[$c][8] 
        ]); //teacher create by csv file

      $user = User::create([
        "email" => $importData_arr[$c][9],
        "password" => Hash::make("Bmvt@2022"),
        "name" => $importData_arr[$c][2]
      ]); //user create by csv file

      $user -> teacher_id = $teacher -> id; 
      $user -> role_id = 3;
      $user -> save(); 
    }
  //catch error and update status if having error
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