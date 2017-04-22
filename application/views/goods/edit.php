<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="/bower_components/fex-webuploader/dist/webuploader.css">
<link rel="stylesheet" type="text/css" href="/assets/css/webuploader.css">
<!--引入JS-->
<script type="text/javascript" src="/bower_components/fex-webuploader/dist/webuploader.js"></script>
<!-- Select2 -->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
<script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="../dashboard/index"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active">商品管理</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">修改</h3>
                <div class="box-tools pull-right">
                <a class="btn btn-sm btn-primary" href="index">返回列表</a>
                </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <form id="edit-form" class="form-horizontal" action="update" method="post">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="title" id="title" placeholder="请输入商品的标题" value="<?=$goods->get('title')?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">分类</label>
                  <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;" name="category">
                      <option></option>
                      <?php foreach ($categories as $category):?>
                        <optgroup label="<?=$category->get('title')?>">
                          <?php foreach ($category->children as $child):?>
                            <option value="<?=$child->get('objectId')?>" <?=$goods->get('category')->get('objectId') == $child->get('objectId') ? 'selected' : ''?>><?=$child->get('title')?></option>
                          <?php endforeach;?>
                        </optgroup>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">价格</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="price" id="price" placeholder="0.0" value="<?=$goods->get('price')?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="isHot" class="col-sm-2 control-label">推荐</label>
                  <div class="col-sm-8">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary <?=$goods->get('isHot') == true ? 'active' : ''?>">
                        <input type="radio" name="isHot" value="1" id="option1" autocomplete="off"> 推荐
                      </label>
                      <label class="btn btn-primary <?=$goods->get('isHot') == false ? 'active' : ''?>">
                        <input type="radio" name="isHot" value="0" id="option3" autocomplete="off"> 不推荐
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="isNew" class="col-sm-2 control-label">新品</label>
                  <div class="col-sm-8">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary  <?=$goods->get('isNew') == true ? 'active' : ''?>">
                        <input type="radio" name="isNew" value="1" autocomplete="off"> 新品
                      </label>
                      <label class="btn btn-primary <?=$goods->get('isNew') == false ? 'active' : ''?>">
                        <input type="radio" name="isNew" value="0" autocomplete="off"> 非新品
                      </label>
                    </div>
                  </div>
                </div>
                <!-- upload images -->
                <div class="form-group">
                  <label for="fileList" class="col-sm-2 control-label">产品图</label>
                  <div class="col-sm-8">
                    <div class="row">
                        <style type="text/css">
                          .image {
                            width: 100%;
                          }
                          .mask {
                            position: absolute;
                            width: 100%;
                            height: 15%;
                            background: #eee;
                            opacity: 0.8;
                            bottom: 0;
                            left: 0;
                          }
                          .fa-block {
                            display: block;
                            margin-top: 2px;
                          }
                          .gallery {
                            border: 1px solid #eee;
                            border-radius: 3px;
                            margin-left: 4px;
                            margin-right: 4px;
                          }
                        </style>
                        <?php $i = 0;?>
                        <?php foreach ($goods->get('images') as $image):?>
                          <div class="col-md-3 gallery">
                              <img class="image" src="<?=$image?>" />
                              <div class="mask"><i class="fa fa-2x fa-block fa-trash-o text-center"></i></div>
                          </div>
                        <?php endforeach;?>
                    </div>
                    <div id="uploader-demo">
                      <!--用来存放item-->
                      <div id="imagesList" class="uploader-list"></div>
                      <div class="btns">
                        <div id="imagesPicker">选择图片</div>
                          <button id="ctlBtn" type="button" class="hidden btn btn-default">开始上传</button>
                      </div>
                      <!-- input控件用于保存详情图片的url -->
                      <input type="hidden" name="images" value="[]" id="images" />
                    </div>
                  </div>
                </div>
                <!-- upload detail -->
                <div class="form-group">
                  <label for="fileList" class="col-sm-2 control-label">描述图</label>
                  <div class="col-sm-8">
                    <div id="uploader">
                      <div class="queueList">
                        <div id="dndArea" class="placeholder">
                          <div id="filePicker"></div>
                          <p>或将照片拖到这里，单次最多可选300张</p>
                        </div>
                      </div>
                      <div class="statusBar" style="display:none;">
                          <div class="progress">
                              <span class="text">0%</span>
                              <span class="percentage"></span>
                          </div><div class="info"></div>
                          <div class="btns">
                              <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                          </div>
                      </div>
                    </div>
                    <!-- input控件用于保存详情图片的url -->
                    <input type="hidden" name="detail" value="" id="detail" />

                    <!-- .upload -->
                  </div>
                </div>
                  <script src="/assets/js/goods/edit.js"></script>
                <!-- /upload -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary">保存</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </section>
  <script type="text/javascript">
    var origin_images = <?=json_encode($goods->get('images'))?>;
    $('.mask').click(function () {
      // 当前图片url路径
      var url = $(this).parent().find('img').attr('src');
      // 查找出数组元素索引，并移除它，之所以这么做，是因为由于splice会改会数组索引。
      origin_images.splice(url.indexOf(origin_images), 1);
      $(this).parent().remove();
    });

    $('#edit-form').submit(function (e) {
      // 渲染回#images控件，用于post传值
      var images_control_value = JSON.parse($('#images').val());
      var new_images = images_control_value.concat(origin_images);
      $('#images').val(JSON.stringify(new_images));
        e.submit();
      });
  </script>
  <!-- /.content -->
</div>