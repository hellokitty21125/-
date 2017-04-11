<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>灵动云商城后台管理系统</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- jQuery 2.2.3 -->
<script src="/assets/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
			<div class="offset-md-3 col-md-6">
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
		                    <input type="text" class="form-control" name="username" value="lendoo" id="username" placeholder="请输入用户名">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="password" class="col-sm-2 control-label">密码</label>

		                  <div class="col-sm-10">
		                    <input type="password" class="form-control" name="password" value="lendoo888" id="password" placeholder="请输入密码">
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/assets/node_modules/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/assets/node_modules/admin-lte/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/assets/node_modules/admin-lte/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/assets/node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/node_modules/admin-lte/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/assets/node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/assets/node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/assets/node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/node_modules/admin-lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/node_modules/admin-lte/dist/js/app.min.js"></script>
</body>
</html>
