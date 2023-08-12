<?php

namespace App\Library;

use App\Models\Setting;
use Illuminate\Support\Facades\File;

class UploadImgCat
{
    public function uploadPic($file, $path, $resize = true)
    {
        $pathMain = $path . 'main/';
        if ($resize) {
            $pathBig = $path . '/';
            $pathMedium = $path . '/medium/';
            $pathSmall = $path . '/small/';
        }


        $extension = $file->getClientOriginalExtension();
        $extension1 = $file->getClientOriginalName();
        $ext = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG','webp','WEBP','gif','GIF'];
        if (in_array($extension, $ext)) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path);
            }
            if (!File::isDirectory($pathMain)) {
                File::makeDirectory($pathMain);
            }
            if ($resize) {
                if (!File::isDirectory($pathBig)) {
                    File::makeDirectory($pathBig);
                }
                if (!File::isDirectory($pathMedium)) {
                    File::makeDirectory($pathMedium);
                }
                if (!File::isDirectory($pathSmall)) {
                    File::makeDirectory($pathSmall);
                }
            }


            $fileName = md5(microtime()) . ".$extension1";
            // $w = str_replace($extension, "webp", $extension1);
            // $fileName = $w;
            $file->move($pathMain, $fileName);
            if ($resize) {
                $kaboom = explode(".", $fileName);
                $fileExt = end($kaboom);

                ResizerCat::resizePic($pathMain . $fileName, $pathSmall . $fileName, 150, 150, $fileExt);
                ResizerCat::resizePic($pathMain . $fileName, $pathMedium . $fileName, 300, 300, $fileExt);
                ResizerCat::resizePic($pathMain . $fileName, $pathBig . $fileName, 400, 400, $fileExt, True);

            }
            return $fileName;
        } else {
            return false;
        }
    }

    public function waterMark($fileName, $path)
    {
        $setting = Setting::find(1);
        $mark = new Watermark();

        $mark->thumbnail($path . 'big/' . $fileName);
        $mark->insert_watermark('', 'assets/uploads/content/set/' . $setting->logo_water_mark);
        $mark->save($path . 'big/' . $fileName);

        $mark->thumbnail($path . 'medium/' . $fileName);
        $mark->insert_watermark('', 'assets/uploads/content/set/' . $setting->logo_water_mark);
        $mark->save($path . 'medium/' . $fileName);

        return true;
    }
}
