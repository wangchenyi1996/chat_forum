<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo_add_img');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	if(!$_COOKIE['username']){
		_alert_back("非法登录！");
	}
	
	//保存图片信息入数据库
	if($_GET['action']=='addimg'){
		//接收图片信息
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		$_clean['name']=_check_dir_name($_POST['name'],2,20);
		$_clean['url']=_check_photo_url($_POST['url']);
		$_clean['content']=$_POST['content'];
		$_clean['sid']=$_POST['sid'];
		$_clean=_mysql_string($_clean);
		//入库
		_query("INSERT INTO tg_photo(
									tg_name,
									tg_url,
									tg_content,
									tg_sid,
									tg_username,
									tg_date
							)
					VALUES(
					'{$_clean['name']}',
					'{$_clean['url']}',
					'{$_clean['content']}',
					'{$_clean['sid']}',
					'{$_COOKIE['username']}',
					NOW()
				    )
			");
		//关闭数据库
		_close();
		//'图片信息添加成功'
		_location('图片信息添加成功','photo_show.php?id='.$_clean['sid']);
	}
	
	//读取数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_id,tg_dir
										FROM tg_dir 
										WHERE tg_id='{$_GET['id']}' LIMIT 1
							    ")){
			$_html=array();
			$_html['id']=$rows['tg_id'];
			$_html['dir']=$rows['tg_dir'];
			$_html=_html($_html);
		}else{
			_alert_back('不存在此相册');
		}
	}else{
		_alert_back('非法操作');
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--相册</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script src="js/photo_add_img.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="photo">
			<h2>上传图片</h2>
			<form action="?action=addimg" method="post">
				<input type="hidden" name="sid" value="<?php echo $_html['id']?>" />
				<dl>
					<dd>图片名称：<input type="text" name="name" class="text"/></dd>
					<dd>图片地址：
						<input type="text" name="url" class="text" readonly="readonly" id="url"/>
						<a href="javascript:;" id="up" title="<?php echo $_html['dir']?>">上传</a>
					</dd>
					<dd>图片描述：<textarea name="content"></textarea></dd>
					<dd><input type="submit" value="添加图片" class="submit"/></dd>
				</dl>
			</form>
			
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>