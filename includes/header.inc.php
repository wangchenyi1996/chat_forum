<?php
	header('content-Type:text/html;charset=utf-8');
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
	global $_message_html;
?>

<div id="header">
	<h1><a href="index.php">瓢城web俱乐部多用户留言系统</a></h1>
	<ul>
		<li><a href="index.php">首页</a></li>
		<?php
			if(isset($_COOKIE['username'])){
				echo '<li><a href="member.php">'.$_COOKIE['username'].'--个人中心</a>'.$_message_html.'</li>';
				echo "\n";
			}else{
				echo '<li><a href="register.php">注册</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="login.php">登录</a></li>';		
				echo "\n";		
			}
		?>
		<li><a href="blog.php">博友</a></li>
		<li><a href="photo.php">相册</a></li>
		<li>风格</li>
		<li><a href="manage.php">管理</a></li>
		<?php
			if(isset($_COOKIE['username'])){
				echo '<li><a href="logout.php">退出</a></li>';
			}
		?>
		
	</ul>
</div>