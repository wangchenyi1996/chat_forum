<?php
	error_reporting(0);
	session_start();
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','photo_detail');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//处理图片评论，接收数据
	if(!empty($_GET['action'])=='rephoto'){
		//验证码判断
		_check_code($_POST['code'],$_SESSION['code']);
		//接收帖子内容
		$_clean=array();
		$_clean['title']=$_POST['title'];
		$_clean['content']=$_POST['content'];
		$_clean['sid']=$_POST['sid'];
		$_clean['username']=$_COOKIE['username'];
		$_clean=_mysql_string($_clean);
		//把内容写入数据表中
		_query(
				"INSERT INTO tg_photo_commend(
							tg_title,
							tg_content,
							tg_sid,
							tg_username,
							tg_date
							)
					VALUES(
					'{$_clean['title']}',
					'{$_clean['content']}',
					'{$_clean['sid']}',
					'{$_clean['username']}',
					NOW()
				    )
		");
		//显示评论数
		_query(
				"UPDATE tg_photo SET tg_commendcount=tg_commendcount+1
								WHERE tg_id='{$_clean['sid']}'
				");
		_close();
		_location('评论图片成功','photo_detail.php?id='.$_clean['sid']);
	}
	
	//读取数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_id,tg_name,tg_url,tg_content,tg_sid,tg_username,
										tg_readcount,tg_commendcount,tg_date
										FROM tg_photo 
										WHERE tg_id='{$_GET['id']}' LIMIT 1
							    ")){
			//累积阅读量	每刷新一次阅读量加一
			_query("UPDATE tg_photo 
					SET tg_readcount=tg_readcount+1 WHERE tg_id='{$_GET['id']}'");						 	
			$_html=array();
			$_html['id']=$rows['tg_id'];
			$_html['sid']=$rows['tg_sid'];
			$_html['name']=$rows['tg_name'];
			$_html['url']=$rows['tg_url'];
			$_html['content']=$rows['tg_content'];
			$_html['username']=$rows['tg_username'];
			$_html['readcount']=$rows['tg_readcount'];
			$_html['commendcount']=$rows['tg_commendcount'];
			$_html['date']=$rows['tg_date'];
			$_html=_html($_html);
			
			//创建一个全局变量
		   	global $_id;
		   	$_id='id='.$_html['id'].'&';
			
			//读取评论
		   	//分页模块
			global $_pagenum,$_pagesize,$_page;
			page("SELECT tg_id FROM tg_photo_commend WHERE tg_sid='{$_html['id']}'",3);
			$result=_query("SELECT tg_title,tg_content,tg_username,tg_date
									FROM tg_photo_commend
									WHERE tg_sid='{$_html['id']}'
									ORDER BY tg_date ASC
									
							");
									/*LIMIT $_pagenum,$_pagesize*/
			//上一页 取得比自己大的id中最小的那个
			$_html['preid']=_fetch_array("SELECT min(tg_id) AS id FROM tg_photo 
										  WHERE tg_sid='{$_html['sid']}'
										        AND tg_id>'{$_html['id']}'
							");
			//如果id为空就会弹出_alert_back('不存在此图片');
			if(!empty($_html['preid']['id'])){
				$_html['pre']='<a href="photo_detail.php?id='.$_html['preid']['id'].'">上一页</a>';
			}else{
				$_html['pre']='<span>到顶了哦！</span>';
			}
			
			//下一页 取得比自己小的id中最大的那个
			$_html['nextid']=_fetch_array("SELECT max(tg_id) AS id FROM tg_photo 
										  WHERE tg_sid='{$_html['sid']}'
										        AND tg_id<'{$_html['id']}'
							");
			//如果id为空就会弹出_alert_back('不存在此图片');
			if(!empty($_html['nextid']['id'])){
				$_html['next']='<a href="photo_detail.php?id='.$_html['nextid']['id'].'">下一页</a>';
			}else{
				$_html['next']='<span>到底了哦！</span>';
			}
			
		}else{
			_alert_back('不存在此图片');
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

		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script src="js/code.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/article.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="photo">
			<h2>图片详情</h2>
			<dl class="detail">
				<dd class="name"><?php echo $_html['name']?></dd>
				<dt>
					<?php echo $_html['pre']?>
					<img src="<?php echo $_html['url']?>"/>
					<?php echo $_html['next']?>
				</dt>
				<dd>浏览量<strong>(<?php echo $_html['readcount']?>)</strong> &nbsp;
					评论量<strong>(<?php echo $_html['commendcount']?>)</strong>
				          上传者--<?php echo $_html['username']?>&nbsp;上传于<?php echo $_html['date']?></dd>
				<dd>简介：<?php echo  $_html['content']?></dd>
			</dl>
			
			<?php 
				 $_i=1;
				 while(!!$rows=_fetch_array_list($result)){
				 	$_html['username']=$rows['tg_username'];
				   	$_html['retitle']=$rows['tg_title'];
				   	$_html['content']=$rows['tg_content'];
				   	$_html['date']=$rows['tg_date'];
				   	
					 //拿出用户名去查找用户信息
					if(!!$rows=_fetch_array("SELECT tg_id,tg_sex,tg_face,tg_email,
												tg_url
												FROM tg_user 
												WHERE tg_username='{$_html['username']}'")){
					//提取用户信息
					$_html['userid']=$rows['tg_id'];
					$_html['sex']=$rows['tg_sex'];
				   	$_html['face']=$rows['tg_face'];
				   	$_html['email']=$rows['tg_email'];
				   	$_html['url']=$rows['tg_url'];
				   	
				   	$_html=_html($_html);
			   	
			   	}else{
			   		
			   	}
			?>
			<p class="line"></p>
			<div id="re">
				<dl>
					<dd class="user"><?php echo $_html['username'];?>(<?php echo $_html['sex']?>)</dd>
					<dt><img src="<?php echo $_html['face'] ?>" title="<?php echo $_html['username']?>"/></dt>
					<dd class="message"><a href="javascript:;" name="message" title="<?php echo $_html['userid']?>">发短信</a></dd>
					<dd class="friend"><a href="javascript:;" name="friend" title="<?php echo $_html['userid']?>"
						onclick="javascript:window.open('friend.php','friend','width=400,height=250,top=200,left=200')">
						加为好友</a></dd>
					<dd class="guest">写留言</dd>
					<dd class="flower"><a href="javascript:;" name="flower" title="<?php echo $_html['userid']?>"
						onclick="javascript:window.open('flower.php','flower','width=400,height=250,top=250,left=300')">
						给ta送花</a>
					</dd>
					<dd class="email">邮件：<a href="<?php echo $_html['email']?>"><?php echo $_html['email']?></a></dd>
					<dd class="url">网址：<a href="<?php echo $_html['url']?>"><?php echo $_html['url']?></a></dd>
				</dl>
				<div class="content">
					<div class="user">
						<span><?php echo $_i+(($_page-1)*$_pagesize);?>#</span><?php echo $_html['username']?>  | 发表于 <?php echo $_html['date']?>
					</div>
					<h3>
						主题：<?php echo $_html['retitle']?>
						<?php echo $_html['re']?>
					</h3>
					<div class="detail">
						<?php echo _ubb($_html['content'])?>
					</div>
				</div>
			</div>
			<?php 
				$_i++;
			}
				_free_result($result);
				//参数1表示数字分页，参数二表示文本分页
				_page(1);
				_page(2);	
			?>
			
			<!--登陆后才能评论-->
			<?php if(isset($_COOKIE['username'])){ ?>
			<p class="line"></p>
			<form action="photo_detail.php?action=rephoto" method="post">
				<input type="hidden" name="sid" value="<?php echo $_html['id']?>" />
				<dl class="rephoto">
					<dd>标&nbsp;&nbsp;题   ：&nbsp;<input type="text" name="title" class="text" value="RE:<?php echo $_html['name']?>"/>(*必填，2~40位)</dd>
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
						<input type="submit" value="回复帖子" class="submit"/
					</dd>
				</dl>
			</form>
			<?php }?>	
			
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>