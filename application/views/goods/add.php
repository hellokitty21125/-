<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="/bower_components/fex-webuploader/dist/webuploader.css">

<!--引入JS-->
<script type="text/javascript" src="/bower_components/fex-webuploader/dist/webuploader.js"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      商品管理
      <small>Goods</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/index"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active">商品管理</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">添加</h3>
                <div class="box-tools pull-right">
                <a class="btn btn-sm btn-info" href="index">返回列表</a>
                </div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="请输入商品的标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">价格</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" placeholder="0.0">
                  </div>
                </div>
                <!-- upload -->
                  <div id="uploader-demo">
                      <!--用来存放item-->
                      <div id="fileList" class="uploader-list"></div>
                      <div id="filePicker">选择图片</div>
                  </div>

                  <script>
                      $(function() {
                            var $ = jQuery,
                              $list = $('#fileList'),
                              $btn = $('#ctlBtn'),
                              state = 'pending',
                              uploader;
                        // 初始化Web Uploader
                        var uploader = WebUploader.create({

                            // 选完文件后，是否自动上传。
                            auto: true,

                            // swf文件路径
                            swf: '/bower_components/fex-webuploader/dist/Uploader.swf',

                            // 文件接收服务端。
                            server: 'http://webuploader.duapp.com/server/fileupload.php',

                            // 选择文件的按钮。可选。
                            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                            pick: {
                              id: '#filePicker',
                              multiple: false
                            },

                            // 只允许选择图片文件。
                            accept: {
                                title: 'Images',
                                extensions: 'gif,jpg,jpeg,bmp,png',
                                mimeTypes: 'image/*'
                            }
                        });

                        // 当有文件添加进来的时候
                        uploader.on( 'fileQueued', function( file ) {
                            var $li = $(
                                    '<div id="' + file.id + '" class="file-item thumbnail">' +
                                        '<img>' +
                                        '<div class="info">' + file.name + '</div>' +
                                    '</div>'
                                    ),
                                $img = $li.find('img');


                            // $list为容器jQuery实例
                            $list.append( $li );

                            // 创建缩略图
                            // 如果为非图片文件，可以不用调用此方法。
                            // thumbnailWidth x thumbnailHeight 为 100 x 100
                            var thumbnailWidth = 100;
                            var thumbnailHeight = 100;
                            uploader.makeThumb( file, function( error, src ) {
                                if ( error ) {
                                    $img.replaceWith('<span>不能预览</span>');
                                    return;
                                }

                                $img.attr( 'src', src );
                            }, thumbnailWidth, thumbnailHeight );
                        });

                        // 文件上传过程中创建进度条实时显示。
                        uploader.on( 'uploadProgress', function( file, percentage ) {
                            var $li = $( '#'+file.id ),
                                $percent = $li.find('.progress span');

                            // 避免重复创建
                            if ( !$percent.length ) {
                                $percent = $('<p class="progress"><span></span></p>')
                                        .appendTo( $li )
                                        .find('span');
                            }

                            $percent.css( 'width', percentage * 100 + '%' );
                        });

                        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                        uploader.on( 'uploadSuccess', function( file ) {
                            $( '#'+file.id ).addClass('upload-state-done');
                        });

                        // 文件上传失败，显示上传出错。
                        uploader.on( 'uploadError', function( file ) {
                            var $li = $( '#'+file.id ),
                                $error = $li.find('div.error');

                            // 避免重复创建
                            if ( !$error.length ) {
                                $error = $('<div class="error"></div>').appendTo( $li );
                            }

                            $error.text('上传失败');
                        });

                        // 完成上传完了，成功或者失败，先删除进度条。
                        uploader.on( 'uploadComplete', function( file ) {
                            $( '#'+file.id ).find('.progress').remove();
                        });
                        
                      });
                  </script>
                <!-- /upload -->
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info">保存</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </section>
  <!-- /.content -->
</div>
<script>
  $(function () { 
    $("[data-toggle='popover']").popover();
  });
</script>