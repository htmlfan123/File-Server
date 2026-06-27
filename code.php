<?php
$dir="uploads";
if(!is_dir($dir)) mkdir($dir,0777,true);

$action=$_GET["action"]??"";

function safe($f){
    return basename($f);
}

if($action=="upload"){
    if(isset($_FILES["file"])){
        move_uploaded_file(
            $_FILES["file"]["tmp_name"],
            "$dir/".safe($_FILES["file"]["name"])
        );
    }
    exit;
}

if($action=="list"){
    $files=array_diff(scandir($dir),[".",".."]);

    foreach($files as $f){
        $e=htmlspecialchars($f);
        echo "<div>
        <input type='checkbox' name='files[]' value='$e'>
        $e
        <a href='code.php?action=download&file=".urlencode($f)."'>Download</a>
        <button type='button' onclick=\"del('$e')\">Delete</button>
        </div>";
    }
    exit;
}

if($action=="download"){
    $f="$dir/".safe($_GET["file"]);
    if(file_exists($f)){
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".basename($f)."\"");
        readfile($f);
    }
    exit;
}

if($action=="delete"){
    $f="$dir/".safe($_GET["file"]);
    if(file_exists($f)) unlink($f);
    exit;
}

if($action=="zip"){
    $zip=new ZipArchive;
    $tmp=tempnam(sys_get_temp_dir(),"zip");

    $zip->open($tmp,ZipArchive::CREATE);

    foreach($_POST["files"]??[] as $f){
        $p="$dir/".safe($f);
        if(file_exists($p))
            $zip->addFile($p,basename($p));
    }

    $zip->close();

    header("Content-Type: application/zip");
    header("Content-Disposition: attachment; filename=selected_files.zip");
    readfile($tmp);
    unlink($tmp);
    exit;
}
?>
