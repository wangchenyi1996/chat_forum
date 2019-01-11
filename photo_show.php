<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo_show');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//删除相片
	if(!empty($_GET['action'])=='delete' && isset($_GET['id'])){
		
		if(!!$rows=_fetch_array("SELECT tg_username,tg_url,tg_id,tg_sid
									FROM tg_photo 
									WHERE tg_id='{$_GET['id']}' LIMIT 1
						    ")){
			$_html=array();
			$_html['username']=$rows['tg_username'];
			$_html['url']=$rows['tg_url'];
			$_html['id']=$rows['tg_id'];
			$_html['sid']=$rows['tg_sid'];
			
			$_html=_html($_html);
			//判断删除者的身份是否合法
			if($_html['username']==$_COOKIE['username']){
				//首先删除数据库的信息
				_query("DELETE FROM tg_photo WHERE tg_id='{$_html['id']}'");
				//删除图片的物理地址
				if(file_exists($_html['url'])){
					unlink($_html['url']);
				}else{
					_alert_back("磁盘里已不存在此图片！");
				}
				_close();
				_location('删除图片成功','photo_show.php?id='.$_html['sid']);					
				
			}else{
				_alert_back("非法操作！");
			}
					    	
		}else{
			_alert_back("不存在此图片！");
		}
	}
	
	
	//读取数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_id,tg_name,tg_type FROM tg_dir 
										WHERE tg_id='{$_GET['id']}' LIMIT 1
							    ")){
			$_dirhtml=array();
			$_dirhtml['id']=$rows['tg_id'];
			$_dirhtml['name']=$rows['tg_name'];
			$_dirhtml['type']=$rows['tg_type'];
			$_dirhtml=_html($_dirhtml);
			//对比加密相册的验证
			if($_POST['password']){
				if(!!$rows=_fetch_array("SELECT tg_id
										 FROM tg_dir 
										 WHERE 
										 tg_password='".sha1($_POST['password'])."' 
										 LIMIT 1
							    ")){
					//验证通过  生成cookie
					setcookie('photo',$_dirhtml['name']);
					//重定向页面
					_location(null,'photo_show.php?id='.$_dirhtml['id']);		    	
				}else{
					_alert_back('相册密码不正确哦，请重新输入！');
				}
			}
			
		}else{
			_alert_back('不存在此相册');
		}
	}else{
		_alert_back('非法操作');
	}
	
	//等比缩放函数的2个参数
	//$_filename='photo\1525943481/1525945055.jpg';
	$_percent=0.5;
	
	//分页模块
	global $_pagenum,$_pagesize,$_id;
	$_id='id='.$_dirhtml['id'].'&';
	page("SELECT tg_id FROM tg_photo WHERE tg_sid='{$_dirhtml['id']}'",3);
	//调用函数来完成
	$result=_query("
					SELECT tg_id,tg_username,tg_name,tg_url,tg_readcount,tg_commendcount
					FROM tg_photo 
					WHERE tg_sid='{$_dirhtml['id']}'
					ORDER BY tg_date DESC
					LIMIT $_pagenum,$_pagesize");
					/*LIMIT $_pagenum,$_pagesize*/
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
		</style>

	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="photo">
			<h2>图片展示--<?php echo $_dirhtml['name']?></h2>
			<?php
			if(empty($_dirhtml['type'])||$_COOKIE['photo']==$_dirhtml['name']){
				 while(!!$rows=_fetch_array_list($result)){
				 $_html=array();
				 $_html['id']=$rows['tg_id'];
			   	 $_html['username']=$rows['tg_username'];
			   	 $_html['name']=$rows['tg_name'];	
			   	 $_html['url']=$rows['tg_url'];
			   	 $_html['readcount']=$rows['tg_readcount'];
				 $_html['commendcount']=$rows['tg_commendcount'];
			   	 $_html=_html($_html);
			?>
			<dl>
				<dt>
					<a href="photo_detail.php?id=<?php echo $_html['id']?>">
					<img src="thumb.php?filename=<?php echo $_html['url']?>&percent=<?php echo $_percent?>" title="<?php echo $_html['id']?>"/>
					</a>
				</dt>
				<dd><a href="photo_detail.php?id=<?php echo $_html['id']?>"><?php echo $_html['name']?></a></dd>
				<dd>浏览量<strong>(<?php echo $_html['readcount']?>)</strong>&nbsp;评论量<strong>(<?php echo $_html['commendcount']?>)</strong> 上传者--<?php echo $_html['username']?></dd>
				<?php if($_html['username']==$_COOKIE['username']){?>
				<dd>[<a href="photo_show.php?action=delete&id=<?php echo $_html['id']?>">删除</a>]</dd>
				<?php }?>
			</dl>
			<?php }
				_free_result($result);
				//参数1表示数字分页，参数二表示文本分页
				_page(1);
				_page(2);	
			?>
			<p><a href="photo_add_img.php?id=<?php echo $_dirhtml['id']?>">上传图片</a></p>
		    <?php 
		    	}else{
		    		echo '<form action="photo_show.php?id='.$_dirhtml['id'].'" method="post">';
					echo '<p>请输入相册密码：<input type="password" name="password"/>
						   <input type="submit" value="确认" />
					     </p>';
					echo '</form>';
		    	}
		    ?>
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
	
</html>