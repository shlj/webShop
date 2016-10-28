<!--团购正常-->
<?php $free_time = ITime::getDiffSec($groupon['end_time']);?>

<li class="current">
	<span class="bold red2">团购价：</span>
	<b class="price red2">￥<span class="f30"><?php echo isset($groupon['regiment_price'])?$groupon['regiment_price']:"";?></span></b>
	<span class="time" id="grouponCount">
		还剩 <i class="bold red2" id='cd_hour_grouponCount'><?php echo floor($free_time/3600);?></i>
		小时<i class="bold red2" id='cd_minute_grouponCount'><?php echo floor(($free_time%3600)/60);?></i>
		分<i class="bold red2" id='cd_second_grouponCount'><?php echo $free_time%60;?></i>
		秒结束
	</span>
</li>
<li>
	销售价：<span class="price light_gray">￥<s class="f30" id="data_sellPrice"><?php echo isset($sell_price)?$sell_price:"";?></s></span>
</li>
<li>销售数量：<?php echo isset($groupon['sum_count'])?$groupon['sum_count']:"";?>件</li>
<li>限购量：<?php echo isset($groupon['limit_min_count'])?$groupon['limit_min_count']:"";?> 至 <?php echo isset($groupon['limit_max_count'])?$groupon['limit_max_count']:"";?></li>

<script type="text/javascript">
//开启倒计时功能
var cd_timer = new countdown();
cd_timer.add('grouponCount');

//DOM加载完毕开始
jQuery(function()
{
	//团购活动的库存量
	var regimentStoreNums = "<?php echo $groupon['store_nums'] - $groupon['sum_count'];?>";
	$('#data_storeNums').text(regimentStoreNums);

	//团购最小购买数量
	$('#buyNums').attr("minNums","<?php echo isset($groupon['limit_min_count'])?$groupon['limit_min_count']:"";?>");
	$('#buyNums').attr("maxNums","<?php echo isset($groupon['limit_max_count'])?$groupon['limit_max_count']:"";?>");
	$('#buyNums').val("<?php echo isset($groupon['limit_min_count'])?$groupon['limit_min_count']:"";?>");
});
</script>