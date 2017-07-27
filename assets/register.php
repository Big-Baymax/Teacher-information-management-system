<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="./img/logo.png" media="screen" />
	<title>教师信息管理系统-注册</title>
	<!-- CSS文件引入-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
	<!-- Bootstrap Styles-->
	<link href="css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="css/font-awesome.css" rel="stylesheet" />

	<!-- Custom Styles-->
	<link href="css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="js/Lightweight-Chart/cssCharts.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<div id="wrapper"style=" margin-top: 20px;">
	<div style=" margin: 0 auto;width: 500px;">
		<div class="card">
			<div class="card-action">
				<i class="large material-icons"  style="color: #30cc7b;float: left;">insert_chart</i> <span class="login-head">教师管理系统</span>
			</div>
			<div class="card-content" style="padding-bottom: 5px;margin-top: 30px;">
				<form class="col s12" action="" method="">
					<div class="row">
						<div class="input-field col s12">
							<input id="username" type="text" placeholder="请输入教师号" class="validate">
							<label for="username">教师号：</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate">
							<label for="password">密码：</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password2" type="password" class="validate">
							<label for="password2">确认密码：</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="reset" class="btn btn-lg btn-default" style="float: right;" name="cancel" id="cancel" value="取消" />
							<input type="button" class="btn btn-lg btn-success" style="float: right;margin-right: 15px;" name="login" id="login" value="注册" />
							<a href="login.php">已有账号.</a>
						</div>
					</div>
				</form>
				<div class="clearBoth"></div>
			</div>
		</div>
	</div>
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
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

<script type="text/javascript">


	/*注册用户  0表示不成功 1表示成功
	 ------------------------------------*/
	$("#login").click(function(){
		if($('#username').val()!=""&&$('#password').val()!=""&&$('#password2').val()!="")
		{
			if($('#password2').val()!=$('#password').val()){
				$('#password2').after('<p style="color:red;">确认密码与密码不符</p>');

			}else{
				$.ajax({
					url:"../server/Logincheck.php",//检查是否登录成功的地址
					type: 'POST',
					data: {
						action: 'register',
						name:$('#username').val(),
						psd:$('#password').val(),
					},
					success: function(r) {
						if(!r.match("^\{(.+:.+,*){1,}\}$"))
						{
							alert('请求失败！请检查网络或联系管理员。');
						}else{
							var result = $.parseJSON(r);
							if(result.result == 1) {
								alert(result.msg);
								window.location.href ="login.php";
							}
							else {
								alert(result.msg);
							}
						}

					},
					error: function(){
						alert('发送失败');
					}
				});
			}
		}
		else{
			alert('不能为空');
		}


	});
</script>
</body>

</html>