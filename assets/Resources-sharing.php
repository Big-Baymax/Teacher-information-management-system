<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php session_start();
    //判断是否登录
    if($_SESSION['teacherid']){

    }
    else{
        Header("Location: login.php");
    }
    ?>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Disposition" content="attachment;">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Disposition" content="attachment;">
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.png" media="screen" />
    <title>教师信息管理系统</title>
    <!-- CSS文件引入-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="css/font-awesome.css" rel="stylesheet" />

    <!-- Custom Styles-->
    <link href="css/custom-styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/jPages.css"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="js/Lightweight-Chart/cssCharts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src= "js/html5.js"></script>
</head>

<body>
<!--/. 大容器  -->
<div id="wrapper">
    <!--/. 顶部导航栏  -->
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="large material-icons">insert_chart</i> <strong>教师管理系统</strong></a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li><a class="dropdown-button waves-effect waves-dark" href="#" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $_SESSION['teachername'];?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </nav>
    <ul id="dropdown1" class="dropdown-content">

        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!--/. 顶部导航栏  -->
    <!--/. 左侧导航栏  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a class="waves-effect waves-dark" href="index.php"><i class="fa fa-dashboard"></i> 教师基础信息管理</a>
                </li>
                <li>
                    <a href="Teaching-information.php" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> 教学信息管理</a>
                </li>
                <li>
                    <a href="Teaching-performance.php" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> 教学业绩管理</a>
                </li>
                <li>
                    <a href="score.php" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> 评分管理</a>
                </li>

                <li>
                    <a href="Scientific-achievements.php" class="waves-effect waves-dark"><i class="fa fa-table"></i> 科研成果管理</a>
                </li>
                <!--                    <li>-->
                <!--                        <a href="information-analysis.php" class="waves-effect waves-dark"><i class="fa fa-table"></i> 综合信息分析</a>-->
                <!--                    </li>-->
                <li>
                    <a href="javascript:void(0)" id="System-setting" class="waves-effect waves-dark"><i class="fa fa-edit"></i> 系统管理<span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <!--<li>
                            <a href="System-setting.html" class="waves-effect waves-dark">系统初始化设置</a>
                        </li>-->
                        <li>
                            <a href="User-setting.php" class="waves-effect waves-dark">系统用户管理</a>
                        </li>
                        <li>
                            <a href="Announcement-management.php" class="waves-effect waves-dark">公告发布管理</a>
                        </li>
                        <li>
                            <a href="Resources-sharing.php" class="active-menu waves-dark">教学资源共享</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. 左侧导航栏  -->
    <!--/. 主内容容器    -->
    <!--/. 主内容头部  -->
    <div id="page-wrapper">
        <!--/. 公告  -->
        <div>
            <marquee direction="left" align="bottom" height="25" width="100%"
                     style="margin-top: 10px;" onmouseout="this.start()" onmouseover="this.stop()"
                     scrollamount="2" scrolldelay="1"><img src="img/laba.gif" height="20px" />
                <?php echo $_SESSION['noticetime']." 通知: ".$_SESSION['notice'];?></marquee>
        </div>
        <!--/. 公告  -->
        <div class="header">
            <h1 class="page-header">
                教师课件资源共享
            </h1>


        </div>
        <!--/. 主内容头部  -->
        <!--/. 主内容  -->
        <div id="page-inner">
            <div >
                <div class="col-sm-3 ">
                    <button class="btn btn-info add" type="button" data-toggle="modal" data-target="#myModal">添加信息</button>
                </div>
                <!--/. 添加信息模态框  -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">上传教学资料</h4>
                            </div>
                            <div class="modal-body">

                                <div><fieldset id="">

                                        <input type="file" name="resources-material" id="resources-file" value="教学" />

                                    </fieldset>	</div>
                                <div ><label>内容简介：</label>	<textarea id="filebiref" name="Notice-content" rows="" cols="" class="form-control"></textarea></div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" id="add-btn">确定</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/. 添加信息模态框  -->
                <!--/. 搜索信息  -->
                <div class="search">
                    <form class="form-inline" role="form" action="" method=""><!--改-->
                        <div class="form-group search">
                            <input type="text" class="form-control" placeholder="请输入你的查询条件" id="reach"/>
                            <button class="btn btn-info " class="form-control " type="button" id="reach-btn">搜索</button>
                        </div >
                    </form>
                </div>
                <!--/. 搜索信息  -->
            </div>
            <!--/. 显示信息的表格  -->
            <table class="table table-striped table-hover table-bordered  dataTable no-footer" id="dataTables-example">
                <thead>
                <tr>
                    <th>id</th>
                    <th>文件名</th>
                    <th>上传者</th>
                    <th>上传日期</th>
                    <th>文件简介</th>
                    <th>下载</th>
                    <th>删除</th>
                </tr>
                </thead >
                <tbody id="itemContainer">

                </tbody>
            </table>
            <!--/. 显示信息的表格  -->
            <div class="holder"></div>
            <!--/. 修改信息模态框  -->
            <!--/. 网页脚部  -->
            <footer><p>Copyright &copy; 2017 - 2020 宁德师范学院计算机系</p>


            </footer>
        </div>
        <!--/. 网页脚部  -->
    </div>
    <!-- /. 主内容容器  -->
