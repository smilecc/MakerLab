<?php if (!defined('THINK_PATH')) exit(); if(is_array($prolist)): $i = 0; $__LIST__ = $prolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>


	<div class="am-panel am-panel-default board">
	  <div class="am-panel-bd am-panel-padding4">
	    <center>
	    	<a href="<?php echo U('/Home/Project/detail').'?id='.$vo['id'];?>">
	    		<span class="am-badge am-badge-secondary activity-online"><?php echo ($vo['ProcessName']); ?></span>
	    		<img class="am-radius activity-img" src="/Public/Uploads/<?php echo ($vo['img']); ?>" alt=""/>
	    	</a>
	    </center>
	    <div class="am-serif project-name"><?php echo ($vo['name']); ?></div>
	    <hr class="project-hr" />
	    <div class="am-icon-user project-user"> <?php echo ($vo['username']); ?></div>
	  </div>
	</div>


<!-- 	<div class="am-panel am-panel-default">
	  <div class="am-panel-hd">
	    <h3 class="am-panel-title"><?php echo ($vo['name']); ?></h3>
	  </div>
	  <div class="am-panel-bd am-panel-padding4">
	    <center><a href="<?php echo U('/Home/Project/detail').'?id='.$vo['id'];?>"><img class="am-radius" src="/Public/Uploads/<?php echo ($vo['img']); ?>" alt=""/></a></center>
	    <div class="project-type">
	        <span class="am-badge am-radius am-badge-success am-text-sm"><?php echo ($vo['TagName']); ?></span>
	        <span class="am-badge am-radius am-badge-warning am-text-sm"><?php echo ($vo['TypeName']); ?></span>
	        <span class="am-badge am-radius am-badge-danger am-text-sm"><?php echo ($vo['ProcessName']); ?></span>
        </div>
	  </div>
	  <div class="am-panel-footer"><span class="am-icon-user"> <?php echo ($vo['username']); ?></span></div>
	</div> -->
  </li><?php endforeach; endif; else: echo "" ;endif; ?>

<?php if(empty($prolist)): ?><script type="text/javascript">$("#NoMoreProAlert").show()</script>
<?php else: ?>
	<div id="pro_load_more"><button type="button" id="load_more_btn" class="am-btn am-btn-default am-btn-block btn-loading" onclick="LoadNextPage()">加载更多</button></div><?php endif; ?>