<?php

namespace App\Http\Controllers;
use App\Issue;
use Storage;
use DB;
use Zipper;

use Illuminate\Http\Request;

class ExportFileController extends Controller
{
    public function createFiles(){
      $issues = Issue::where('tenant_id', '=' , 6)->get();
      foreach ($issues as $issue) {
        $file_content = '"'.$issue->name."\r\n"
                           .$issue->description."\r\n"
                           .$issue->publication_date.'"';
        Storage::put($issue->tenant_id.'/'.$issue->slug.'.mrc', $file_content);
      }
       
      $files = glob(storage_path('app/'.$issue->tenant_id));
      Zipper::zip(storage_path('app/MARC-export.zip'))->folder($issue->tenant_id)->add($files);
      return response()->json([
        'download_zip' =>  storage_path('app/MARC-export.zip')
      ]);
    }
}
