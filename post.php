<?php
	session_start();
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','post');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//登陆后才能发表帖子
	if(!isset($_COOKIE['username'])){
		_location('发帖前必须先登录。','login.php');
	}
	//判断是否接提交了
	if(!empty($_GET['action'])=='post'){
		//验证码判断
		_check_code($_POST['code'],$_SESSION['code']);
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		//接收帖子内容
		$_clean=array();
		$_clean['username']=$_COOKIE['username'];
		$_clean['type']=$_POST['type'];
		$_clean['title']=_check_post_title($_POST['title'],2,40);
		$_clean['content']=_check_post_content($_POST['content'],10);
		$_clean=_mysql_string($_clean);
		//把内容写入数据表中
		_query(
				"INSERT INTO tg_article(
							tg_username,
							tg_type,
							tg_title,
							tg_content,
							tg_date
							)
					VALUES(
					'{$_clean['username']}',
					'{$_clean['type']}',
					'{$_clean['title']}',
					'{$_clean['content']}',
					NOW()
				    )
		");
		//获取刚刚新增的id
	  	$_clean['id']=_insert_id();
		//新增成功
		//关闭数据库
		_close();
		//清除session
		_session_destroy();
		//'帖子发送成功'
		_location('恭喜你帖子发表成功','article.php?id='.$_clean['id']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--发表帖子</title>
		<?php
			require ROOT_PATH."includes/title.inc.php";
		?>
		<script type="text/javascript" src="js/post.js"></script>
		<script type="text/javascript" src="js/code.js"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="post">
			<h2>发表帖子</h2>
			<form action="post.php?action=post" method="post" name="post">
			<dl>
				<dt>请认真填写以下内容</dt>
				<dd>
					类&nbsp;&nbsp;型
					<?php 
						foreach(range(1,16) as $_num){
							if($_num==1){
								echo '<input type="radio" name="type" value="'.$_num.'" checked="checked"/>&nbsp;';
							}else{
								echo '<input type="radio" name="type" value="'.$_num.'"/>&nbsp;';
							}
							echo '<img src="img/icon'.$_num.'.jpg" alt="类型"/>&nbsp;&nbsp;';
							if($_num==8){
								echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							}
						} 
					?>
				</dd>
				<dd>标&nbsp;&nbsp;题   ：&nbsp;<input type="text" name="title" class="text" />(*必填，2~40位)</dd>
				<dd id="q">贴&nbsp;&nbsp;图   ：&nbsp;
					<a href="javascript:;">Q图系列1</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:;">Q图系列2</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:;">Q图系列3</a></dd>
				<dd>
					<?php include ROOT_PATH."includes/ubb.inc.php";?>
					<textarea name="content" rows="9"></textarea>
				</dd>
				<dd>验证码：&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="code" class="yzm text"/><img src="code.php" id="code"/>
					<input type="submit" value="发表帖子" class="submit"/
				</dd>
			</dl>
			</form>
		</div>
		<!--头尾分离-->
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>
