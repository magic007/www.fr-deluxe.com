<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<div id="container">
	<!--侧边 开始 -->
	<div id="aside">
		<a id="logo" href="/"><h1>路凯Deluxe</h1></a>
		<div class="menu">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e0e3c99abec8d5a3ffa3430d91f76a14&action=category&catid=%24CATEGORYS%5B%24top_parentid%5D%5Bcatid%5D&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$CATEGORYS[$top_parentid][catid],'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                          <?php $ij=0;?>
                         <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		         <ul>
                                <?php if($ij==0) { ?>
				       <li class="big_size">bigSize</li>
                                <?php } else { ?>
                                      <li class="small_size">smallSize</li>
                                 <?php } ?>
                                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2c5796102fc450f9052b61ce2eb23536&action=category&catid=%24r%5Bcatid%5D&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$r[catid],'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                                 <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                                         <li><a href="<?php echo $v['url'];?>" <?php if($catid==$v[catid]) { ?>class="current"<?php } ?>><span class="exceed"><?php echo $v['catname'];?></span></a></li>
                                 <?php $n++;}unset($n); ?>
                                 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                           <?php $ij++;?>
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
				<div class="big_pro"><img src=" <?php if($thumb =='') { ?><?php echo $lk_thumb['0']['url'];?><?php } else { ?><?php echo $thumb;?><?php } ?>" alt=" "></div>
				<div class="small_pro">
					<ul>      
                                             <?php if($thumb !='') { ?><li><img src=" <?php echo $thumb;?>" alt=" "></li><?php } ?><?php $n=1;if(is_array($lk_thumb)) foreach($lk_thumb AS $s) { ?><li><img src=" <?php echo $s['url'];?>" alt=""></li><?php $n++;}unset($n); ?>
                                       </ul>
				</div>
				<div class="details_pro">
					<h3><?php echo $title;?></h3>             
                                        <?php echo $content;?>
                                         <a class="buy" href="http://provence-fashion.taobao.com/" target="_blank">立即购买</a> 
                                 </div>
			</div>
           </div>
	</div>
					
	<!--主内容 结束 -->
</div>
<script type="text/javascript">
$(function(){
    $(".small_pro li").live("click",function(){
          $(".big_pro img").attr("src",$(this).find("img").attr("src"));
    });
});
</script>
<?php include template("content","footer"); ?>