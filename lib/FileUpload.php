<?php
class FileUpload {

    public static function setFile($save_dir) {
        if($_FILES["file"]["tmp_name"]){
            list($file_name,$file_type) = explode(".",$_FILES['file']['name']);
            //ファイル名を日付と時刻にしている。
            $name = date("YmdHis").".".$file_type;
            $file = $_SERVER["DOCUMENT_ROOT"].$save_dir;
            //ディレクトリを作成してその中にアップロードしている。
            if(!file_exists($file)){
                mkdir($file,0755,true);
            }
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file."/".$name)) {
                chmod($file."/".$name, 0644);
                return $file."/".$name;
            }
        }
    }
}
?>