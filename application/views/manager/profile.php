<!--引入CSS-->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
<!-- Select2 -->
<script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      修改资料
      <small>Manager</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/index"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active">修改资料</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">修改资料</h3>
                <div class="box-tools pull-right">
                </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <form class="form-horizontal" action="save" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">旧密码</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="请输入旧密码" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">新密码</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="请输入新密码" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">重复密码</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" placeholder="再次请输入新密码" value="">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary">保存</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </section>
  <!-- /.content -->
</div>
<script>
  $(function () { 
    $('select').select2({
    });

  });
</script>