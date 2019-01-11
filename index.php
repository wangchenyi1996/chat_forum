<?php
	header('content-Type:text/html;charset=utf-8');
	//error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','index');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//echo ROOT_PATH;
	//echo PHP_VERSION;
	//echo microtime();
	
	//读取new.xml  调用函数
	$_html=_get_xml('new.xml');
	//print_r(_html($_html));
	
	//读取帖子列表
	//分页模块
	global $_pagenum,$_pagesize;
	page("SELECT tg_id FROM tg_article",8);//参数1表示总的条数，参数二表示每页多少条
	//调用函数来完成
	$result=_query("SELECT tg_id,tg_type,tg_content,tg_title,tg_readcount,tg_commendcount 
							FROM tg_article 
							WHERE tg_reid=0
							limit $_pagenum,$_pagesize");
	//最新图片，找到时间点最后上传的那张图片，并且是公开的
	$_photo=_fetch_array("
							SELECT tg_id as id,tg_name as name,tg_url as url
							FROM tg_photo
							ORDER BY tg_date DESC
							LIMIT 1
						");	
	//print_r($_photo);		
?>   
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--首页</title>
		<style type="text/css">
		#user dl{
			width: 170px;
			margin: 0 auto;
			font-size: 12px;
		}
		
		#user dl dd{
			width: 85px;
			height: 20px;
			line-height: 20px;
			text-align: center;
			float: left;
		}
		#user dl dd.email{
			width: 220px;
			padding: 5px 0 0 0;
			text-align: left;
		}
		#user dl dd.url{
			width: 250px;
			padding: 5px 0 0 0;
			text-align: left;
		}
		#user dl dd.user{
			width: 170px;
			color: darkorange;
			text-align: center;
		}
		
		#user dl dd.message{
			background: url(img/1.jpg) no-repeat 0 center;
			background-size: 13px 100%;
		}
		
		#user dl dd.friend{
			background: url(img/2.jpg) no-repeat -4px center;
			background-size: 13px 100%;
		}
		
		#user dl dd.guest{
			background: url(img/3.jpg) no-repeat 0 center;
			background-size:  13px 100%;
		}
		
		#user dl dd.flower{
			background: url(img/4.jpg) no-repeat -4px center;
			background-size:  13px 100%;
		}
		#user dl dt{
			width: 170px;
			margin: 0 0 5px 0;
		}
		
		#user dl dt img{
			width: 80px;
			height: 80px;
			cursor: pointer;
			display: block;
			margin: 0 auto;
		}
		
		#user dl dd a{
			color: #333;
		}
		#user dl dd a:hover{
			color: #CCCCCC;
		}
		
		
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
			margin: 10px;
		}
		
		#page_num ul li{
			float: left;
			width: 24px;
			height: 24px;
			padding-right: 10px;
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
		
		#page_text ul{
			font-size: 14px;
			margin-left: 100px ;
			font-weight: bold;
		}
		#page_text ul a{
			font-weight: normal;
			float: left;
			margin-left: 10px;
			font-weight: bold;
		}
		#page_text ul a:hover{
			color: coral;
		}
		</style>
		<?php 
			require ROOT_PATH."includes/title.inc.php";
		?>
		<script src="js/blog.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		
		<div id="list">
			<h2>帖子列表</h2>
			<a href="post.php" class="post"><img src="img/edit.jpg" id="edit"/>&nbsp;&nbsp;发表帖子</a>
			<ul class="article">
				<?php
					$_htmllist=array();
				 	while(!!$rows=_fetch_array_list($result)){
				 		$_htmllist['type']=$rows['tg_type'];
				 		$_htmllist['id']=$rows['tg_id'];
				 		$_htmllist['title']=$rows['tg_title'];
				 		$_htmllist['content']=$rows['tg_content'];
				 		$_htmllist['readcount']=$rows['tg_readcount'];
				 		$_htmllist['commendcount']=$rows['tg_commendcount'];
				 		$_htmllist=_html($_htmllist);
				 		echo '<li class="icon'.$_htmllist['type'].'">
				 			<em>阅读数('.$_htmllist['readcount'].') 评论数('.$_htmllist['commendcount'].')</em>
				 			<a title="'.$_htmllist['title'].'" href="article.php?id='.$_htmllist['id'].'">'._title($_htmllist['title']).'</a></li>';
					}
					_free_result($result);
				?>
			</ul>
			<?php
				//参数1表示数字分页，参数二表示文本分页
				_page(1);
				_page(2);
				//_page(3);	
			?>
		</div>
		<div id="user">
			<h2>新进会员</h2>
			<dl>
				<dd class="user"><?php echo $_html['username']?>(<?php echo $_html['sex']?>)</dd>
				<dt><img src="<?php echo $_html['face']?>" title="<?php echo $_html['face']?>"/></dt>
				<dd class="message"><a href="javascript:;" name="message" title="<?php echo $_html['id']?>">发短信</a></dd>
				<dd class="friend"><a href="javascript:;" name="friend" title="<?php echo $_html['id']?>"
					onclick="javascript:window.open('friend.php','friend','width=400,height=250,top=200,left=200')">
					加为好友</a></dd>
				<dd class="guest">写留言</dd>
				<dd class="flower"><a href="javascript:;" name="flower" title="<?php echo $_html['id']?>"
					onclick="javascript:window.open('flower.php','flower','width=400,height=250,top=250,left=300')">
					给ta送花</a>
				</dd>
				<dd class="email">邮件：<a href="<?php echo $_html['email']?>"><?php echo $_html['email']?></a></dd>
				<dd class="url">网址：<a href="<?php echo $_html['url']?>"><?php echo $_html['url']?></a></dd>
			</dl>
		</div>
		<div id="pics">
			<h2>最新图片--<?php echo $_photo['name']?></h2>
			<a href="photo_detail.php?id=<?php echo $_photo['id']?>"><img src="thumb.php?filename=<?php echo $_photo['url']?>&percent=0.6" 
						title="<?php echo $_photo['url']?>"/></a>
<!--			<img src="<?php echo $_photo['url']?>" alt="<?php echo $_photo['name']?>"/>
-->		</div>
		<!--头尾分离-->
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>