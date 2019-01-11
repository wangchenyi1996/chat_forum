<?php
	session_start();//开启会话
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','article');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//处理回复，接收数据
	if(!empty($_GET['action'])=='rearticle'){
		//验证码判断
		_check_code($_POST['code'],$_SESSION['code']);
		//接收帖子内容
		$_clean=array();
		$_clean['reid']=$_POST['reid'];
		$_clean['type']=$_POST['type'];
		$_clean['title']=$_POST['title'];
		$_clean['content']=$_POST['content'];
		$_clean['username']=$_COOKIE['username'];
		$_clean=_mysql_string($_clean);
		
		//把内容写入数据表中
		_query(
				"INSERT INTO tg_article(
							tg_reid,
							tg_username,
							tg_type,
							tg_title,
							tg_content,
							tg_date
							)
					VALUES(
					'{$_clean['reid']}',
					'{$_clean['username']}',
					'{$_clean['type']}',
					'{$_clean['title']}',
					'{$_clean['content']}',
					NOW()
				    )
		");
		//显示评论数
		_query(
				"UPDATE tg_article SET tg_commendcount=tg_commendcount+1
								WHERE tg_reid=0 AND tg_id='{$_clean['reid']}'
				");
		
		//关闭数据库
		_close();
		//清除session
		_session_destroy();
		//'帖子回复成功'
		_location('恭喜你回复帖子成功','article.php?id='.$_clean['reid']);
	}
	//读出数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT 
										tg_id,tg_username,
										tg_type,tg_title,tg_content,
										tg_readcount,tg_commendcount,tg_last_modify,tg_date
									FROM tg_article 
									 WHERE tg_reid=0	AND
									 	tg_id='{$_GET['id']}'")){
			//累积阅读量	每刷新一次阅读量加一
			_query("UPDATE tg_article SET tg_readcount=tg_readcount+1 WHERE tg_id='{$_GET['id']}'");						 	
			$_html=array();
			$_html['reid']=$rows['tg_id'];
		   	$_html['username_subject']=$rows['tg_username'];
		   	$_html['type']=$rows['tg_type'];
		   	$_html['title']=$rows['tg_title'];
		   	$_html['content']=$rows['tg_content'];
		   	$_html['readcount']=$rows['tg_readcount'];
		   	$_html['commendcount']=$rows['tg_commendcount'];
		   	$_html['last_modify']=$rows['tg_last_modify'];
		   	$_html['date']=$rows['tg_date'];
		   	
		   	//创建一个全局变量
		   	global $_id;
		   	$_id='id='.$_html['reid'].'&';
		   	
		   	//print_r($_html);
			//拿出用户名去查找用户信息
			if(!!$rows=_fetch_array("SELECT tg_id,tg_sex,
											tg_face,tg_email,
											tg_url,tg_switch,tg_autograph
											FROM tg_user 
											WHERE tg_username='{$_html['username_subject']}'")){
				//提取用户信息
				$_html['userid']=$rows['tg_id'];
				$_html['sex']=$rows['tg_sex'];
			   	$_html['face']=$rows['tg_face'];
			   	$_html['email']=$rows['tg_email'];
			   	$_html['url']=$rows['tg_url'];
			   	$_html['switch']=$rows['tg_switch'];
	   	 		$_html['autograph']=$rows['tg_autograph'];
			   	$_html=_html($_html);

			   	//主题帖修改
//			   	if($_html['username_subject']==$_COOKIE['username']){
//			   		$_html['subject_modify']='[修改]';
//			   	}
			   	$_html['subject_modify']=
			   				'[<a href="article_modify.php?id='.$_html['reid'].'">修改</a>]';
			   	
			   	//读取最后修改信息
			   	if($_html['last_modify']!='0000-00-00 00:00:00'){
			   		$_html['last_modify_string']='本帖已由['.$_html['username_subject'].']于'.$_html['last_modify'].'修改过！';
			   	}
			   	
			   	//给楼主回复
			   	if($_COOKIE['username']){
			   		$_html['re']='<span><a href="#ree" name="re" title="回复1楼的'.$_html['username_subject'].'">[回复]</a></span>';
			   	}
			   	
			   	//个性签名
			   	if($_html['switch']==1){
			   		$_html['autograph_html']='<p class="autograph">'.$_html['autograph'].'</p>';
			   	}
			   	
			   	//读取回帖
			   	//分页模块
				global $_pagenum,$_pagesize,$_page;
				page("SELECT tg_id FROM tg_article WHERE tg_reid='{$_html['reid']}'",8);
				$result=_query("SELECT tg_username,tg_type,tg_title,tg_content,tg_date
										FROM tg_article
										WHERE tg_reid='{$_html['reid']}'
										
								");
										/*LIMIT $_pagenum,$_pagesize*/
			}else{//这个用户已经删除
				
			}
		}else{
			_alert_back('此主题不存在哦！');
		}
	}else{
		_alert_back("非法操作！");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--帖子详情</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
			<script src="js/code.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/article.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="article">
			<h2>帖子详情</h2>
			
			<?php 
				if($_page==1){
			?>
			<div id="subject">
				<dl>
					<dd class="user"><?php echo $_html['username_subject'];?>(<?php echo $_html['sex']?>)[楼主]</dd>
					<dt><img src="<?php echo $_html['face'] ?>" title="<?php echo $_html['username_subject']?>"/></dt>
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
						<span><?php echo $_html['subject_modify']?> 1#</span><?php echo $_html['username_subject']?>  | 发表于 <?php echo $_html['date']?>
					</div>
					<h3><img src="img/icon<?php echo $_html['type']?>.jpg" alt="icon" title="icon<?php echo $_html['type']?>.jpg"/>主题：<?php echo $_html['title']?><?php echo $_html['re']?></h3>
					<div class="detail">
						<?php echo _ubb($_html['content'])?>
						<?php echo $_html['autograph_html']?>
						<!--<p class="autograph"><?php echo $_html['autograph']?></p>-->
					</div>
					<div class="read">
						<p style="text-align: right; padding-bottom: 10px;"><?php echo $_html['last_modify_string']?></p>
						阅读量（<?php echo $_html['readcount']?>） 评论量（<?php echo $_html['commendcount']?>）
					</div>
				</div>
			</div>
			<?php }?>
				
			<p class="line"></p>
			
			<?php 
				$_i=2;
				 while(!!$rows=_fetch_array_list($result)){
				 	$_html['username']=$rows['tg_username'];
					$_html['type']=$rows['tg_type'];
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
			   	
			   	
			   	//楼层
			   	if($_page==1&&$_i==2){
			   		if($_html['username']==$_html['username_subject']){
			   			$_html['username_html'].=$_html['username'].'(楼主)';
			   		}else{
			   			$_html['username_html'].=$_html['username'].'(沙发)';
			   		}
			   	}else{
			   		$_html['username_html']=$_html['username'];
			   	}
			   	
			}else{
				//这个用户可能已经删除
			}
			//跟贴回复
			if($_COOKIE['username']){
				$_html['re']='<span><a href="#ree" name="re" 
								title="回复'.($_i+(($_page-1)*$_pagesize)).'楼的'.$_html['username'].'">回复</a></span>';
			}
			?>
			<div class="re">
				<dl>
					<dd class="user"><?php echo $_html['username_html'];?>(<?php echo $_html['sex']?>)</dd>
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
						<img src="img/icon<?php echo $_html['type']?>.jpg" alt="icon" title="icon<?php echo $_html['type']?>.jpg"/>主题：<?php echo $_html['retitle']?>
						<!--<span style="font-size: 12px; font-weight: normal; color: #06f;">
							[<a href="#ree" name="re" title="回复.'<?php echo $_i+(($_page-1)*$_pagesize);?>'.楼的'.<?php echo $_html['username']?>.'"
								style="text-decoration: none; color: #0066FF;" >
							回复</a>]
						</span>-->
						<?php echo $_html['re']?>
					</h3>
					<div class="detail">
						<?php echo _ubb($_html['content'])?>
					</div>
					
				</div>
			</div>
			<p class="line"></p>
			<?php 
					$_i++;
				}
				_free_result($result);
				//参数1表示数字分页，参数二表示文本分页
				//_page(1);
				_page(2);		
			?>
			<!--登陆后才能huifu帖子-->
			<?php if(isset($_COOKIE['username'])){ ?>
			<a name="ree"></a>
			<form action="article.php?action=rearticle" method="post">
				<input type="hidden" name="reid" value="<?php echo $_html['reid']?>" />
				<input type="hidden" name="type" value="<?php echo $_html['type']?>" />
				<dl>
					<dd>标&nbsp;&nbsp;题   ：&nbsp;<input type="text" name="title" class="text" value="RE:<?php echo $_html['title']?>"/>(*必填，2~40位)</dd>
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