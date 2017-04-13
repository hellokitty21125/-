<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
    <h1>
      <?=$title?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('dashboard/index')?>"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active"><?=$title?></li>
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
							<th>删除</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($result as $item):?>
							<tr>
								<td><img width="40" height="40" src="<?=$item->get('avatar')?>" class="popover-show" data-container="body" data-placement="bottom" data-toggle="popover" data-html="true" data-trigger="hover focus click" data-content="<img src='<?=$item->get('avatar')?>' />" /></td>
								<td><?=$item->get('title')?></td>
								<td><?=$item->get('category') == NULL ? '' : $item->get('category')->get('title')?></td>
								<td><?=$item->get('price')?></td>
								<td><button type="button" class="btn btn-info" class="popover-show">删除</button></td>
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