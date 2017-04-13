<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="/bower_components/fex-webuploader/dist/webuploader.css">
<link rel="stylesheet" type="text/css" href="/assets/css/webuploader.css">
<link rel="stylesheet" href="/assets/node_modules/admin-lte/plugins/select2/select2.min.css">
<!-- Select2 -->
<script src="/assets/node_modules/admin-lte/plugins/select2/select2.full.min.js"></script>
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
            <form class="form-horizontal" action="save" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" placeholder="请输入商品的标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">分类</label>
                  <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;" name="category">
                      <option selected="selected" value="">请选择</option>
                      <?foreach ($categoris as $parent => $children):?>
                        <optgroup label="<?=$parent?>">
                          <?foreach ($children as $child):?>
                            <option value="<?=$child->get('objectId')?>"><?=$child->get('title')?></option>
                          <?endforeach;?>
                        </optgroup>
                      <?endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">价格</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="price" placeholder="0.0">
                  </div>
                </div>
                <div class="form-group">
                  <label for="isHot" class="col-sm-2 control-label">价格</label>
                  <div class="col-sm-8">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary active">
                        <input type="radio" name="isHot" value="true" id="option1" autocomplete="off" checked> 推荐
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="isHot" value="false" id="option3" autocomplete="off"> 不推荐
                      </label>
                    </div>
                  </div>
                </div>
                <!-- upload images -->
                <div class="form-group">
                  <label for="fileList" class="col-sm-2 control-label">产品图</label>
                  <div class="col-sm-8">
                    <div id="uploader-demo">
                      <!--用来存放item-->
                      <div id="imagesList" class="uploader-list"></div>
                      <div class="btns">
                        <div id="imagesPicker">选择图片</div>
                          <button id="ctlBtn" type="button" class="hidden btn btn-default">开始上传</button>
                      </div>
                      <!-- input控件用于保存头像的objectId -->
                      <input type="hidden" name="avatar" value="" id="avatar" />
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
                    <!-- .upload -->
                  </div>
                </div>
                  

                  <script>
                    $(function() {
                      // select2
                      $(".select2").select2({
                        placeholder: "请选择分类"
                      });
                      /* 配置 */
                      var config = {
                        // 选完文件后，是否自动上传。
                        auto: false,
                        // swf文件路径
                        swf: '/bower_components/fex-webuploader/dist/Uploader.swf',
                        // 文件接收服务端。
                        server: '../upload/avatar',
                        // 选择文件的按钮。可选。
                        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                        pick: {
                          id: '#imagesPicker',
                          multiple: true
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
                      var fileQueued = function( file ) {
                          var $li = $(
                                  '<div id="' + file.id + '" class="file-item thumbnail">' +
                                      '<img>' +
                                      '<div class="info">' + file.name + '</div>' +
                                  '</div>'
                                  ),
                              $img = $li.find('img');
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
                          return $li;
                      }
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

                      
                      /* 主图多图上传 */
                      // 初始化Web Uploader
                      var imageUploader = WebUploader.create(config);
                      // 上传回调
                        imageUploader.on( 'fileQueued', function( file ) {
                            $li = fileQueued(file);
                            $('#ctlBtn').removeClass('hidden');
                            if (config.pick.multiple) {
                              $('#imagesList').append( $li );
                            } else {
                              $('#imagesList').html( $li );
                            }
                          })
                        .on( 'uploadProgress', uploadProgress)
                        .on( 'uploadError', uploadError)
                        .on( 'uploadComplete', uploadComplete)
                        .on( 'uploadSuccess', function( file, response ) {
                            uploadSuccess(file);
                            $('#avatar').attr('value', response.fileId);
                            console.log(response.fileId);
                        });
                        $('#ctlBtn').click(function () {
                          imageUploader.upload();
                        });


                        // 详情多图上传
                        $wrap = $('#uploader'),

                        // 图片容器
                        $queue = $('<ul class="filelist"></ul>')
                            .appendTo( $wrap.find('.queueList') ),

                        // 状态栏，包括进度和控制按钮
                        $statusBar = $wrap.find('.statusBar'),

                        // 文件总体选择信息。
                        $info = $statusBar.find('.info'),

                        // 上传按钮
                        $upload = $wrap.find('.uploadBtn'),

                        // 没选择文件之前的内容。
                        $placeHolder = $wrap.find('.placeholder'),

                        // 总体进度条
                        $progress = $statusBar.find('.progress').hide(),

                        // 添加的文件数量
                        fileCount = 0,

                        // 添加的文件总大小
                        fileSize = 0,

                        // 优化retina, 在retina下这个值是2
                        ratio = window.devicePixelRatio || 1,

                        // 缩略图大小
                        thumbnailWidth = 110 * ratio,
                        thumbnailHeight = 110 * ratio,

                        // 可能有pedding, ready, uploading, confirm, done.
                        state = 'pedding',

                        // 所有文件的进度信息，key为file id
                        percentages = {},

                        supportTransition = (function(){
                            var s = document.createElement('p').style,
                                r = 'transition' in s ||
                                      'WebkitTransition' in s ||
                                      'MozTransition' in s ||
                                      'msTransition' in s ||
                                      'OTransition' in s;
                            s = null;
                            return r;
                        })(),

                        // WebUploader实例
                        uploader;

                      if ( !WebUploader.Uploader.support() ) {
                          alert( 'Web Uploader 不支持您的浏览器！如果你使用的是IE浏览器，请尝试升级 flash 播放器');
                          throw new Error( 'WebUploader does not support the browser you are using.' );
                      }

                      // 实例化
                      uploader = WebUploader.create({
                          pick: {
                              id: '#filePicker',
                              label: '点击选择图片'
                          },
                          dnd: '#uploader .queueList',
                          paste: document.body,

                          accept: {
                              title: 'Images',
                              extensions: 'gif,jpg,jpeg,bmp,png',
                              mimeTypes: 'image/*'
                          },

                          // swf文件路径
                          swf: '/bower_components/fex-webuploader/dist/Uploader.swf',

                          disableGlobalDnd: true,

                          chunked: true,
                          server: '../upload/avatar',
                          fileNumLimit: 300,
                          fileSizeLimit: 5 * 1024 * 1024,    // 200 M
                          fileSingleSizeLimit: 1 * 1024 * 1024    // 50 M
                      });

                      // 添加“添加文件”的按钮，
                      uploader.addButton({
                          id: '#filePicker2',
                          label: '继续添加'
                      });

                      // 当有文件添加进来时执行，负责view的创建
                      function addFile( file ) {
                          var $li = $( '<li id="' + file.id + '">' +
                                  '<p class="title">' + file.name + '</p>' +
                                  '<p class="imgWrap"></p>'+
                                  '<p class="progress"><span></span></p>' +
                                  '</li>' ),

                              $btns = $('<div class="file-panel">' +
                                  '<span class="cancel">删除</span>').appendTo( $li ),
                              $prgress = $li.find('p.progress span'),
                              $wrap = $li.find( 'p.imgWrap' ),
                              $info = $('<p class="error"></p>'),

                              showError = function( code ) {
                                  switch( code ) {
                                      case 'exceed_size':
                                          text = '文件大小超出';
                                          break;

                                      case 'interrupt':
                                          text = '上传暂停';
                                          break;

                                      default:
                                          text = '上传失败，请重试';
                                          break;
                                  }

                                  $info.text( text ).appendTo( $li );
                              };

                          if ( file.getStatus() === 'invalid' ) {
                              showError( file.statusText );
                          } else {
                              // @todo lazyload
                              $wrap.text( '预览中' );
                              uploader.makeThumb( file, function( error, src ) {
                                  if ( error ) {
                                      $wrap.text( '不能预览' );
                                      return;
                                  }

                                  var img = $('<img src="'+src+'">');
                                  $wrap.empty().append( img );
                              }, thumbnailWidth, thumbnailHeight );

                              percentages[ file.id ] = [ file.size, 0 ];
                              file.rotation = 0;
                          }

                          file.on('statuschange', function( cur, prev ) {
                              if ( prev === 'progress' ) {
                                  $prgress.hide().width(0);
                              } else if ( prev === 'queued' ) {
                                  $li.off( 'mouseenter mouseleave' );
                                  $btns.remove();
                              }

                              // 成功
                              if ( cur === 'error' || cur === 'invalid' ) {
                                  console.log( file.statusText );
                                  showError( file.statusText );
                                  percentages[ file.id ][ 1 ] = 1;
                              } else if ( cur === 'interrupt' ) {
                                  showError( 'interrupt' );
                              } else if ( cur === 'queued' ) {
                                  percentages[ file.id ][ 1 ] = 0;
                              } else if ( cur === 'progress' ) {
                                  $info.remove();
                                  $prgress.css('display', 'block');
                              } else if ( cur === 'complete' ) {
                                  $li.append( '<span class="success"></span>' );
                              }

                              $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
                          });

                          $li.on( 'mouseenter', function() {
                              $btns.stop().animate({height: 30});
                          });

                          $li.on( 'mouseleave', function() {
                              $btns.stop().animate({height: 0});
                          });

                          $btns.on( 'click', 'span', function() {
                              var index = $(this).index(),
                                  deg;

                              switch ( index ) {
                                  case 0:
                                      uploader.removeFile( file );
                                      return;

                                  case 1:
                                      file.rotation += 90;
                                      break;

                                  case 2:
                                      file.rotation -= 90;
                                      break;
                              }

                              if ( supportTransition ) {
                                  deg = 'rotate(' + file.rotation + 'deg)';
                                  $wrap.css({
                                      '-webkit-transform': deg,
                                      '-mos-transform': deg,
                                      '-o-transform': deg,
                                      'transform': deg
                                  });
                              } else {
                                  $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
                                  // use jquery animate to rotation
                                  // $({
                                  //     rotation: rotation
                                  // }).animate({
                                  //     rotation: file.rotation
                                  // }, {
                                  //     easing: 'linear',
                                  //     step: function( now ) {
                                  //         now = now * Math.PI / 180;

                                  //         var cos = Math.cos( now ),
                                  //             sin = Math.sin( now );

                                  //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                                  //     }
                                  // });
                              }


                          });

                          $li.appendTo( $queue );
                      }

                      // 负责view的销毁
                      function removeFile( file ) {
                          var $li = $('#'+file.id);

                          delete percentages[ file.id ];
                          updateTotalProgress();
                          $li.off().find('.file-panel').off().end().remove();
                      }

                      function updateTotalProgress() {
                          var loaded = 0,
                              total = 0,
                              spans = $progress.children(),
                              percent;

                          $.each( percentages, function( k, v ) {
                              total += v[ 0 ];
                              loaded += v[ 0 ] * v[ 1 ];
                          } );

                          percent = total ? loaded / total : 0;

                          spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
                          spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
                          updateStatus();
                      }

                      function updateStatus() {
                          var text = '', stats;

                          if ( state === 'ready' ) {
                              text = '选中' + fileCount + '张图片，共' +
                                      WebUploader.formatSize( fileSize ) + '。';
                          } else if ( state === 'confirm' ) {
                              stats = uploader.getStats();
                              if ( stats.uploadFailNum ) {
                                  text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                                      stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                              }

                          } else {
                              stats = uploader.getStats();
                              text = '共' + fileCount + '张（' +
                                      WebUploader.formatSize( fileSize )  +
                                      '），已上传' + stats.successNum + '张';

                              if ( stats.uploadFailNum ) {
                                  text += '，失败' + stats.uploadFailNum + '张';
                              }
                          }

                          $info.html( text );
                      }

                      function setState( val ) {
                          var file, stats;

                          if ( val === state ) {
                              return;
                          }

                          $upload.removeClass( 'state-' + state );
                          $upload.addClass( 'state-' + val );
                          state = val;

                          switch ( state ) {
                              case 'pedding':
                                  $placeHolder.removeClass( 'element-invisible' );
                                  $queue.parent().removeClass('filled');
                                  $queue.hide();
                                  $statusBar.addClass( 'element-invisible' );
                                  uploader.refresh();
                                  break;

                              case 'ready':
                                  $placeHolder.addClass( 'element-invisible' );
                                  $( '#filePicker2' ).removeClass( 'element-invisible');
                                  $queue.parent().addClass('filled');
                                  $queue.show();
                                  $statusBar.removeClass('element-invisible');
                                  uploader.refresh();
                                  break;

                              case 'uploading':
                                  $( '#filePicker2' ).addClass( 'element-invisible' );
                                  $progress.show();
                                  $upload.text( '暂停上传' );
                                  break;

                              case 'paused':
                                  $progress.show();
                                  $upload.text( '继续上传' );
                                  break;

                              case 'confirm':
                                  $progress.hide();
                                  $upload.text( '开始上传' ).addClass( 'disabled' );

                                  stats = uploader.getStats();
                                  if ( stats.successNum && !stats.uploadFailNum ) {
                                      setState( 'finish' );
                                      return;
                                  }
                                  break;
                              case 'finish':
                                  stats = uploader.getStats();
                                  if ( stats.successNum ) {
                                      alert( '上传成功' );
                                  } else {
                                      // 没有成功的图片，重设
                                      state = 'done';
                                      location.reload();
                                  }
                                  break;
                          }

                          updateStatus();
                      }

                      uploader.onUploadProgress = function( file, percentage ) {
                          var $li = $('#'+file.id),
                              $percent = $li.find('.progress span');

                          $percent.css( 'width', percentage * 100 + '%' );
                          percentages[ file.id ][ 1 ] = percentage;
                          updateTotalProgress();
                      };

                      uploader.onFileQueued = function( file ) {
                          fileCount++;
                          fileSize += file.size;

                          if ( fileCount === 1 ) {
                              $placeHolder.addClass( 'element-invisible' );
                              $statusBar.show();
                          }

                          addFile( file );
                          setState( 'ready' );
                          updateTotalProgress();
                      };

                      uploader.onFileDequeued = function( file ) {
                          fileCount--;
                          fileSize -= file.size;

                          if ( !fileCount ) {
                              setState( 'pedding' );
                          }

                          removeFile( file );
                          updateTotalProgress();

                      };

                      uploader.on( 'all', function( type ) {
                          var stats;
                          switch( type ) {
                              case 'uploadFinished':
                                  setState( 'confirm' );
                                  break;

                              case 'startUpload':
                                  setState( 'uploading' );
                                  break;

                              case 'stopUpload':
                                  setState( 'paused' );
                                  break;

                          }
                      });

                      uploader.onError = function( code ) {
                          alert( 'Eroor: ' + code );
                      };

                      $upload.on('click', function() {
                          if ( $(this).hasClass( 'disabled' ) ) {
                              return false;
                          }

                          if ( state === 'ready' ) {
                              uploader.upload();
                          } else if ( state === 'paused' ) {
                              uploader.upload();
                          } else if ( state === 'uploading' ) {
                              uploader.stop();
                          }
                      });

                      $info.on( 'click', '.retry', function() {
                          uploader.retry();
                      } );

                      $info.on( 'click', '.ignore', function() {
                          alert( 'todo' );
                      } );

                      $upload.addClass( 'state-' + state );
                      updateTotalProgress();
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