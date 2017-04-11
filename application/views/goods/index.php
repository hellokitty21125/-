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
		<div class="box box-success box-solid">
		  <div class="box-header with-border">
		    <h3 class="box-title"><?=$title?></h3>
		    <div class="box-tools pull-right">
		      <!-- Buttons, labels, and many other things can be placed here! -->
		      <!-- Here is a label for example -->
		      <a class="btn btn-sm btn-warning">添加</a>
		    </div><!-- /.box-tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
		    <table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>名称</th>
						<th>价格</th>
						<th>缩略图</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($result as $item):?>
					<tr>
						<td><?=$item->get('title')?></td>
						<td><?=$item->get('price')?></td>
						<td><?=$item->get('avatar')?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		  </div><!-- /.box-body -->
		  <div class="box-footer">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
		  </div><!-- box-footer -->
		</div><!-- /.box -->
    </section>
    <!-- /.content -->
  </div>