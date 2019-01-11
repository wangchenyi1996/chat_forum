<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','member');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//是否正常登陆
	if(isset($_COOKIE['username'])){
	   //获取数据
	   $rows=_fetch_array("SELECT tg_username,tg_sex,tg_face,tg_email,tg_url,tg_qq FROM tg_user WHERE tg_username='{$_COOKIE['username']}'");
	   if($rows){
	   	 $_html=array();
	   	 $_html['username']=$rows['tg_username'];
	   	 $_html['sex']=$rows['tg_sex'];
	   	 $_html['face']=$rows['tg_face'];
	   	 $_html['email']=$rows['tg_email'];
	   	 $_html['url']=$rows['tg_url'];
	   	 $_html['qq']=$rows['tg_qq'];
	   	 $_html=_html($_html);
	   }else{
	   	_alert_back('此用户不存在');
	   }
	   
	}else{
		_alert_back("非法登录。");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--个人中心</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="member">
			<?php require ROOT_PATH."includes/member.inc.php";?>	
			<div id="member_main">
				<h2>会员管理中心</h2>
				<dl>
					<dd>用 户 名：<?php echo $_html['username'];?></dd>
					<dd>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $_html['sex'];?></dd>
					<dd>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：<?php echo $_html['face'];?></dd>
					<dd>电子邮件：<?php echo _html($_html['email']);?></dd>
					<dd>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页：<?php echo $_html['url'];?></dd>
					<dd>Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q：<?php echo $_html['qq'];?></dd>
					<dd>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：	管理员</dd>
				</dl>
			</div>
		</div>
		
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>