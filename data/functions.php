<?php
    //Возвращает размер переданного файла в Гб, Мб, Кб или б
    function getFilesize($filePath)
    {
        if(!file_exists($filePath)) return "File does not exist";

        $filesize = filesize($filePath);

        if($filesize > 1024)
        {
            $filesize = ($filesize/1024);

            if($filesize > 1024)
            {
                $filesize = ($filesize/1024);

                if($filesize > 1024)
                {
                    $filesize = ($filesize/1024);
                    $filesize = round($filesize, 1);
                    return $filesize." GB";
                }
                else
                {
                    $filesize = round($filesize, 1);
                    return $filesize." MB";
                }
            }
            else
            {
                $filesize = round($filesize, 1);
                return $filesize." KB";
            }
        }
        else
        {
            $filesize = round($filesize, 1);
            return $filesize." Bytes";
        }
    }

    function getFileExt($fileName) {
        $fileSplit = explode(".", $fileName);
        return end($fileSplit);
    }
?>