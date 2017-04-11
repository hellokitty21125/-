<!-- <template>
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
</template> -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			商品管理
			<small>Goods</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
			<li class="active">商品管理</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><?=$title?></h3>
				<div class="box-tools pull-right">
					<a class="btn btn-sm btn-info" href="add">添加</a>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>缩略图</th>
							<th>名称</th>
							<th>分类</th>
							<th>价格</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($result as $item):?>
							<tr>
								<td><img width="40" height="40" src="<?=$item->get('avatar')?>" class="popover-show" data-container="body" data-placement="bottom" data-toggle="popover" data-html="true" data-trigger="hover focus click" data-content="<img src='<?=$item->get('avatar')?>' />" /></td>
								<td><?=$item->get('title')?></td>
								<td><?=$item->get('category') == NULL ? '' : $item->get('category')->get('title')?></td>
								<td><?=$item->get('price')?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div><!-- /.box-body -->
			<div class="box-footer">
			<?=$pagination;?>
			</div><!-- box-footer -->
		</div><!-- /.box -->
	</section>
	<!-- /.content -->
</div>
<script>
	$(function () { 
		$("[data-toggle='popover']").popover();
	});
</script>