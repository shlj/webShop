<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->_siteConfig->name;?></title>
	<link type="image/x-icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" rel="icon">
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/index.css";?>" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/common.js";?>"></script>
	<script type='text/javascript' src='<?php echo $this->getWebViewPath()."javascript/site.js";?>'></script>
</head>
<body class="second">
	<div class="brand_list container_2">
		<div class="header">
			<h1 class="logo"><a title="<?php echo $this->_siteConfig->name;?>" style="background:url(<?php if($this->_siteConfig->logo){?><?php echo IUrl::creatUrl("")."".$this->_siteConfig->logo."";?><?php }else{?><?php echo $this->getWebSkinPath()."images/front/logo.gif";?><?php }?>) center no-repeat;background-size:contain;" href="<?php echo IUrl::creatUrl("");?>"><?php echo $this->_siteConfig->name;?></a></h1>
			<ul class="shortcut">
				<li class="first"><a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的账户</a></li>
				<li><a href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a></li>
				<li><a href="<?php echo IUrl::creatUrl("/simple/seller");?>">申请开店</a></li>
				<li><a href="<?php echo IUrl::creatUrl("/seller/index");?>">商家管理</a></li>
		   		<li class='last'><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
			</ul>

			<p class="loginfo">
			<?php if($this->user){?>
			<?php echo isset($this->user['username'])?$this->user['username']:"";?>您好，欢迎您来到<?php echo $this->_siteConfig->name;?>购物！[<a href="<?php echo IUrl::creatUrl("/simple/logout");?>" class="reg">安全退出</a>]
			<?php }else{?>
			[<a href="<?php echo IUrl::creatUrl("/simple/login");?>">登录</a><a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg");?>">免费注册</a>]
			<?php }?>
			</p>
		</div>
	    <div class="wrapper clearfix">
	<div class="wrap_box">
		<h3 class="notice">用户注册</h3>
		<p class="tips"><span class="gray f_r">已有<?php echo $this->_siteConfig->name;?>帐号？请点<a class="orange bold" href="<?php echo IUrl::creatUrl("/simple/login");?>">这里</a>登录</span>欢迎来到我们的网站，如果您是新用户，请填写下面的表单进行注册</p>
		<div class="box clearfix">
			<form action='<?php echo IUrl::creatUrl("/simple/reg_act");?>' method='post'>
				<table class="form_table f_l">
					<colgroup>
						<col width="260px" />
						<col />
					</colgroup>

					<?php if($this->_siteConfig->reg_option == 1){?>
					<tr><th>邮箱：</th><td><input class="gray" type="text" name='email' pattern="email" alt="填写正确的邮箱格式" /><label>填写正确的邮箱格式</label></td></tr>
					<?php }?>
					<tr><th>用户名：</th><td><input class="gray" name='username' type="text" pattern="^[\w\u0391-\uFFE5]{2,20}$" alt="填写2-20个字符，可以为字数，数字下划线和中文" /><label>请填写用户名，格式为2-20个字符，可以为字数，数字下划线和中文</label></td></tr>
					<tr><th>设置密码：</th><td><input class="gray" type="password" name='password' pattern="^\S{6,32}$" bind='repassword' alt='填写6-32个字符' /><label>填写登录密码，6-32个字符</label></td></tr>
					<tr><th>确认密码：</th><td><input class="gray" type="password" name='repassword' pattern="^\S{6,32}$" bind='password' alt='重复上面所填写的密码' /><label>重复上面所填写的密码</label></td></tr>
					<tr><th>验证码：</th><td><input class='gray_s' type='text' name='captcha' pattern='^\w{5,10}$' alt='填写图片所示的字符' /><img src='<?php echo IUrl::creatUrl("/simple/getCaptcha");?>' id='captchaImg' onclick="changeCaptcha();" /><label>填写图片所示的字符</label></td></tr>
					<?php if($this->_siteConfig->reg_option == 3){?>
					<tr><th>手机号：</th><td><input class="gray" type="text" name='mobile' pattern="mobi" alt="填写正确的手机格式" /><label>填写正确的手机格式</label></td></tr>
					<tr>
						<th>手机验证：</th>
						<td>
							<input class='gray_s' type='text' name='mobile_code' pattern='^\w{4,6}$' />
							<input onclick="_sendMobileCode(this);" type="button" value="获取验证码" style="line-height:25px;background-color:#fff;color:#000;width:90px; " /><label>填写手机短信验证码</label>
						</td>
					</tr>
					<?php }?>
					<tr><td></td><td><input class="submit_reg" type="submit" value="同意一下条款，提交" /><label></label></td></tr>
				</table>
			</form>
			<div class="agreement gray">
			  <p>一、本站服务条款的确认和接纳本站的各项电子服务的所有权和运作权归本站。本站提供的服务将完全按照其发布的服务条款和操作规则严格执行。用户同意所有服
