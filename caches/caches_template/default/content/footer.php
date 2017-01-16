<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div id="footer">
	<div class="copyright fl"><a href="http://www.miibeian.gov.cn" target="_blank">粤ICP备10236400号</a>    2013 Deluxe.net 版权所有</div>
	<div id="nav">
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                <a <?php if($catid == '') { ?>class="current"<?php } ?> href="/">首页</a>
               <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                   <a <?php if($catid == $v[catid] or $v[catid]==$CATEGORYS[$catid]['parentid'] or $v[catid]==$CATEGORYS[$top_parentid][catid]) { ?>class="current"<?php } ?> href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a>
               <?php $n++;}unset($n); ?>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>
</div>
</body>
</html>