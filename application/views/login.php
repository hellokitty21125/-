<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>灵动云商城后台管理系统</title>
	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<meta name="apple-mobile-web-app-title" content="灵动云商"/>
	<link rel="apple-touch-icon-precomposed" href="/assets/images/logo180.png">
	<!-- icon for web -->
	<link rel="icon" type="image/png" href="/assets/images/logo180.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="https://cdn.bootcss.com/admin-lte/2.3.11/css/AdminLTE.min.css" rel="stylesheet">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link href="https://cdn.bootcss.com/admin-lte/2.3.11/css/skins/_all-skins.min.css" rel="stylesheet">
  <!-- jQuery 2.2.3 -->
  <script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6" style="margin-top: 150px;">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">用户登录</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form class="form-horizontal" action="verify" method="post">
							<div class="box-body">
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">用户名</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" name="username" value="" id="username" placeholder="请输入用户名">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">密码</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" name="password" value="" id="password" placeholder="请输入密码">
									</div>
								</div>
<!-- 		                <div class="form-group">
		                  <div class="col-sm-offset-2 col-sm-10">
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox"> Remember me
		                      </label>
		                    </div>
		                  </div>
		                </div>
		            -->		              </div>
		            <!-- /.box-body -->
		            <div class="box-footer">
		            	<button type="submit" class="btn btn-info">登录</button>
		            </div>
		            <!-- /.box-footer -->
		        </form>
		    </div>
		</div>
	</div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
