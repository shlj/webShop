<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>选择自提点</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
</head>

<body style="min-height:300px;">
	<div class="container-fluid">
		<div class="form-group form-group-sm">
			<label>选择自提点</label>

			<select class="form-control" name="province" onchange="getData('province');">
				<option value="">请选择省份</option>
				<?php $query = new IQuery("takeself as ts");$query->join = "left join areas as a on a.area_id = ts.province";$query->fields = "a.*";$query->order = "ts.sort asc";$query->group = "ts.province";$items = $query->find(); foreach($items as $key => $item){?>
				<option value="<?php echo isset($item['area_id'])?$item['area_id']:"";?>"><?php echo isset($item['area_name'])?$item['area_name']:"";?></option>
				<?php }?>
			</select>

			<select class="form-control" name="city" onchange="getData('city');">
				<option value="">请选择城市</option>
			</select>

			<select class="form-control" name="area" onchange="getData('area');">
				<option value="">请选择区域</option>
			</select>
		</div>

		<div class="form-group form-group-sm" id="takeselfBox"></div>
	</div>

	<!--自提点模板-->
	<script type="text/html" id="takeselfRowTemplate">
	<div class="radio">
		<label>
			<input type='radio' value='<%=jsonToString(item)%>' name='takeselfItem' />

			<%=item['address']%>

			<%if(item['phone']){%>
			，电话：<%=item['phone']%>
			<%}%>

			<%if(item['mobile']){%>
			，手机：<%=item['mobile']%>
			<%}%>
		</label>
	</div>
	</script>
</body>

<script type='text/javascript'>
//获取数据
function getData(typeVal)
{
	var selectedVal = $('[name="'+typeVal+'"] option:selected').val();
	$.getJSON("<?php echo IUrl::creatUrl("/block/getTakeselfList");?>",{"id":selectedVal,"type":typeVal},function(jsonData)
	{
		switch(typeVal)
		{
			case "province":
			{
				$('[name="city"] option:gt(0)').remove();
				for(var index in jsonData)
				{
					var item = jsonData[index];
					$('[name="city"]').append('<option value="'+item['city']+'">'+item['city_str']+'</option>');
				}
			}
			break;

			case "city":
			{
				$('[name="area"] option:gt(0)').remove();
				for(var index in jsonData)
				{
					var item = jsonData[index];
					$('[name="area"]').append('<option value="'+item['area']+'">'+item['area_str']+'</option>');
				}
			}
			break;

			case "area":
			{
				$('#takeselfBox').empty();
				for(var index in jsonData)
				{
					var item = jsonData[index];
					var takeselfHtml = template.render('takeselfRowTemplate',{"item":item});
					$('#takeselfBox').append(takeselfHtml);
				}
			}
			break;
		}
	});
}
</script>
</html>