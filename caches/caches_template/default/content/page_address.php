<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>
		<div class="menu">
                <?php if($CATEGORYS[$catid]['parentid']!=0){$catids =$CATEGORYS[$catid]['parentid'];}else{$catids = $catid;}?>
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a4cb0cb0d1eece7513cd2c2980cae5e4&action=category&catid=%24catids&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$catids,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		         <ul>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <?php if(($CATEGORYS[$catid]['parentid']==0 and $n==1)or($CATEGORYS[$catid]['parentid'] !=0 and $catid==$r[catid])){$catids=$r[catid];}?>
                                <li><a href="<?php echo $r['url'];?>" <?php if(($CATEGORYS[$catid]['parentid'] !=0 and $catid==$r[catid]) or ($CATEGORYS[$catid]['parentid']==0 and $n==1) ) { ?>class="current"<?php } ?>><?php echo $r['catname'];?></a></li>
                         <?php $n++;}unset($n); ?>
	                  </ul>
                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
	</div>
	<!--侧边 结束 -->
	<!--主内容 开始 -->
	<div id="main">
         <?php include template("content","middle"); ?>
                  <div class="address mod_center">
			<div class="mod_vertical">
				<div class="mod_middle">
                                       <?php if($catids==18) { ?><div class="address_text"><?php } ?>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1c2d47c6d64bdb434568d89be6acb725&sql=SELECT+%2A+FROM+lk_page+where+catid%3D%24catids\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM lk_page where catid=$catids LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                                        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                                               <?php echo $val['content'];?>
                                        <?php $n++;}unset($n); ?>
                                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                         <?php if($catids==18) { ?></div><?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!--主内容 结束 -->
</div>
<?php include template("content","footer"); ?>