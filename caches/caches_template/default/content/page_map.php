<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>
		<div class="menu">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		         <ul>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <li><a href="<?php echo $r['url'];?>" <?php if($catid==$r[catid]) { ?>class="current"<?php } ?>><?php echo $r['catname'];?></a></li>
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
			<div class="sitemap">
                                 <?php $n=1;if(is_array(subcat(0))) foreach(subcat(0) AS $v) { ?>
                               <?php if($v[catid]!=$catid) { ?>
                               <div class="sitemap_con">
                                    <h4><a href="<?php echo $v['url'];?>"><b>[<?php echo $v['catname'];?>]</b></a></h4>
                                     <?php if($v[child]!=0) { ?>
                                     <?php $n=1;if(is_array(subcat($v[catid]))) foreach(subcat($v[catid]) AS $vs) { ?>
                                            <a href="<?php echo $vs['url'];?>"><?php echo $vs['catname'];?></a>
                                             <?php if($vs[child]!=0) { ?>
                                                 <?php $n=1;if(is_array(subcat($vs[catid]))) foreach(subcat($vs[catid]) AS $vl) { ?>
                                                      <a href="<?php echo $vl['url'];?>"><?php echo $vl['catname'];?></a>
                                                 <?php $n++;}unset($n); ?>
                                             <?php } ?>
                                      <?php $n++;}unset($n); ?>
                                      <?php } ?>
                               </div>
                               <?php } ?>
                            <?php $n++;}unset($n); ?>
		            
               
		        </div>
                </div>
	</div>
	<!--主内容 结束 -->
</div>
<?php include template("content","footer"); ?>