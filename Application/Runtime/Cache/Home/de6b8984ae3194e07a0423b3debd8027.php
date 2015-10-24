<?php if (!defined('THINK_PATH')) exit();?><span id="FormDetailContent">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><strong><?php echo ($vo['question']); ?></strong><br/>
		<?php echo nl2br(htmlspecialchars($vo['answer']));?></p><?php endforeach; endif; else: echo "" ;endif; ?>
</span>