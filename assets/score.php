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
			<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $_SESSION['teachername'];?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
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
					<a href="score.php" class="active-menu waves-effect waves-dark"><i class="fa fa-qrcode"></i> 评分管理</a>
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
				<?php echo $_SESSION['noticetime']." 通知: ".$_SESSION['notice'];?></marquee>
		</div>
		<!--/. 公告  -->
		<div class="header">
			<h1 class="page-header">
				评分管理
			</h1>


		</div>
		<!--/. 主内容头部  -->
		<!--/. 主内容  -->
		<div id="page-inner">
			<div >
				<div class="col-sm-3">
					<button class="btn btn-info add" type="button" data-toggle="modal" data-target="#myModal">添加信息</button>
				</div>
				<!--/. 添加信息模态框  -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">添加评分信息</h4>
							</div>
							<div class="modal-body">

								<div ><label>任课班级：</label>	<input type="text" name="classno" id="classno" class="form-control" value=""/></div>
								<div ><label>教师名字：</label>	<input type="text" name="course" id="course"  class="form-control" value=""/></div>
								<div ><label>课程：</label>	<input type="text" name="teachername" id="teachername"  class="form-control" value=""/></div>
								<div ><label>学生评分：</label>	<input type="text" name="studentscore" id="studentscore" class="form-control" value=""/></div>
								<div ><label>毕业院校：</label>	<input type="text" name="school" id="school" class="form-control" value="" /></div>
								<div ><label>老师评分：</label>	<input type="text" name="teacherscore" id="teacherscore" class="form-control" value=""/></div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								<button type="button" id="add-btn" class="btn btn-primary" id="add-btn" data-dismiss="modal">确定</button>
							</div>

						</div>
					</div>
				</div>
				<!--/. 添加信息模态框  -->
				<!--/. 搜索信息  -->
				<div class="search">
					<form class="form-inline" role="form" action="" method=""><!--改-->
						<div class="form-group search">
							<input type="text" class="form-control"  id="reach" placeholder="请输入关键字"/>
							<button class="btn btn-info " id="reach-btn" class="form-control" type="button">搜索</button>
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
					<th>任课班级</th>
					<th>教师名字</th>
					<th>课程</th>
					<th>学生评分</th>
					<th>毕业院校</th>
					<th>老师评分</th>
					<th>删除</th>
					<th>修改</th>
				</tr>
				</thead>
				<tbody id="itemContainer">

				</tbody>
			</table>
			<div class="holder"></div>
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">修改评分信息</h4>
						</div>
						<div class="modal-body">

							<div ><label>任课班级：</label>	<input type="text" name="edit-classno" id="edit-classno" class="form-control" value="" /></div>
							<div ><label>教师名字：</label>	<input type="text" name="edit-course" id="edit-course"  class="form-control" value=""/></div>
							<div ><label>课程：</label>	<input type="text" name="edit-teachername" id="edit-teachername"  class="form-control" value=""/></div>
							<div ><label>学生评分：</label>	<input type="text" name="edit-studentscore" id="edit-studentscore" class="form-control" value=""/></div>
							<div ><label>毕业院校：</label>	<input type="text" name="edit-school" id="edit-school"  class="form-control" value=""/></div>
							<div ><label>老师评分：</label>	<input type="text" name="edit-teacherscore" id="edit-teacherscore" class="form-control" value=""/></div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							<button type="button" id="edit-btn" class="btn btn-primary" data-dismiss="modal" >确定</button>
						</div>

					</div>
				</div>
			</div>
			<!--/. 修改信息模态框  -->
			<!--/. 网页脚部  -->
			<footer><p>Copyright &copy;  2017 - 2020 宁德师范学院计算机系</p>


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
<script type="text/javascript">
	//判断是否是管理员
	localStorage.a = <?php if($_SESSION['identity']==1) echo 1 ;else echo 0;?>;
	/*显示表格的值 */

	$.ajax({
		url:"../server/grademanage.php",
		type: 'POST',
		data: {
			action: 'showall',

		},
		success: function(r) {
			var result = $.parseJSON(r);
			var s = '';
			for (var i = 0; i < result.length; i++)
			if(localStorage.a ==0){
				s += '<tr><td>' + result[i].id + '</td><td>' + result[i].class + '</td><td>' + result[i].teachername + '</td><td>'+ result[i].coursename + '</td>'
					+ '<td>' + result[i].studentscore + '</td><td>' + result[i].school + '</td>+<td>' + result[i].teacherscore + '</td>'+
					'<td style="display: none"><button class="btn btn-info " type="button" id="delete">删除</button></td>'+'<td style="display: none"><button class="btn btn-info " type="button" data-toggle="modal" name="edit" id="edit" data-target="#editModal">修改</button></td></tr>';
		}else{
				s += '<tr><td>' + result[i].id + '</td><td>' + result[i].class + '</td><td>' + result[i].teachername + '</td><td>'+ result[i].coursename + '</td>'
						+ '<td>' + result[i].studentscore + '</td><td>' + result[i].school + '</td>+<td>' + result[i].teacherscore + '</td>'+
						'<td><button class="btn btn-info " type="button" id="delete">删除</button></td>'+'<td><button class="btn btn-info " type="button" data-toggle="modal" name="edit" id="edit" data-target="#editModal">修改</button></td></tr>';
			}
			$('tbody').html(s);
		},


		error: function(){
			alert('发送失败');
		}
	});
