<?php
namespace App\Handlers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ImageUploadHandler
{
    /**
     * @msg:
     * @param $file 文件
     * @param String $folder 保存到哪个文件夹
     * @return String $path
     */
    public function getImageStorePath($file,$folder)
    {
        //以时间做文件夹
        $date = date('Y/m/d');
        //追加的文件名
        $fileDate = date('Y_m_d_h_m_s');

        $id = Auth::id();

        $path = $file->storeAs("public/$folder/$date", "$id-$fileDate.png");

        return $path;
    }
}
