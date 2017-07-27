 <?php
    /*
     * 文件上传类
     * */
    require '../medoo/config.php';
    require 'tojson.php';
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $file = $_FILES["file"];
 session_start();
 $teacherid = $_SESSION['teacherid'];
 $teacherteachername = $_SESSION['teachername'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $filebiref = isset($_POST['filebiref']) ? $_POST['filebiref'] : '';

    if($action == 'projectpaper')
    {
        $type= array("gif", "jpeg", "jpg", "png");
        $size = 1024*1024*8;
        $url = "../upload/";
        if(!is_uploaded_file($file["tmp_name"])){//验证上传文件是否存在
            $result = array("result"=>0,'msg'=>"请选择你想要上传的图片！");
            echo JSON($result);
            exit;
        }
        else{
            if (($file["type"] == "image/gif")
                || ($file["type"] == "image/jpeg")
                || ($file["type"] == "image/jpg")
                || ($file["type"] == "image/pjpeg")
                || ($file["type"] == "image/x-png")
                || ($file["type"] == "image/png"))//判断文件类型是否合法
            {
                uploadfile($id,$file, $type, $size, $url, $action,$teacherid,$filebiref);
            }
            else{
                $result = array("result"=>0,'msg'=>"文件类型错误！");
                $json = JSON($result);
                echo $json;
            }
        }
    }else if($action == 'projectwinning'){
        $type= array("gif", "jpeg", "jpg", "png");
        $size = 1024*1024*8;
        $url = "../upload/";
        if(!is_uploaded_file($file["tmp_name"])){//验证上传文件是否存在
            $result = array("result"=>0,'msg'=>"请选择你想要上传的图片！");
            echo JSON($result);
            exit;
        }
        else{
            if (($file["type"] == "image/gif")
                || ($file["type"] == "image/jpeg")
                || ($file["type"] == "image/jpg")
                || ($file["type"] == "image/pjpeg")
                || ($file["type"] == "image/x-png")
                || ($file["type"] == "image/png"))//判断文件类型是否合法
            {
                uploadfile($id,$file, $type, $size, $url, $action,$teacherid,$filebiref);
            }
            else{
                $result = array("result"=>0,'msg'=>"文件类型错误！");
                $json = JSON($result);
                echo $json;
            }

        }
    }
    else if($action == 'files'){
        $type = array("gif", "jpeg", "jpg", "png","zip","rar","7z","doc","docx","ppt","pdf","xls");
        $size = 1024*1024*100;
        $url = "../upload/";
        if(!is_uploaded_file($file["tmp_name"])){//验证上传文件是否存在
            $result = array("result"=>0,'msg'=>"请选择你想要上传的文件！");
            echo JSON($result);
            exit;
        }
        else{
            if (($file["type"] == "image/gif")
                || ($file["type"] == "image/jpeg")
                || ($file["type"] == "image/jpg")
                || ($file["type"] == "image/pjpeg")
                || ($file["type"] == "image/x-png")
                || ($file["type"] == "image/png")
                ||($file["type"] == "application/x-zip-compressed")
                ||($file["type"] == "application/octet-stream")
                ||($file["type"] == "application/msword")
                ||($file["type"] == "application/vnd.ms-excel")
                ||($file["type"] == "application/vnd.ms-powerpoint")
                ||($file["type"] == "application/pdf")
                ||($file["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))//判断文件类型是否合法
            {
                uploadfile($id,$file, $type, $size, $url, $action,$teacherid,$filebiref);
            }
            else{
                $result = array("result"=>0,'msg'=>"文件类型错误！");
                $json = JSON($result);
                echo $json;
            }
        }
    }
    else{
        $result = array("result"=>0,'msg'=>"错误请求！");
        $json = JSON($result);
        echo $json;
    }


    function uploadfile($id,$file,$type,$size,$url,$action,$teacherid,$filebiref){
        $result = array();//定义输出数组
        $dir = "";
        //获取文件后缀名！
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        if ( ($file["size"] < $size) && in_array($extension, $type))//限制文件大小&&判断文件后缀名是否合法
        {
            if ($file["error"] > 0)
            {
                switch($file['error']) {
                    case 1:
                        // 文件大小超出了服务器的空间大小
                        $result = array("result"=>0,'msg'=>"文件大小超出了服务器的空间大小");
                        break;
                    case 2:
                        // 要上传的文件大小超出浏览器限制
                        $result = array("result"=>0,'msg'=>"要上传的文件大小超出浏览器限制");
                        break;

                    case 3:
                        // 文件仅部分被上传
                        $result = array("result"=>0,'msg'=>"文件仅部分被上传");
                        break;

                    case 4:
                        // 没有找到要上传的文件
                        $result = array("result"=>0,'msg'=>"没有找到要上传的文件");
                        break;

                    case 5:
                        // 服务器临时文件夹丢失
                        $result = array("result"=>0,'msg'=>"服务器临时文件夹丢失");
                        break;

                    case 6:
                        // 文件写入到临时文件夹出错
                        $result = array("result"=>0,'msg'=>"文件写入到临时文件夹出错");
                        break;
                }
                echo JSON($result);
            }
            else
            {
                $md5file = md5_file($_FILES["file"]["tmp_name"]);
                $typefile = $file["type"];
                $typesize = $file["size"] / 1024;
                if (!file_exists($url))
                {
                    if(!mkdir($url,0777,true)){
                        $dir = "目录创建完毕！";
                    }
                    else{
                        $result = array("result"=>0,'msg'=>"目录已创建！");
                        echo JSON($result);
                    }

                }
                //移动文件
                $string = end(explode('.', $file['name']));
                $randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999);
                $upload_file = iconv("UTF-8", "GB2312", $randname.".".$string);
                $res = move_uploaded_file($file["tmp_name"],$url . $upload_file);
                if($res)
                {
                    //论文照片
                    if($action == "projectpaper"){
                        Global $database;
                        $col = $database->select("project", [
                            "id"
                        ], [
                            "paperimgmd5" => $md5file
                        ]);
                        if($col){
                            $datas = $database->update("project", [
                                "paperimg" => $url . $randname,
                                "paperimgmd5" => $md5file
                            ],[
                                "id"=> $id
                            ]);
                            if($datas){
                                $result = array("result"=>0,'msg'=>"文件已经上传过,直接使用！");
                                echo JSON($result);
                                exit;
                            }
                            exit;
                        }
                        else{
                            $sum = $database->select("project", [
                                "paperimgmd5"
                            ],[
                                "id"=> $id
                            ]);
                            if($sum){
                                unlink($sum);
                                $datas = $database->update("project", [
                                    "paperimg" => $url . $randname.".".$string,
                                    "paperimgmd5" => $md5file
                                ],[
                                    "id"=> $id
                                ]);
                                if($datas){
                                    $result = array("result"=>0,'msg'=>"已覆盖原来的文件！");
                                    echo JSON($result);
                                    exit;
                                }
                            }else{
                                $datas = $database->update("project", [
                                    "paperimg" => $url . $randname,
                                    "paperimgmd5" => $md5file
                                ],[
                                    "id"=> $id
                                ]);
                                if($datas){
                                    $result = array("result"=>1,'msg'=>$dir."上传成功！");
                                    echo JSON($result);
                                    exit;
                                }
                            }

                        }
                    }
                    //获奖照片
                    if($action == "projectwinning"){
                        Global $database;
                        $col = $database->select("project", [
                            "id"
                        ], [
                            "winningimgmd5" => $md5file
                        ]);
                        if($col){
                            $result = array("result"=>0,'msg'=>"文件已经上传过！");
                            echo JSON($result);
                        }
                        else {
                            $sum = $database->select("project", [
                                "winningimg"
                            ],[
                                "id"=> $id
                            ]);
                            if($sum){
                                //unlink($sum);//删除文件用的
                                $datas = $database->update("project", [
                                    "winningimg" => $url . $randname.".".$string,
                                    "winningimgmd5" => $md5file
                                ],[
                                    "id"=> $id
                                ]);
                                if($datas){
                                    $result = array("result"=>0,'msg'=>"已覆盖原来的文件！");
                                    echo JSON($result);
                                }
                            }else{
                                $datas = $database->update("project", [
                                    "winningimg" => $url . $randname.".".$string,
                                    "winningimgmd5" => $md5file
                                ],[
                                    "id"=> $id
                                ]);
                                if($datas){
                                    $result = array("result"=>1,'msg'=>$dir."上传成功！");
                                    echo JSON($result);
                                }
                            }

                        }
                    }
                    //共享文件
                    if($action == "files"){
                        Global $database;
                        $col = $database->select("uploadfiles", [
                            "id"
                        ], [
                            "winningimgmd5" => $md5file
                        ]);
                        if($col){
                            $result = array("result"=>0,'msg'=>"文件已经上传过！");
                            echo JSON($result);
                        }
                        else{
                            $datas = $database->insert("uploadfiles", [
                                "filename" => $file['name'],
                                "filesize" => $typesize,
                                "filetype" => $typefile,
                                "filesrc" => $url . $randname.".".$string,
                                "teachername" =>$teacherid,
                                "uploaddate" =>$randname,
                                "md5file" =>$md5file,
                                "filebiref" =>$filebiref
                            ]);
                            if($datas){
                                $result = array("result"=>1,'msg'=>$dir."上传成功！");
                                echo JSON($result);
                            }
                        }
                    }
                }
                else{
                    $result = array("result"=>0,'msg'=>"移动缓存文件失败！");
                    echo JSON($result);
                }


            }
        }
        else
        {
            $result = array("result"=>0,'msg'=>"无法解析的文件类型！");
            echo JSON($result);
        }
    }

