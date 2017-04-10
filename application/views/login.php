<html>
<head>
	<title>灵动云商后台管理系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- 先引入 Vue -->
	<script src="https://cdn.bootcss.com/vue/2.2.4/vue.js"></script>
	<!-- 引入组件库 -->
	<script src="https://cdn.bootcss.com/element-ui/1.2.5/index.js"></script>
	<!-- 引入ele.css -->
	<link href="https://cdn.bootcss.com/element-ui/1.2.5/theme-default/index.css" rel="stylesheet">
	<style>
		body {
			background: #f6f6f6;
		}
	</style>
</head>
<body>
	<div id="app" style="margin-top: 100px;">
		<!-- 定义行 -->
		<el-row :gutter="20">
			<el-col :xs="{offset:2, span:20}" :sm="{offset:6, span:12}" :md="{offset:8, span:8}">
				<el-card class="box-card">
					<div slot="header" class="clearfix">
						<span style="line-height: 36px;">管理员登录</span>
					</div>
					<div>
						<el-form :label-position="labelPosition" label-width="80px" :model="formLabelAlign" action="verify">

							<el-form-item label="用户名">
								<el-input v-model="user.username"></el-input>
								<template slot="prepend">用户名</template>
							</el-form-item>

							<el-form-item label="密码">
								<el-input type="password" v-model="user.password"></el-input>
							</el-form-item>

							<el-form-item>
								<el-button native-type="submit" type="primary">登录</el-button>
							</el-form-item>

						</el-form>
					</div>
				</el-card>
			</el-col>
		</el-row>
	</div>
	<script>
  // export default {
  //   data() {
  //     return {
  //       labelPosition: 'right',
  //       formLabelAlign: {
  //         name: '',
  //         region: '',
  //         type: ''
  //       }
  //     };
  //   }
  // }
  new Vue({
  	el: '#app',
  	data: {
  		labelPosition: 'right',
  		user: {
  			username: '',
  			password: ''
  		}
  	}
  });
</script>
</body>
</html>