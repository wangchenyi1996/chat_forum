<?php
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','blog');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//分页模块
	global $_pagenum,$_pagesize;
	page("SELECT tg_id FROM tg_user",10);//参数1表示总的条数，参数二表示每页多少条
	/*$page=1,表示1-10条数据，limit 0，10 $_pagenum=0
	 *$page=2,表示11-20条数据，limit 10，10	$_pagenum=10
	 *$page=3,表示21-30条数据，limit 20，10	$_pagenum=20
	 *limit 的第一个参数=（$_page-1）*$_pagesize
	 */
	/*//先判断page,容错处理（page=0或者page=''）
	if(isset($_GET['page'])){
		$_page=$_GET['page'];
		if(empty($_page)||$_page<0||!is_numeric($_page)){
			$_page=1;
		}else{//page=2.5(取整)
			$_page=intval($_page);
		}
	}else{
		$_page=1;
	}
	$_pagesize=10;//每页的条数
	//首先获得所有数据总和
	$num=_num_rows(_query("SELECT tg_id FROM tg_user"));
	if($num==0){
		$_page=1;
	}else{
		$pagemax=ceil($num/$_pagesize);//总的页数
	}
	//如果page大于总页码
	if($_page>$pagemax){
		$_page=$pagemax;
	}
	$_pagenum=($_page-1)*$_pagesize;*/
	
	//1、从数据库提取数据
	//$result=mysql_query("SELECT tg_username,tg_sex,tg_face FROM tg_user limit $_pagenum,$_pagesize");
	//调用函数来完成
	$result=_query("SELECT tg_id,tg_username,tg_sex,tg_face FROM tg_user limit $_pagenum,$_pagesize");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--博友</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script src="js/blog.js" type="text/javascript" charset="utf-8"></script>
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
		<div id="blog">
			<h2>博友列表</h2>
			<?php
				 while(!!$rows=_fetch_array_list($result)){
				 $_html=array();
				 $_html['id']=$rows['tg_id'];
			   	 $_html['username']=$rows['tg_username'];
			   	 $_html['face']=$rows['tg_face'];	
			   	 $_html['sex']=$rows['tg_sex'];
			   	 $_html=_html($_html);
			?>
			<dl>
				<dd class="user"><?php echo $_html['username'];?>(<?php echo  $_html['sex'];?>)</dd>
				<dt><img src="<?php echo $_html['face']?>"/></dt>
				<dd class="message"><a href="javascript:;" name="message" title="<?php echo $_html['id'];?>">发短信</a></dd>
				<dd class="friend"><a href="javascript:;" name="friend" title="<?php echo $_html['id'];?>"
					onclick="javascript:window.open('friend.php','friend','width=400,height=250,top=200,left=200')">
					加为好友</a></dd>
				<dd class="guest">写留言</dd>
				<dd class="flower"><a href="javascript:;" name="flower" title="<?php echo $_html['id'];?>"
					onclick="javascript:window.open('flower.php','flower','width=400,height=250,top=250,left=300')">
					给ta送花</a></dd>
			</dl>
			<?php }
				_free_result($result);
				//参数1表示数字分页，参数二表示文本分页
				_page(1);
				_page(2);	
			?>
			
			<!--<div id="page_num">
				<ul>
					<?php
					for($i=1;$i<=$pagemax;$i++){
						if($_page==$i){
							echo '<li><a href="blog.php?page='.($i).'" class="selected">'.($i).'</a></li>';
						}else{
							echo '<li><a href="blog.php?page='.($i).'">'.($i).'</a></li>';
						}
					}	
					?>
				</ul>
			</div>-->
			
			<!--<div id="page_text">
				<ul style="text-align: center;">
					<?php
					//输出分页信息，显示上一页和下一页的连接
					echo "<br/><br/>";
					echo "当前{$_page}/{$pagemax}页  |";
					echo "共有{$num}个会员";
					echo " <a href='blog.php?page=1'>首页</a> ";
					echo " <a href='blog.php?page=".($_page-1)."'>上一页</a> ";
					echo " <a href='blog.php?page=".($_page+1)."'>下一页</a> ";
					echo " <a href='blog.php?page={$pagemax}'>末页</a> ";
					?>
				</ul>
			</div>-->
		</div>
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>