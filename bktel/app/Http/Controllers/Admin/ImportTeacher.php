<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use App\Jobs\ProcessCsvUpload;
use DB;

class ImportTeacher extends Controller
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
            'name' => $request -> name,
            'status' => '0',
            'path' => $filename,
            'created_by' => $request -> name,
        ]
    );
      foreach($files as $file) {
            ProcessCsvUpload::dispatch($file,$import);
    }
}
}