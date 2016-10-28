<!--抢购正常-->
<?php $free_time = ITime::getDiffSec($time['end_time']);?>
<li class="current">
	<span class="bold red2">抢购价：</span>
	<b class="price red2">￥<span class="f30"><?php echo isset($time['award_value'])?$time['award_value']:"";?></span></b>
	<span class="time" id="timeCount">
		还剩 <i class="bold red2" id='cd_hour_timeCount'><?php echo floor($free_time/3600);?></i>
		小时<i class="bold red2" id='cd_minute_timeCount'><?php echo floor(($free_time%3600)/60);?></i>
		分<i class="bold red2" id='cd_second_timeCount'><?php echo $free_time%60;?></i>
		秒结束
	</span>
</li>

<li>
	销售价：<span class="price light_gray">￥<s class="f30" id="data_sellPrice"><?php echo isset($sell_price)?$sell_price:"";?></s></span>
</li>

<script type="text/javascript">
//开启倒计时功能
var cd_timer = new countdown();
cd_timer.add('timeCount');
</script>