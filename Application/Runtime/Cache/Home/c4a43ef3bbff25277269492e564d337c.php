<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src='/Public/js/jquery.min.js'></script>
    <link rel="stylesheet" href="/Public/css/common.css">
    <title>小党</title>
</head>
<body>
    <h3>push 文件与图像上传</h3>
    <hr>

    <p>1: h5上传方式</p>




<form id="uploadForm" name="form1" method="post" enctype="multipart/form-data" action="/app/push/ajax_base_file">
    <input type="file" name="image" id='file'>
    <input type="text" name="text" id='text_'>
    <input type="button" value="提交" id="form_push"/>
</form>

<br>


<script>
    $("#form_push").click(function(){

        // 获取文件对像
         var $files = $('#file')[0].files[0];
         // 构造FormData对象
        var formData = new FormData();

        formData.append('file',$files);
        // csrf
        // formData.append('csrfmiddlewaretoken','{{csrf_token}}')


         // XMLHttpRequest 对象

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=callback;

        xhr.open("post", SCOPE.pushUrl, true);

        xhr.send(formData);



        // 回调函数
        function callback(){

            if(xhr.readyState==4){
                
                if(xhr.status==200){   
            //纯文本数据的接受方法   
                    var message=xhr.responseText; 
                    alert(message)
                }
            }
        }

        
    })
    
</script>


<script>

// 地址
var SCOPE={
    pushUrl :"/index.php/home/push/ajax_base_save",

}

    
</script>
</body>
</html>