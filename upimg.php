<?php
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','upimg');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//执行上传图片
	if(!empty($_GET['action'])=='up'){
		//1设置上传图片类型
		$_files=array("image/gif","image/jpeg","image/jpg","image/png");
		if(is_array($_files)){
			//2判断上传图片类型是不是数组里的
			if(!in_array($_FILES['userfile']['type'],$_files)){
				_alert_back("上传图片类型必须是GIF、JPEG、JPG、PNG中的一种");
			}
		}
		//3判断文件错误类型
		if($_FILES['userfile']['error']>0){
			switch($_FILES['userfile']['error']){
				case 1:
					_alert_back("上传的文件超过了php.ini中upload_max_filesize限制");
					break;
				case 2:
					_alert_back("上传的文件的大小超过了html表单中max_file_size限制");
					break;
				case 3:
					_alert_back("文件只有部分被上传");
					break;
				case 4:
					_alert_back("没有文件被上传");
					break;
				case 6:
					_alert_back("找不到临时文件夹");
					break;
				case 7:
					_alert_back("文件写入失败");
					break;
				default:
					_alert_back("未知错误");
					break;
			}
			exit();
		}
		//4、文件大小的限制
		if($_FILES['userfile']['size']>10000000){
			_alert_back("上传文件不能超过10M");
		}
		//获取文件的扩展名1.jpg
		$_n=explode('.',$_FILES['userfile']['name']);
		$_name=$_POST['dir'].'/'.time().'.'.$_n[1];
		
		//6、执行上传
		if(is_uploaded_file($_FILES['userfile']['tmp_name'])){//is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的
			//将上传的文件移动到新位置
			if(!@move_uploaded_file($_FILES['userfile']["tmp_name"],$_name)){
				_alert_back("移动文件失败");
			}else{
				//_alert_close("上传成功");
				echo "<script>alert('上传成功');window.opener.document.getElementById('url').value='$_name';window.close();</script>";
				exit();
			}
		}else{
			_alert_back("不是上传的文件");
		}
	}
	
	//接收dir
	if(!isset($_GET['dir'])){
		_alert_back("非法操作");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--头像选择</title>
		<?php 
			require ROOT_PATH."includes/title.inc.php";
		?>
	</head>
	<body>
		<div id="upimg">
			<form action="upimg.php?action=up" method="post" enctype="multipart/form-data">
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
				<input type="hidden" name="dir" value="<?php echo $_GET['dir']?>" />
				选择图片：<input type="file" name="userfile"/>
				<input type="submit" value="上传"/>
			</form>
		</div>
	</body>
</html>
	