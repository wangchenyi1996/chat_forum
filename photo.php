<?php
	//error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";
	//删除图片目录
	if(!empty($_GET['action'])=='delete' && isset($_GET['id'])){
		
		if(!!$rows=_fetch_array("SELECT tg_dir
									FROM tg_dir
									WHERE tg_id='{$_GET['id']}' LIMIT 1
						    ")){
			$_html=array();
			$_html['url']=$rows['tg_dir'];
			$_html=_html($_html);
			
			//3、删除图片的物理地址
			if(file_exists($_html['url'])){
				//调用删除非空目录方法
				if(removeDir($_html['url'])){
					//1、删除数据库的图片信息
					_query("DELETE FROM tg_photo WHERE tg_sid='{$_GET['id']}'");
					//2、删除数据库的对应图片目录
					_query("DELETE FROM tg_dir WHERE tg_id='{$_GET['id']}'");
					_close();
					_location('删除目录成功','photo.php');	
				}else{
					_close();
					_location('删除目录失败','photo.php');	
				}
			}
							
		}else{
			_alert_back("不存在此图片！");
		}
	}
	
	//读取数据
	//分页模块
	global $_pagenum,$_pagesize;
	page("SELECT tg_id FROM tg_dir",10);
	//调用函数来完成
	$result=_query("SELECT tg_id,tg_name,tg_type,tg_face
						   FROM tg_dir 
						   ORDER BY tg_date DESC
						   LIMIT $_pagenum,$_pagesize");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--相册</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<style type="text/css">
		#page_num{
			height: 20px;
			clear: both;
			padding: 10px 0;
			position: relative;
		}
		
		#page_num ul{
			position: absolute;
			right: 10px;
			height: 20px;
		}
		
		#page_num ul li{
			float: left;
			width: 24px;
			height: 24px;
			margin-left: 5px;
		}
		
		#page_num ul li a{
			display: block;
			width: 20px;
			height: 20px;
			line-height: 20px;
			border: 1px solid #333;
			text-align: center;
			text-decoration: none;
		}
		
		#page_num ul li a:hover,#page_num ul li a.selected{
			background: #666;
			color: #fff;
			font-weight: bold;
		}
		
		#blog dl dd a{
			text-decoration: none;
			color: #333;
		}
		</style>
		
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="photo">
			<h2>相册列表</h2>
			<?php
				 while(!!$rows=_fetch_array_list($result)){
				 $_html=array();
				 $_html['id']=$rows['tg_id'];
			   	 $_html['name']=$rows['tg_name'];
			   	 $_html['type']=$rows['tg_type'];
			   	 $_html['face']=$rows['tg_face'];
			   	 $_html=_html($_html);
			   	 
			   	 if(empty($_html['type'])){
			   	 	$_html['type_html']='（公开）';
			   	 }else{
			   	 	$_html['type_html']='（私密）';
			   	 }
			   	 
			   	 if(empty($_html['face'])){
			   	 	$_html['face']='';
			   	 }else{
			   	 	$_html['face']='<img src="'.$_html['face'].'" alt="'.$_html['name'].'" title="'.$_html['face'].'">';
			   	 }
			   	 
			   	 //统计图片数量
			   	 $_html['photo']=_fetch_array("SELECT COUNT(*) AS count FROM tg_photo
			   	 						WHERE tg_sid='{$_html['id']}'");	
			   	 				 
			?>
			<dl>
				<dt>
					<a href="photo_show.php?id=<?php echo $_html['id']?>">
						<?php echo $_html['face']?>
					</a>	
				</dt>
				<dd>
					<a href="photo_show.php?id=<?php echo $_html['id']?>">
					   <?php echo $_html['name']?> <?php echo $_html['type_html']?> <?php echo $_html['photo']['count']?>张
					</a>	
				</dd>
				<dd>
					[<a href="photo_modify_dir.php?id=<?php echo $_html['id']?>">修改</a>] 
					[<a href="photo.php?action=delete&id=<?php echo $_html['id']?>">删除</a>]
				</dd>
			</dl>
			<?php }?>
			<p><a href="photo_add_dir.php">添加目录</a></p>
					
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>