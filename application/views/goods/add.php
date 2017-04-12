<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="/bower_components/fex-webuploader/dist/webuploader.css">
<link rel="stylesheet" type="text/css" href="/assets/css/webuploader.css">

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
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" placeholder="请输入商品的标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">价格</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="price" placeholder="0.0">
                  </div>
                </div>
                <!-- upload avatar -->
                <div class="form-group">
                  <label for="fileList" class="col-sm-2 control-label">主图</label>
                  <div class="col-sm-8">
                    <div id="uploader-demo">
                      <!--用来存放item-->
                      <div id="fileList" class="uploader-list"></div>
                      <div id="filePicker">选择图片</div>
                      <!-- input控件用于保存头像的objectId -->
                      <input type="hidden" name="avatar" value="" id="avatar" />
                    </div>
                  </div>
                </div>
                <!-- upload detail -->
                <div class="form-group">
                  <label for="thumbList" class="col-sm-2 control-label">多图</label>
                  <div class="col-sm-8">
                    <div id="uploader-thumb">
                      <!--用来存放item-->
                      <div id="thumbList" class="uploader-list"></div>
                      <div id="thumbPicker">选择图片</div>
                      <!-- input控件用于保存头像的objectId -->
                      <input type="hidden" name="detail" value="" id="detail" />
                    </div>
                  </div>
                </div>
                  

                  <script>
                    $(function() {

                      /* 配置 */
                      var config = {
                        // 选完文件后，是否自动上传。
                        auto: true,
                        // swf文件路径
                        swf: '/bower_components/fex-webuploader/dist/Uploader.swf',
                        // 文件接收服务端。
                        server: '../upload/avatar',
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
                        },
                        // 缩略图选项
                        thumb: {
                          width: 220,
                          height: 220,
                          // 图片质量，只有type为`image/jpeg`的时候才有效。
                          quality: 100
                        }
                      };
                      /* .配置 */
                      
                      /* 回调 */
                      // 上传列队添加成员
                      // var fileQueued = function( file ) {
                      //     var $li = $(
                      //             '<div id="' + file.id + '" class="file-item thumbnail">' +
                      //                 '<img>' +
                      //                 '<div class="info">' + file.name + '</div>' +
                      //             '</div>'
                      //             ),
                      //         $img = $li.find('img');
                      //     $list.html( $li );
                      //     // 创建缩略图
                      //     // 如果为非图片文件，可以不用调用此方法。
                      //     // thumbnailWidth x thumbnailHeight 为 100 x 100
                      //     uploader.makeThumb( file, function( error, src ) {
                      //         if ( error ) {
                      //             $img.replaceWith('<span>不能预览</span>');
                      //             return;
                      //         }

                      //         $img.attr( 'src', src );
                      //     });
                      // }
                      // 上传进度监听
                      var uploadProgress = function( file, percentage ) {
                          var $li = $( '#'+file.id ),
                              $percent = $li.find('.progress span');

                          // 避免重复创建
                          if ( !$percent.length ) {
                              $percent = $('<p class="progress"><span></span></p>')
                                      .appendTo( $li )
                                      .find('span');
                          }
                          $percent.css( 'width', percentage * 100 + '%' );
                      }
                      // 上传失败回调
                      var uploadError = function( file ) {
                          var $li = $( '#'+file.id ),
                              $error = $li.find('div.error');
                          // 避免重复创建
                          if ( !$error.length ) {
                              $error = $('<div class="error"></div>').appendTo( $li );
                          }
                          $error.text('上传失败');
                      };
                      // 上传完成
                      var uploadComplete = function( file ) {
                          $( '#'+file.id ).find('.progress').remove();
                      }
                      // 上传成功
                      var uploadSuccess = function(file) {
                        $( '#'+file.id ).addClass('upload-state-done');
                      }
                      /* .回调 */

                      
                      /* 单图上传 */
                      // 初始化Web Uploader
                      var uploader = WebUploader.create(config);
                      // 上传回调
                        uploader.on( 'fileQueued', function( file ) {
                          var $li = $(
                                  '<div id="' + file.id + '" class="file-item thumbnail">' +
                                      '<img>' +
                                      '<div class="info">' + file.name + '</div>' +
                                  '</div>'
                                  ),
                              $img = $li.find('img');
                            $('#fileList').html( $li );
                            // 创建缩略图
                            // 如果为非图片文件，可以不用调用此方法。
                            // thumbnailWidth x thumbnailHeight 为 100 x 100
                            uploader.makeThumb( file, function( error, src ) {
                                if ( error ) {
                                    $img.replaceWith('<span>不能预览</span>');
                                    return;
                                }

                                $img.attr( 'src', src );
                            });
                          })
                        .on( 'uploadProgress', uploadProgress)
                        .on( 'uploadError', uploadError)
                        .on( 'uploadComplete', uploadComplete)
                        .on( 'uploadSuccess', function( file, response ) {
                            uploadSuccess(file);
                            $('#avatar').attr('value', response.fileId);
                            console.log(response.fileId);
                        });

                        var multipleConfig = config;
                        multipleConfig.pick = {
                          id: '#thumbPicker',
                          multiple: true
                        };
                        /* 多图上传 */
                        // 初始化Web Uploader
                        var uploaderDetail = WebUploader.create(multipleConfig);
                        // 上传回调
                        uploaderDetail.on( 'fileQueued', function( file ) {
                          var $li = $(
                                  '<div id="' + file.id + '" class="file-item thumbnail">' +
                                      '<img>' +
                                      '<div class="info">' + file.name + '</div>' +
                                  '</div>'
                                  ),
                              $img = $li.find('img');
                              console.log($li);
                            $('#thumbList').html( $li );
                            // 创建缩略图
                            // 如果为非图片文件，可以不用调用此方法。
                            // thumbnailWidth x thumbnailHeight 为 100 x 100
                            uploaderDetail.makeThumb( file, function( error, src ) {
                                if ( error ) {
                                    $img.replaceWith('<span>不能预览</span>');
                                    return;
                                }

                                $img.attr( 'src', src );
                            });
                          })
                          .on( 'uploadProgress', uploadProgress)
                          .on( 'uploadError', uploadError)
                          .on( 'uploadComplete', uploadComplete)
                          .on( 'uploadSuccess', function( file, response ) {
                              uploadSuccess(file);
                              $('#avatar').attr('value', response.fileId);
                              console.log(response.fileId);
                          });
                    });
                  </script>
                <!-- /upload -->

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