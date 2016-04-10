<?php
include("food_notin.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES["files"]["name"][0]!=NULL) { 
    ini_set('display_errors', 'On');
    date_default_timezone_set("Asia/Taipei");
    $target_dir = "./uploads/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    print_r($_FILES);
    // Check if image file is a actual image or fake image
    for ($i=0; $i < count($_FILES["files"]["name"]); $i++) {
        $check = @getimagesize($_FILES["files"]["tmp_name"][$i]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            $imageFileType[$i] = pathinfo($_FILES["files"]["name"][$i],PATHINFO_EXTENSION);

        } else {
            echo "請傳圖片檔！再傳一次";
            $uploadOk = 0;
            if ($i>0) {
                for ($t=0; $t < $i; $t++) { 
                    $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                    unlink($filename);
                }
            }
            exit();
        }



    // Allow certain file formats
        if($imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "再傳一次";
            if ($i>0) {
                    for ($t=0; $t < $i; $t++) { 
                        $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                        unlink($filename);
                    }
                }
            exit();
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["files"]["size"][$i] > 1050000) {
            echo "Sorry, your file is too large.";
            echo "再傳一次";
            if ($i>0) {
                    for ($t=0; $t < $i; $t++) {
                        $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                        unlink($filename);
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
                    $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                        unlink($filename);
                    }
                }
                exit();
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i])) {

                $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i];
                // echo $filename;
                // echo "<img src='".$filename."' style='width:400px;height:250px'>";
                $_SESSION["res_name"]=$_POST["r_name"];
                $_SESSION["res_phone"]=$_POST["r_phone"];
                $_SESSION["res_time"]=$_POST["r_time"];

                header("Location:food_thank.php");

            } else {
                echo "Sorry, there was an error uploading your file.";
                if ($i>0) {
                    for ($t=0; $t < $i; $t++) {
                        $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i];
                        unlink($filename);
                    }
                }
                exit();
            }
        }
    }
}

        include("./food_mail/food_phpmailer.php"); //匯入PHPMailer類別 
        include("./food_mail/food_smtp.php");

        date_default_timezone_set('Asia/Taipei');
        $mail = new PHPMailer();                        // 建立新物件        
        // $mail->SMTPDebug=2;
        $mail->IsSMTP();                                // 設定使用SMTP方式寄信        
        $mail->SMTPAuth = true;                         // 設定SMTP需要驗證

        $mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
        $mail->Host = gethostbyname("smtp.gmail.com");                 // Gmail的SMTP主機        
        $mail->Port = 465;                              // Gmail的SMTP主機的port為465      
        $mail->CharSet = "utf-8";                       // 設定郵件編碼   
        $mail->Encoding = "base64";
        $mail->WordWrap = 50;                           // 每50個字元自動斷行
              
        $mail->Username = "aver803bath261@gmail.com";     // 設定驗證帳號        
        $mail->Password = "(Water0dragon)123";              // 設定驗證密碼        
              
        $mail->From = "aver803bath261@gmail.com";         // 設定寄件者信箱        
        $mail->FromName = "訂食吧";                 // 設定寄件者姓名        
              
        $mail->Subject = "新餐廳";                     // 設定郵件標題        
          
        $mail->IsHTML(true);                            // 設定郵件內容為HTML 

        //  multiple recipients
        $mail->AddAddress("aver803bath261@gmail.com","訂食吧");

        // message
        $res_name=$_SESSION["res_name"];
        $res_phone=$_SESSION["res_phone"];
        $res_time=$_SESSION["res_time"];
        $message = "<p>餐廳名稱：$res_name</p><p>電話：$res_phone</p><p>營業時間：$res_time</p>";
        echo count($_FILES["files"]["name"]);
        for ($i=0; $i < count($_FILES["files"]["name"]); $i++) { 
            # code...
            $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i];
            $mail->AddAttachment($filename,$i . "." . $imageFileType[$i]);
        }
        

        $mail->Body = $message;
        if($mail->Send()){
            for ($i=0; $i < count($_FILES["files"]["name"]); $i++) {
                $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                    unlink($filename);
                }
        }else{
            echo "寄信失敗請再寄一次";
            for ($i=0; $i < count($_FILES["files"]["name"]); $i++) {
                $filename=$target_dir . pathinfo($_FILES["files"]["tmp_name"][$i],PATHINFO_BASENAME) . "." . $imageFileType[$i]; 
                    unlink($filename);
                }
            exit();
        }

        // if($mail->Send()){ 
        //     }else{ 
        //         $msg = "你用壞了～";
        //         echo $msg;
        //     } 
        // }
        // @$mail->ClearAddresses(); 
 ?>


