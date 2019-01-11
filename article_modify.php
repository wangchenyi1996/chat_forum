<?php
	session_start();
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','article_modify');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//登陆后才能发表帖子
	if(!isset($_COOKIE['username'])){
		_location('发帖前必须先登录。','login.php');
	}
	//修改
	if($_GET['action']=='modify'){
		_check_code($_POST['code'],$_SESSION['code']);
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		//开始修改
		$_clean=array();
		$_clean['id']=$_POST['id'];
		$_clean['type']=$_POST['type'];
		$_clean['title']=_check_post_title($_POST['title'],2,40);
		$_clean['content']=_check_post_content($_POST['content'],10);
		$_clean=_mysql_string($_clean);
		
		//把内容写入数据表中
		_query("UPDATE tg_article SET
						tg_type='{$_clean['type']}',	
						tg_title='{$_clean['title']}',	
						tg_content='{$_clean['content']}',
						tg_last_modify=NOW()	
					WHERE tg_id='{$_clean['id']}'
		");
		//关闭数据库
		_close();
		//清除session
		_session_destroy();
		//'帖子修改成功'
		_location('恭喜你修改帖子成功','article.php?id='.$_clean['id']);
	}
	
	//读出数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_username,
										tg_type,tg_title,tg_content
									FROM tg_article 
									 WHERE tg_reid=0	AND
									 	tg_id='{$_GET['id']}'"))
		{
			//累积阅读量	每刷新一次阅读量加一
			_query("UPDATE tg_article SET tg_readcount=tg_readcount+1 WHERE tg_id='{$_GET['id']}'");						 	
			$_html=array();
			$_html['id']=$_GET['id'];
		   	$_html['username']=$rows['tg_username'];
		   	$_html['type']=$rows['tg_type'];
		   	$_html['title']=$rows['tg_title'];
		   	$_html['content']=$rows['tg_content'];
		   	$_html=_html($_html);
		   	
		   	//判断能不能修改
		   	if($_COOKIE['username']!=$_html['username']){
		   		_alert_back("你没有权限修改！");
		   	}
		   	
		}else{
			_alert_back("不存在此贴！");
		}
	}else{
		_alert_back("非法操作！");
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--修改帖子</title>
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
			<h2>修改帖子</h2>
			<form action="article_modify.php?action=modify" method="post" name="post">
			<input type="hidden" name="id" value="<?php echo $_html['id']?>" />
			<dl>
				<dt>请认真修改以下内容</dt>
				<dd>
					类&nbsp;&nbsp;型
					<?php 
						foreach(range(1,16) as $_num){
							if($_num==	$_html['type']){
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
				<dd>标&nbsp;&nbsp;题   ：&nbsp;<input type="text" value="<?php echo $_html['title']?>" name="title" class="text" />(*必填，2~40位)</dd>
				<dd id="q">贴&nbsp;&nbsp;图   ：&nbsp;
					<a href="javascript:;">Q图系列1</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:;">Q图系列2</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:;">Q图系列3</a></dd>
				<dd>
					<?php include ROOT_PATH."includes/ubb.inc.php";?>
					<textarea name="content" rows="9">
						<?php echo $_html['content']?>
					</textarea>
				</dd>
				<dd>验证码：&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="code" class="yzm text"/><img src="code.php" id="code"/>
					<input type="submit" value="修改帖子" class="submit"/
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
