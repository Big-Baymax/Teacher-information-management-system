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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>John Doe</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<ul id="dropdown1" class="dropdown-content">

		<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                     <li>
                        <a href="information-analysis.php" class="active-menu waves-effect waves-dark"><i class="fa fa-table"></i> 综合信息分析</a>
                    </li>
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
                                <a href="Resources-sharing.php" class="waves-effect waves-dark">教学资源共享</a>
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
	          				&nbsp;&nbsp;水平滚动字幕内容</marquee>
			</div>
		        <!--/. 公告  -->
            <div id="page-inner">
           
             <div id="main" style="width: 100%;height:500px;"></div>
           
			 
		    <div class="holder"></div>
			<footer style="margin-top: 120px;"><p>Copyright &copy; 2017.Company name All rights reserved.</p>
				
        
				</footer>
				<!--/. 网页脚部  -->
            </div>
            <!-- /. 主内容容器  -->
        </div>
       
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
    <script src="js/my.js"></script>
    <script src="js/jPages.js"></script>
    
    
    <!-- Echart Js -->
	<script type="text/javascript" src="js/echarts.js" ></script>
	
    <script type="text/javascript">
    	
    	var a = new Array();
		var b = new Array();
		var c = new Array();
		var d = new Array();
		var e = new Array();
    	$.ajax({
        url:"test.php",
        type: 'POST',
        async: false,
        data: {
            action: 'showall',
            
        },
        success: function(result) {
            var result = JSON.parse(result);
            console.log(result);
            console.log(result[1].paper);
            if(result!=null) {
                for(var i =0;i<result.length;i++){
                	a[i]=result[i].teachername;
                	b[i]=result[i].paper;
                	c[i]=result[i].winning;
                	d[i]=result[i].studentscore;
                	e[i]=result[i].teacherscore;
                }
                	
            }
            else {
                alert(result.msg);
            }
        },
        error: function(){
        	alert('发送失败');
        }
    	})
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
       option = {
		    title: {
		        text: '综合信息分析'
		    },
		    tooltip: {
		        trigger: 'axis'
		    },
		    legend: {
		        data:['论文情况','获奖情况','学生评分','老师评分']
		    },
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    toolbox: {
		    	show: true,
		        feature: {
		            dataZoom: {
		                yAxisIndex: 'none'
		            },
		            dataView: {readOnly: false},
		            magicType: {type: ['line', 'bar']},
		            restore: {},
		            saveAsImage: {}
		        }
		    },   
      
		    xAxis: {
		        type: 'category',
		        data: a
		    },
		    yAxis: {
		        type: 'value'
		    },
		    series: [
		        {
		        	name:"论文情况",
		        	type:'line',
		        	data:b
		        },
		        {
		        	
		        	name:"获奖情况",
		        	type:'line',
		        	data:c
		       
		        },
		        {
		        	
		        	name:"学生评分",
		        	type:'line',
		        	data:d
		       
		        },
		        {
		        	
		        	name:"老师评分",
		        	type:'line',
		        	data:e
		       
		        }
		        
		        
		    ]
		};
 		
 		
 	

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
        
      
    </script>
    
</body>

</html>