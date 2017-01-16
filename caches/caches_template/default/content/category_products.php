<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>

		<div class="menu">
               <?php $ij = 0;?>
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cd609b7b9ac4fadeb42b5e7f97a5f535&action=category&catid=%24catid&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$catid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		         <ul>
                                 <?php if($ij==0) { ?>
				 <li class="big_size">bigSize</li>
                                  <?php } else { ?>
                                 <li class="small_size">smallSize</li>
                                  <?php } ?>
                                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2c5796102fc450f9052b61ce2eb23536&action=category&catid=%24r%5Bcatid%5D&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$r[catid],'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                                 <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                                         <?php if($ij==0){$catids= $v[catid];}?>
                                         <li><a href="<?php echo $v['url'];?>" <?php if($ij==0) { ?>class="current"<?php } ?>><span class="exceed"><?php echo $v['catname'];?></span></a></li>
                                          <?php $ij++;?>
                                 <?php $n++;}unset($n); ?>
                                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	                  </ul>
                                
                          <?php $n++;}unset($n); ?>
                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
	</div>
	<!--侧边 结束 -->
	<!--主内容 开始 -->
	<div id="main">
         <?php include template("content","middle"); ?>
                 <div class="pro">
                         <div class="content">
                                           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=93467d25f19482884c37a0df8b64a700&action=lists&catid=%24catids&num=4&order=listorder+ASC&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catids,'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
                                            <ul class="list_pro">                                 
                                            <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                                            <?php if($v[thumb] !='' or $v[lk_thumb]!='') { ?>
                                            <?php eval("\$arr=" . $v[lk_thumb] . ";");?>
                                                  <li><a href="<?php echo $v['url'];?>"><img src=" <?php if($v[thumb] =='') { ?><?php echo $arr['0']['url'];?><?php } else { ?><?php echo $v['thumb'];?><?php } ?>" alt=""></a></li>
                                             <?php } ?>
                                             <?php $n++;}unset($n); ?>
                                             </ul>
                                             <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                         </div>
		</div>
	</div>
	<!--主内容 结束 -->
</div>
<?php include template("content","footer"); ?>