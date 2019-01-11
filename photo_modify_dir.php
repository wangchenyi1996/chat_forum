<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo_add_dir');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	
	//修改
	if($_GET['action']=='modify'){
		//接收数据
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		$_clean['id']=$_POST['id'];
		$_clean['name']=_check_dir_name($_POST['name'],2,20);
		$_clean['type']=$_POST['type'];
		if(!empty($_clean['type'])){
			$_clean['password']=_check_dir_password($_POST['password'],6);
		}
		$_clean['content']=$_POST['content'];
		$_clean['face']=$_POST['face'];
		$_clean=_mysql_string($_clean);
		//修改目录
		if(empty($_clean['type'])){
			_query("UPDATE tg_dir SET
								tg_name='{$_clean['name']}',	
								tg_type='{$_clean['type']}',	
								tg_password=NULL,	
								tg_content='{$_clean['content']}',
								tg_face='{$_clean['face']}'
							WHERE tg_id='{$_clean['id']}'
							LIMIT 1
			
				");
		}else{
			_query("UPDATE tg_dir SET
								tg_name='{$_clean['name']}',	
								tg_type='{$_clean['type']}',	
								tg_password='{$_clean['password']}',	
								tg_content='{$_clean['content']}',
								tg_face='{$_clean['face']}'
							WHERE tg_id='{$_clean['id']}'
							LIMIT 1
			
				");
		}
		//关闭数据库
		_close();
		//'目录添加成功'
		_location('目录修改成功','photo.php');
	}
	
	
	//读出数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_id,tg_name,tg_type,tg_face,tg_content
								 FROM tg_dir 
								 WHERE tg_id='{$_GET['id']}' LIMIT 1")){
			$_html=array();
			$_html['id']=$rows['tg_id'];
		   	$_html['name']=$rows['tg_name'];
		   	$_html['type']=$rows['tg_type'];
		   	$_html['face']=$rows['tg_face'];
		   	$_html['content']=$rows['tg_content'];
									 
									 		
		}else{
			_alert_back("不存在此相册！");
		}
	}else{
		_alert_back("非法操作！");
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
			<h2>修改相册目录</h2>
			<form action="?action=modify" method="post">
				<dl>
					<dd>相册名称：<input type="text" name="name" class="text" value="<?php echo $_html['name']?>"/></dd>
					<dd>相册类型：<input type="radio" name="type" value="0" <?php if($_html['type']==0)echo 'checked="checked"'?>/>公开
							   <input type="radio" name="type" value="1" <?php if($_html['type']==1)echo 'checked="checked"'?>/>私密
					</dd>
					<dd id="pass" <?php if($_html['type']==1)echo 'style="display: block;"'?>>相册密码：<input type="password" name="password" class="text"/></dd>
					<dd>相册封面：<input type="text" name="face" class="text" value="<?php echo $_html['face']?>"/></dd>
					<dd>相册描述：<textarea name="content"><?php echo $_html['content']?></textarea></dd>
					<dd><input type="submit" value="修改目录" class="submit"/></dd>
				</dl>
				<input type="hidden" name="id" value="<?php echo $_html['id']?>"/>
			</form>
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>