<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo_add_dir');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	
	//添加目录
	if($_GET['action']=='adddir'){
		//接收数据
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		$_clean['name']=_check_dir_name($_POST['name'],2,20);
		$_clean['type']=$_POST['type'];
		if(!empty($_clean['type'])){
			$_clean['password']=_check_dir_password($_POST['password'],6);
		}
		
		$_clean['content']=$_POST['content'];
		$_clean['dir']=time();
		$_clean=_mysql_string($_clean);
		
		//先检查目录是否存在
		if(!is_dir('photo')){
			mkdir('photo',0777);
		}
		//在主目录下创建自己定义的相册目录
		if(!is_dir('photo/'.$_clean['dir'])){
			mkdir('photo/'.$_clean['dir'],0777);
		}
		//把当前的目录信息写入数据库
		if(empty($_clean['type'])){
			_query("INSERT INTO tg_dir(
							tg_name,
							tg_type,
							tg_content,
							tg_dir,
							tg_date
							)
					VALUES(
					'{$_clean['name']}',
					'{$_clean['type']}',
					'{$_clean['content']}',
					'photo/{$_clean['dir']}',
					NOW()
				    )
			");
		}else{
			_query("INSERT INTO tg_dir(
							tg_name,
							tg_type,
							tg_content,
							tg_dir,
							tg_date,
							tg_password
							)
					VALUES(
					'{$_clean['name']}',
					'{$_clean['type']}',
					'{$_clean['content']}',
					'photo/{$_clean['dir']}',
					NOW(),
					'{$_clean['password']}'
				    )
			");
		}
		//关闭数据库
		_close();
		//'目录添加成功'
		_location('恭喜你目录添加成功','photo.php');
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--相册</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script src="js/photo_add_dir.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="photo">
			<h2>添加相册目录</h2>
			<form action="?action=adddir" method="post">
				<dl>
					<dd>相册名称：<input type="text" name="name" class="text"/></dd>
					<dd>相册类型：<input type="radio" name="type" value="0" checked="checked"/>公开
							   <input type="radio" name="type" value="1"/>私密
					</dd>
					<dd id="pass">相册密码：<input type="password" name="password" class="text"/></dd>
					<dd>相册描述：<textarea name="content"></textarea></dd>
					<dd><input type="submit" value="添加目录" class="submit"/></dd>
				</dl>
			</form>
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>