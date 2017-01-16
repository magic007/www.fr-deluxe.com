<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>
		<div class="menu">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=025d9a797e99c7ffec0e90a9cdc4713d&action=category&catid=%24CATEGORYS%5B%24catid%5D%5B%27parentid%27%5D&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$CATEGORYS[$catid]['parentid'],'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		         <ul>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <li><a href="<?php echo $r['url'];?>" <?php if($r[catid]==$catid) { ?>class="current"<?php } ?>><?php echo $r['catname'];?></a></li>
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
                         <h4><?php echo $CATEGORYS[$catid]['catname'];?></h4>
			<div class="content">
				            <h2><?php echo $title;?></h2>
				            <p><?php if($thumb) { ?><img class="fr" src="<?php echo $thumb;?>" width="192" height="234" alt=" "><?php } ?><?php echo strip_tags($content);?></p>
			</div>
		</div>
	</div>
	<!--主内容 结束 -->
</div>
<?php include template("content","footer"); ?>