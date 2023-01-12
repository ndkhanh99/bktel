<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Import;
use App\Jobs\ProcessCsvUpload_sub;
use App\Models\Subject;
use DB;


class ImportSubjectController extends Controller
{
    public $import;
    public function store (Request $request)
    {
        $request-> validate([
            'path' => 'required|ends_with:.csv',
        ]);
        $file = file($request ->file('file')->getRealPath());
        $filename = storage_path('app/data/'.date('yymmdd_hhmmss_{old_name}').'.csv');
        file_put_contents($filename,$file);
        $files = glob($filename);
        $import = Import::create(
        [   
            'name' => 'Create_subject',
            'status' => '0',
            'path' => $filename,
            'created_by' => $request -> name,
        ]
    );
      foreach($files as $file) {
            ProcessCsvUpload_sub::dispatch($file,$import);
    }
}
}