</script>
<script type="text/javascript">
	// 		修改传值
	$(document).on('click','#edit-btn',function(){
		//alert($('#edit-course').val());
		$.ajax({
			url:"../server/grademanage.php",
			type: 'POST',
			data: {
				action:'update',
				id:localStorage.id,
				class:$('#edit-classno').val(),
				teachername:$('#edit-teachername').val(),
				coursename:$('#edit-course').val(),
				studentscore:$('#edit-studentscore').val(),
				school:$('#edit-school').val(),
				teacherscore:$('#edit-teacherscore').val()
			},
			success:function(r){
				var result = $.parseJSON(r);
				if(result.result == 1){

					for (var i = 1 ; i< $('tr').length;i++) {
						var x = $('tr').eq(i).find(' td:eq(0)');
						if( x.text()==localStorage.id ){
							$('tr').eq(i).find(' td:eq(1)').text($('#edit-classno').val());
							$('tr').eq(i).find(' td:eq(2)').text($('#edit-course').val());
							$('tr').eq(i).find(' td:eq(3)').text($('#edit-teachername').val());
							$('tr').eq(i).find(' td:eq(4)').text($('#edit-studentscore').val());
							$('tr').eq(i).find(' td:eq(5)').text($('#edit-school').val());
							$('tr').eq(i).find(' td:eq(6)').text($('#edit-teacherscore').val());

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



	})
</script>

<script type="text/javascript">
	/*将当前表格的值对应到模态框上*/

	$(document).on('click','button[name =edit]',function(){
		document.getElementById("edit-classno").value = $(this).parent().parent().children().eq(1).text();
		document.getElementById("edit-course").value = $(this).parent().parent().children().eq(2).text();
		document.getElementById("edit-teachername").value = $(this).parent().parent().children().eq(3).text();
		document.getElementById("edit-studentscore").value = $(this).parent().parent().children().eq(4).text();
		document.getElementById("edit-school").value = $(this).parent().parent().children().eq(5).text();
		document.getElementById("edit-teacherscore").value = $(this).parent().parent().children().eq(6).text();
		localStorage.id = $(this).parent().parent().children().eq(0).text();
	})

</script>
<script type="text/javascript">
	/*搜索
	 ------------------------------------*/
	$('#reach-btn').click(function(){
		var s = $('#reach').val();
		if(s==""){
			alert("请输入信息哦");
		}else {
			$.ajax({
				url: "../server/grademanage.php",
				type: 'POST',
				data: {
					action: 'select',
					class: s
				},
				success: function (r) {
					var result = $.parseJSON(r);
					if (result != null) {
						var s = '';
						for (var i = 0; i < result.length; i++)
							s += '<tr><td>' + result[i].id + '</td><td>' + result[i].class + '</td><td>' + result[i].coursename + '</td><td>' + result[i].teachername + '</td>'
									+ '<td>' + result[i].studentscore + '</td><td>' + result[i].shcool + '</td>+<td>' + result[i].teacherscore + '</td>' +
									'<td><button class="btn btn-info " type="button" id="delete">删除</button></td>' + '<td><button class="btn btn-info " type="button" data-toggle="modal" name="edit" id="edit" data-target="#editModal">修改</button></td></tr>';
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
</script>

<!--添加-->
<script type="text/javascript">

	$(document).on('click','#add-btn',function(){
		$.ajax({
			url:"../server/grademanage.php",
			type: 'POST',
			data: {
				action: 'add',
				id: localStorage.id,
				class:$("#classno").val(),
				teachername:$("#teachername").val(),
				studentscore:$("#studentscore").val(),
				coursename:$("#course").val(),
				school:$("#school").val(),
				teacherscore:$("#teacherscore").val()

			},
			success: function(r) {
				var result = $.parseJSON(r);
				if(result.result == 1){
					var s = '';
					var y =$('tr:last').find('td:eq(0)').text();
					var z = parseInt(y)+parseInt(1);

					s += '<tr><td>' + z+ '</td><td>' + $("#classno").val() + '</td><td>' + $("#course").val() + '</td><td>'+ $("#teachername").val()
							+ '</td><td>' + $("#studentscore").val()+ '</td><td>' + $("#school").val() + '</td>+<td>' + $("#teacherscore").val() + '</td>'+
							'<td><button class="btn btn-info " type="button" id="delete">删除</button></td>'+'<td><button class="btn btn-info " type="button" data-toggle="modal" name="edit" id="edit" data-target="#editModal">修改</button></td></tr>';
					$('tbody').append(s);}else{alert('添加失败')}
			},


			error: function(){
				alert('发送失败');
			}
		});
	})
</script>

<script type="text/javascript">
	if(localStorage.a == 1) { //管理员
		/*删除数据
		 ------------------------------------*/


		$(document).on('click','#delete',function() {


			if(confirm('确定要删除吗?')) {
				/*传入id后端，删除数据库中的数据
				 ------------------------------------*/
				var x = $(this);
				$.ajax({
					url: "../server/grademanage.php",
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