
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
	<!-- 先引入 Vue -->
	<script src="https://cdn.bootcss.com/vue/2.2.4/vue.js"></script>
	<!-- 引入组件库 -->
	<script src="https://cdn.bootcss.com/element-ui/1.2.5/index.js"></script>
	<!-- 引入ele.css -->
	<link href="https://cdn.bootcss.com/element-ui/1.2.5/theme-default/index.css" rel="stylesheet">
	<style type="text/css">
		.breadcrumb {
			padding: 25px 10px;
		}
		.menu {
			margin: 15px 10px;
		}
	</style>
</head>
<body>
	<div id="app">
		<!-- 顶部导航 -->
		<el-menu theme="dark" mode="horizontal">
			<el-menu-item index="1"><a href="/">首页</a></el-menu-item>
			<el-menu-item index="2"><a href="http://www.it577.net" target="_blank">关于</a></el-menu-item>
		</el-menu>
		<el-row class="tac" :gutter="10">
			<el-col :span="6">
				<!-- 左侧菜单 -->
				<el-menu default-active="1" class="el-menu-vertical-demo menu" @open="handleOpen" @close="handleClose" default-openeds="[1]">
					<el-submenu index="1">
						<template slot="title"><i class="el-icon-message"></i>商品管理</template>
						<el-menu-item-group>
							<template slot="title"></template>
							<el-menu-item index="1-1">商品列表</el-menu-item>
							<el-menu-item index="1-2">添加商品</el-menu-item>
						</el-menu-item-group>
						<el-menu-item-group title="分组2">
							<el-menu-item index="1-3">分类管理</el-menu-item>
						</el-menu-item-group>
						<el-submenu index="1-4">
							<template slot="title">快递单打印</template>
							<el-menu-item index="1-4-1">选项1</el-menu-item>
						</el-submenu>
					</el-submenu>
					<el-menu-item index="2"><i class="el-icon-menu"></i>订单管理</el-menu-item>
					<el-menu-item index="3"><i class="el-icon-setting"></i>系统设置</el-menu-item>
				</el-menu>
			</el-col>
			<el-col :span="18">
				<!-- 主体区域 -->
				<el-breadcrumb class="breadcrumb" separator="/">
					<el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
					<el-breadcrumb-item>活动管理</el-breadcrumb-item>
					<el-breadcrumb-item>活动列表</el-breadcrumb-item>
					<el-breadcrumb-item>活动详情</el-breadcrumb-item>
				</el-breadcrumb>
				<!-- 表格/表单 -->
	<template>
		<el-table
		:data="tableData3"
		border
		stripe
		tooltip-effect="dark"
		style="width: 100%"
		@selection-change="handleSelectionChange">
			<el-table-column
			  type="selection"
			  width="55">
			</el-table-column>
			<el-table-column
			  label="日期"
			  width="120">
			  <template scope="scope">{{ scope.row.date }}</template>
			</el-table-column>
			<el-table-column
			  prop="name"
			  label="姓名"
			  width="120">
			</el-table-column>
			<el-table-column
			  prop="address"
			  label="地址"
			  show-overflow-tooltip>
			</el-table-column>
		</el-table>
	</template>

			</el-col>
		</el-row>
	</div>
	<script type="text/javascript">
		var app = new Vue({
			el: '#app',
			data: {
				tableData3: [{
					date: '2016-05-03',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-02',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-04',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-01',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-08',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-06',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}, {
					date: '2016-05-07',
					name: '王小虎',
					address: '上海市普陀区金沙江路 1518 弄'
				}],
				multipleSelection: []
			}
		});
	</script>
</body>
</html>