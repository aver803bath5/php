<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES["files"]["name"][0]!=NULL) { 
    ini_set('display_errors', 'On');
    date_default_timezone_set("Asia/Taipei");
    $target_dir = "./uploads/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    print_r($_FILES);
    // Check if image file is a actual image or fake image
    for ($i=0; $i < count($_FILES["files"]["name"]); $i++) {
        if(isset($_POST["submit"])) {
            $check = @getimagesize($_FILES["files"]["tmp_name"][$i]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                $imageFileType = pathinfo($_FILES["files"]["name"][$i],PATHINFO_EXTENSION);

            } else {
                echo "請傳圖片檔！再傳一次";
                $uploadOk = 0;
                if ($i>0) {
                    for ($t=0; $t < $i; $t++) { 
                        unlink($_FILES["files"]["tmp_name"][$t]);
                    }
                }
                exit();
            }
        }


    // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "再傳一次";
            if ($i>0) {
                    for ($t=0; $t < $i; $t++) { 
                        unlink($_FILES["files"]["tmp_name"][$t]);
                    }
                }
            exit();
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            if ($i>0) {
                    for ($t=0; $t < $i; $t++) { 
                        unlink($_FILES["files"]["tmp_name"][$t]);
                    }
                }
                exit();
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType)) {

                $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType;
                // echo $filename;
                // echo "<img src='".$filename."' style='width:400px;height:250px'>";
                header("Location:food_thank.php");

            } else {
                echo "Sorry, there was an error uploading your file.";
                if ($i>0) {
                    for ($t=0; $t < $i; $t++) { 
                        unlink($_FILES["files"]["tmp_name"][$t]);
                    }
                }
                exit();
            }
        }
    }
}
?>