务条款并完成注册程序，才能成为本站的正式用户。用户确认：本协议条款是处理双方权利义务的约定，除非违反国家强制性法律，否则始终有效。在下订单的同
时，您也同时承认了您拥有购买这些产品的权利能力和行为能力，并且将您对您在订单中提供的所有信息的真实性负责。</p>
<p>二、服务简介本站运用自己的操作系统通过
国际互联网络为用户提供网络服务。同时，用户必须： (1)自行配备上网的所需设备，包括个人电脑、调制解调器或其它必备上网装置。
(2)自行负担个人上网所支付的与此服务有关的电话费用、网络费用。基于本站所提供的网络服务的重要性，用户应同意 (1)提供详尽、准确的个人资料。
(2)不断更新注册资料，符合及时、详尽、准确的要求。本站不公开用户的姓名、地址、电子邮箱和笔名， 除以下情况外：
(1)用户授权本站透露这些信息。
(2)相应的法律及程序要求本站提供用户的个人资料。</p>
<p>三、价格和数量本站将尽最大努力保证您所购商品与网站上公布的价格一致。产品的价格和可获性都在本站
上指明，这类信息将随时更改。您所订购的商品，如果发生缺货，您有权取消定单。</p>
<p>四、送货及费用本站将会把产品送到您所指定的送货地址。所有在本站上列出的
送货时间为参考时间，参考时间的计算是根据库存状况、正常的处理过程和送货时间、送货地点的基础上估计得出的。送货费用根据您选择的配送方式的不同而异。
请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成订单延迟或无法配送等，本站将不迟延配送的责任：
(1)客户提供错误信息和不详细的地址； (2)货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。
(3)不可抗力，例如：自然灾害、交通戒严、突发战争等。</p>
<p>五、服务条款的修改本站将可能不定期的修改本用户协议的有关条款，一旦条款及服务内容产生变动，
本站将会在重要页面上提示修改内容。</p>
<p>六、用户隐私制度尊重用户个人隐私是本站的一项基本政策。所以，作为对以上第二点人注册资料分析的补充，本站一定不会
在未经合法用户授权时公开、编辑或透露其注册资料及保存在本站中的非公开内容，除非有法律许可要求或本站在诚信的基础上认为透露这些信件在以下四种情况是
必要的。</p>
<p>七、用户的帐号，密码和安全性用户一旦注册成功，成为本站的合法用户，将得到一个密码和用户名。您可随时根据指示改变您的密码。用户需谨慎合理的
保存、使用用户名和密码。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通知本站和向公安机关报案。</p>
<p>八、对用户信息的存储和限制本站有判定
用户的行为是否符合国家法律法规规定及本站服务条款权利，如果用户违背了国家法律法规规定或服务条款的规定，本站有中断对其提供网络服务的权利。</p>
<p>九、用户管理用户单独承担发布内容的责任。用户对服务的使用是根据所有适用于本站的国家法律、地方法律和国际法律标准的。用户必须遵循：
(1)从中国境内向外传输技术性资料时必须符合中国有关法规。 (2)使用网络服务不作非法用途。 (3)不干扰或混乱网络服务。
(4)遵守所有使用网络服务的网络协议、规定、程序和惯例。用户须承诺不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐性的、伤害性的、庸俗的，淫
秽等信息资料。另外，用户也不能传输何教唆他人构成犯罪行为的资料；不能传输助长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法
律和国际法律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上提到的服务条款，本站将作出独立判断立即取消用户服务帐号。用户需
对自己在网上的行为承担法律责任。用户若在本站上散布和传播反动、色情或其它违反国家法律的信息，本站的系统记录有可能作为用户违反法律的证据。</p>
<p>十、通告
所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。用户协议条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。</p>
<p>十一、参与广告策划用户在他们发表的信息中加入宣传资料或参与广告策划，在本站的免费服务上展示他们的产品，任何这类促销方法，包括运输货物、付款、服务、商业条
件、担保及与广告有关的描述都只是在相应的用户和广告销售商之间发生。</p>
<p>十二、网络服务内容的所有权本站定义的网络服务内容包括：文字、软件、声音、图片、
录象、图表、广告中的全部内容；电子邮件的全部内容；本站为用户提供的其它信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户
只能在本站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。本站所有的文章版权归原文作者和本站共同所有，
任何人需要转载本站的文章，必须征得原文作者或本站授权。</p>
<p>十三、责任限制如因不可抗力或其它本站无法控制的原因使本站销售系统崩溃或无法正常使用导致网上
交易无法完成或丢失有关的信息、记录等本站会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。</p>
<p>十四、法律管辖和适用本协议的订立、执行和解释及
争议的解决均应适用中国法律。如发生本站服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力
和影响。本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。如双方就本协议内容或其执行发生任何争
议，双方应尽力友好协商解决；协商不成时，任何一方均可向本站所在地的人民法院提起诉讼。</p>
			</div>
		</div>
	</div>
</div>

<script type='text/javascript'>
$(function(){
	$(".form_table input:text").focus(function(){$(this).addClass('current');}).blur(function(){$(this).removeClass('current');})
});
</script>
		<?php echo IFilter::stripSlash($this->_siteConfig->site_footer_code);?>
	</div>
</body>
</html>