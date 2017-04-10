<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
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
			<el-col :sm="{span: 6}" :md="{span: 6}" :lg="{span: 4}">
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
			<el-col :sm="{span: 18}" :md="{span: 18}" :lg="{span: 20}">
				<!-- 主体区域 -->
				<el-breadcrumb class="breadcrumb" separator="/">
					<el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
					<el-breadcrumb-item>活动管理</el-breadcrumb-item>
					<el-breadcrumb-item>活动列表</el-breadcrumb-item>
					<el-breadcrumb-item>活动详情</el-breadcrumb-item>
				</el-breadcrumb>
				<!-- 表格/表单 -->
				<?=$content_for_layout?>
			</el-col>
		</el-row>
	</div>
	<script src="<?=base_url("assets/js/{$js}.js")?>"></script>
</body>
</html>