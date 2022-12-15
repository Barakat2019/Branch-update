<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipController extends Controller
{
    public function zipFile()
    {
        $zip=new ZipArchive;
        $fileName='myzip.zip';

        if($zip->open(public_path($fileName),ZipArchive::CREATE)===TRUE)
        {
            $files=File::files(public_path('myfiles'));

            foreach($files as $key=>$value)
            {
                $relativeNameInZipFile=basename($value);

                $zip->addFile($value,$relativeNameInZipFile);
                
            }
            $zip->close(); 
        }
        return response()->download(public_path($fileName));
    }
}
