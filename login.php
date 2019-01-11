<?php
	session_start();//开启会话
	
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','login');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//登录状态
	_login_state();
	//判断是否接提交了
	if($_GET['action']=='login'){
		//直接调用函数$_check_code($_first_code,$_end_code)
		_check_code($_POST['code'],$_SESSION['code']);
		//引入验证函数
		include ROOT_PATH."includes/login.func.php";	
		//接收数据
		$_clean=array();
		$_clean['username']=_check_username($_POST['username']);
		$_clean['password']=_check_password($_POST['password'],6);
		$_clean['time']=_check_time($_POST['time']);
		//print_r($_clean);
		//数据库验证
		$res=_query("SELECT tg_username,tg_password FROM tg_user WHERE tg_username='{$_clean['username']}' AND tg_password='{$_clean['password']}'");
		if(!!$rows=mysql_fetch_array($res)){
			//echo $rows['tg_username'];
			//echo "<br>";
			//echo $rows['tg_password'];
			//关闭数据库
	  		_close();
	  		//清除session
	  		_session_destroy();
	  		//登陆成功跳转到index.php
	  		//header('Location:index.php');
	  		
	  		//生成cookie
	  		_setcookies($rows['tg_username'],$rows['tg_password'],$_clean['time']);
	  		_location(null,'member.php');
		}else{
			 //关闭数据库
	  		_close();
	  		//清除session
	  		_session_destroy();
	  		_location('用户名或密码错误','login.php');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--登录</title>
		<?php
			require ROOT_PATH."includes/title.inc.php";
		?>
		<script type="text/javascript" src="js/code.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="login">
			<h2>用户登录</h2>
			<form action="login.php?action=login" method="post" name="login">
			<dl>
				<dt> </dt>
				<dd>用 户 名：&nbsp;&nbsp;<input type="text" name="username" class="text" /></dd>
				<dd>密      码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" class="text" /></dd>
				<dd>保      留：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="0" checked="checked"/>
					不保留&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="1"/>一天&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="2"/>一周&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="3"/>一个月</dd>
				<dd>验证码：&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="code" class="text yzm"/>
					<img src="code.php" id="code"/>
				</dd>
				<dd>
					<input type="submit" value="登录" class="button"/>
					<!--<input type="button" value="注册" class="button location" id="location"/>-->
					<span style="margin-left:5px; display: inline-block;border: dashed 1px coral;width: 60px;height: 17px;">
						<a href="register.php" style="display: inline-block;text-align: center;text-decoration: none;padding-left: 20px;">注册</a>
					</span>
				</dd>
			</dl>
			</form>
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>