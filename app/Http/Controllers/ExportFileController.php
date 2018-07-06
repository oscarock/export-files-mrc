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
      $issues = Issue::where('tenant_id', '=' ,6)->get();
      foreach ($issues as $issue) {
        $file_content = '"'.$issue->name."\r\n"
                           .$issue->description."\r\n"
                           .$issue->publication_date.'"';
        Storage::put($issue->tenant_id.'/'.$issue->slug.'.mrc', $file_content);
      }
       
      //var_dump(file_exists(storage_path('app/'.$issue->tenant_id)));

      $files = glob(storage_path('app/'.$issue->tenant_id));
      //Zipper::zip('storage/MARC-export.zip')->folder($issue->tenant_id)->add($files);
      Zipper::zip(storage_path('app/MARC-export.zip'))->folder($issue->tenant_id)->add($files);
      //return response()->download('storage/MARC-export.zip');
      //Storage::deleteDirectory($issue->tenant_id);
      //var_dump(Storage::deleteDirectory($issue->tenant_id));
    }
}
