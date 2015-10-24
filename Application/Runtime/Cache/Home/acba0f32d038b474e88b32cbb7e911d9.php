<?php if (!defined('THINK_PATH')) exit(); if(is_array($acList)): $i = 0; $__LIST__ = $acList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
	<div class="am-panel am-panel-default">
	  <div class="am-panel-bd am-panel-padding4">
	    <center>
	    	<a href="<?php echo U('/Home/Activity/detail').'?id='.$vo['id'];?>">
	    		<span class="am-badge am-badge-secondary activity-online"><?php echo ($vo['online']?'线上活动':'线下活动'); ?></span>
	    		<img class="am-radius activity-img" src="/Public/Uploads/<?php echo ($vo['img']); ?>" alt=""/>
	    	</a>
	    </center>
	    <center class="activity-time">活动时间：<span class="am-badge"><?php echo ($vo['start_time']); ?></span> - <span class="am-badge"><?php echo ($vo['over_time']); ?></span> </center>
	    <center><a type="button" class="am-btn <?php if($vo['isOver']): ?>am-btn-default am-disabled<?php else: ?>am-btn-success<?php endif; ?> am-radius am-btn-xs activity-join-btn" href="<?php echo U('/Home/Activity/detail').'?id='.$vo['id'];?>"><?php if($vo['isOver']): ?>活动已结束<?php else: ?>活动报名<?php endif; ?></a></center>
	  </div>
	</div>

  </li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php if(empty($acList)): ?><script type="text/javascript">$("#NoMoreProAlert").show()</script>
<?php else: ?>
	<div id="ac_load_more"><button type="button" id="load_more_btn" class="am-btn am-btn-default am-btn-block btn-loading" onclick="LoadNextPage()">加载更多</button></div><?php endif; ?>