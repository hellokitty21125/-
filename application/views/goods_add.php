<?php $this->load->view('header');?>
<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf">
        <strong class="am-text-primary am-text-lg">表单</strong> /
        <small>form</small>
      </div>
    </div>

    <hr>

    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab1">基本信息</a></li>
        <li><a href="#tab2">详细描述</a></li>
        <li><a href="#tab3">SEO 选项</a></li>
      </ul>

          <form action="save" method="post">
          	
	          <div class="am-g am-margin-top">
	            <div class="am-u-sm-4 am-u-md-2 am-text-right">
	              商品主图
	            </div>
	            <div class="am-u-sm-8 am-u-md-10">
	                <div class="am-form-group am-form-icon">
	                  <input type="input" value="http://img13.360buyimg.com/n4/s260x260_jfs/t889/319/780063454/143420/1699a5eb/55485c20N032c1bc2.jpg" name="avatar">
	                </div>
	                <div class="am-form-group am-form-icon">
	                  <input type="input" value="一款不一样的手机" name="title">
	                </div>
	            </div>
	          </div>
	          <input type="submit" class="am-btn am-btn-primary am-btn-xs" value="Submit" />
          </form>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              发布日期
            </div>
            <div class="am-u-sm-8 am-u-md-10">
              <form action="" class="am-form am-form-inline">
                <div class="am-form-group am-form-icon">
                  <i class="am-icon-calendar"></i>
                  <input type="date" class="am-form-field am-input-sm" placeholder="日期">
                </div>
              </form>
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              发布时间
            </div>
            <div class="am-u-sm-8 am-u-md-10">
              <form action="" class="am-form am-form-inline">
                <div class="am-form-group am-form-icon">
                  <i class="am-icon-calendar"></i>
                  <input type="datetime-local" class="am-form-field am-input-sm" placeholder="时间">
                </div>
              </form>
            </div>
          </div>

        </div>

        <div class="am-tab-panel am-fade" id="tab2">
          <form class="am-form">
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                文章标题
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                文章作者
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input type="text" class="am-input-sm">
              </div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                信息来源
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm">
              </div>
              <div class="am-hide-sm-only am-u-md-6">选填</div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                内容摘要
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm">
              </div>
              <div class="am-u-sm-12 am-u-md-6">不填写则自动截取内容前255字符</div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                内容描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="请使用富文本编辑插件"></textarea>
              </div>
            </div>

          </form>
        </div>

        <div class="am-tab-panel am-fade" id="tab3">
          <form class="am-form">
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                SEO 标题
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" class="am-input-sm">
              </div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                SEO 关键字
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" class="am-input-sm">
              </div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                SEO 描述
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <textarea rows="4"></textarea>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

    <div class="am-margin">
      
      <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
    </div>
  </div>

  <footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </footer>
</div>
<!-- content end -->
<?php $this->load->view('footer');?>