</div>
<!-- /. 大容器  -->
<!-- 脚本导入-->
<!-- jQuery Js -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="js/bootstrap.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<!-- Metis Menu Js -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="js/custom-scripts.js"></script>
<script src="js/jPages.js"></script>
<script type="text/javascript">
    //判断是否是管理员
    localStorage.a = <?php if($_SESSION['identity']==1) echo 1 ;else echo 0;?>;
    /*显示表格的值 */
    $.ajax({
        url:"../server/uploadfiles.php",
        type: 'POST',
        data: {
            action: 'showall',
        },
        success: function(r) {

            var result = $.parseJSON(r);
            var s = '';
            for (var i = 0; i < result.length; i++) {
                if (result[i].identity == 1) {
                    result[i].identity = '是';
                }
                else {
                    result[i].identity = '否';
                }
                s += '<tr><td>' + result[i].id + '</td><td>' + result[i].filename + '</td><td>' + result[i].teachername + '</td><td>' + result[i].uploaddate +'</td><td>' + result[i].filebiref + '</td>'+
                    '<td><a href='+result[i].filesrc+' class="btn btn-info " type="button" id="dowload" download ="' + result[i].filename + '" target="_blank" onclick="downloadFile("'+result[i].filesrc+'");">下载</a></td>' + '<td><button class="btn btn-info" type="button" id="delete">删除</button></td></tr>';
                $('tbody').html(s);
            }
        },
        error: function(){
            alert('发送失败');
        }
    });
    function savepic() {
        if (document.all.a1 == null) {
            objIframe = document.createElement("IFRAME");
            document.body.insertBefore(objIframe);
            objIframe.outerHTML = "<iframe name=a1 style='width:400px;hieght:300px' src=" + imageName.href + "></iframe>";
            re = setTimeout("savepic()", 1)
        }
        else {
            clearTimeout(re)
            pic = window.open(imageName.href, "a1")
            pic.document.execCommand("SaveAs")
            document.all.a1.removeNode(true)
        }
    }
        function downloadFile(url) {
            try{
                var elemIF = document.createElement("iframe");
                elemIF.src = url;
                elemIF.style.display = "none";
                document.body.appendChild(elemIF);
            }catch(e){

            }
        }
    //修改传值
    $(document).on('click','#edit-btn',function(){
        if($('#edit-test').is(':checked')){
            var power = 1;
        }
        else{
            var power = 0;
        }
        $.ajax({
            url:"../server/Logincheck.php",
            type: 'POST',
            data: {
                action:'update',
                id:localStorage.id,
                name:$('#edit-uesrname').val(),
                psd:$('#edit-password').val(),
                power:power,

            },
            success:function(r){

                var result = $.parseJSON(r);
                if(result.result == 1){
                    if(power==1){
                        power ='是';
                    }else
                    {
                        power ='否'
                    }
                    for (var i = 1 ; i< $('tr').length;i++) {
                        var x = $('tr').eq(i).find(' td:eq(0)');
                        if( x.text()==localStorage.id ){
                            $('tr').eq(i).find(' td:eq(1)').text($('#edit-uesrname').val());
                            $('tr').eq(i).find(' td:eq(2)').text($('#edit-password').val());
                            $('tr').eq(i).find(' td:eq(3)').text(power);

                        }
                    }
                }
                else{
                    alert('修改失败');
                }
            },
            error: function(){
                alert('发送失败');
            }
        });
    });
    /*将当前表格的值对应到模态框上*/

    $(document).on('click','button[name =edit]',function(){
        var power = $(this).parent().parent().children().eq(3).text();
        if(power == '是'){
            document.getElementById("edit-test").checked = true;
        }
        else{
            document.getElementById("edit-test").checked = false;
        }

        document.getElementById("edit-uesrname").value = $(this).parent().parent().children().eq(1).text();
        document.getElementById("edit-password").value = $(this).parent().parent().children().eq(2).text();
        localStorage.id = $(this).parent().parent().children().eq(0).text();
    });
    /*搜索
     ------------------------------------*/
    $('#reach-btn').click(function(){
        var s = $('#reach').val();
        if(s==""){
            alert("请输入信息哦");
        }else {
            $.ajax({
                url: "../server/uploadfiles.php",
                type: 'POST',
                data: {
                    action: 'select',
                    filename: s
                },
                success: function (r) {

                    var result = $.parseJSON(r);
                    if (result.result != 0) {
                        var s = '';
                        for (var i = 0; i < result.length; i++)
                            s += '<tr><td>' + result[i].id + '</td><td>' + result[i].filename + '</td><td>' + result[i].teachername + '</td><td>' + result[i].uploaddate + '</td><td>' + result[i].filebiref + '</td>' +
                                '<td><a href=' + result[i].filesrc + ' class="btn btn-info " type="button" id="dowload">下载</a></td>' + '<td><button class="btn btn-info" type="button" id="delete">删除</button></td></tr>';
                        $('tbody').html(s);
                    }

                    else {
                        alert('查无此纪录');
                    }
                },
                error: function () {
                    alert('发送失败');
                }
            });
        }
    });
    //添加

    $(document).on('click','#add-btn',function(){
        var fileData = new FormData();
        fileData.append("file", $("#resources-file")[0].files[0]);
        fileData.append("id",localStorage.id );
        fileData.append("filebiref",$("#filebiref").val() );
        $.ajax({
            url: "../server/upload.php?action=files",
            type: 'POST',
            data: fileData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                window.console.log("正在上传！");
            },
            success: function (r) {
                var result = $.parseJSON(r);
                if (result.result == 1) {
                    $(".btn.btn-default").click();
                    location.reload();
                    alert("上传成功！");
                } else {
                    alert(result.msg);
                }
            }
        });
    })
    if(localStorage.a == 1) { //管理员
        /*删除数据
         ------------------------------------*/


        $(document).on('click','#delete',function() {


            if(confirm('确定要删除吗?')) {
                /*传入id后端，删除数据库中的数据
                 ------------------------------------*/
                var x = $(this);
                $.ajax({
                    url: "../server/uploadfiles.php",
                    type: 'POST',
                    data: {
                        action: 'delete',
                        id: x.parent().parent().children().eq(0).text()
                    },
                    success: function(r) {
                        var result = $.parseJSON(r);
                        if(result.result == 1) {

                            x.parent().parent().css("background-color", "#ccc");
                            x.fadeOut(400, function() {
                                x.parent().parent().remove();
                            });
                        } else {
                            alert('删除失败');
                        }
                    },
                    error: function() {
                        alert('发送失败');
                    }
                });

            };


        });
    };
</script>
</body>

</html>