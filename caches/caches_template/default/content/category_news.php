<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>
		<div class="menu">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cd609b7b9ac4fadeb42b5e7f97a5f535&action=category&catid=%24catid&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$catid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		         <ul>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                 <?php if($n==1){$catids=$r[catid];}?>
                                <li><a href="<?php echo $r['url'];?>" <?php if($n==1) { ?>class="current"<?php } ?>><?php echo $r['catname'];?></a></li>
                         <?php $n++;}unset($n); ?>
	                  </ul>
                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
	</div>
	<!--侧边 结束 -->
	<!--主内容 开始 -->
	<div id="main">
         <?php include template("content","middle"); ?>
                 <div class="news">
                        <h4><?php echo $CATEGORYS[$catids]['catname'];?></h4>
			<div class="content">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=706d91037f2d14d21a686a887283bcc2&action=lists&catid=%24catids&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catids,'order'=>'listorder ASC','limit'=>'20',));}?>
                                 <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
				            <ul class="news_list">
					               <li><span><?php echo date('Y-m-d H:i:s',$v['inputtime']);?></span><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li>
				             </ul>
                                  <?php $n++;}unset($n); ?>
                                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
		</div>
	</div>
	<!--主内容 结束 -->
</div>
<?php include template("content","footer"); ?>