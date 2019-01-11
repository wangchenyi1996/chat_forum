<?php
	//error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','member_message_detail');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";
	//判断是否登录状态
	if(!isset($_COOKIE['username'])){
		_alert_back('请先登录');
	}
	//删除信息模块
	if(!empty($_GET['action'])=='delete'&&isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_id FROM tg_message WHERE tg_id='{$_GET['id']}'")){
		  //删除单条短信
		  _query("DELETE FROM tg_message WHERE tg_id='{$_GET['id']}' LIMIT 1");
		  //判断是否修改成功
		  //关闭数据库
		  _close();
		  //清除session
		  _session_destroy();
		  //跳转到首页member.php
		  _location('删除此条短信成功','member_message_detail.php');
		}else{
			_alert_back('此短信不存在,不能删除哦！');
		}
	}
	
	//判断id
	if(isset($_GET['id'])){
		//获取数据
	   $rows=_fetch_array("SELECT tg_id,tg_from_touser,tg_content,tg_state,tg_time FROM tg_message WHERE tg_id='{$_GET['id']}'");
	   if($rows){
	   	//将state状态设置为1
	   	if(empty($rows['tg_state'])){
	   		_query("UPDATE tg_message SET tg_state=1 WHERE tg_id='{$_GET['id']}' LIMIT 1");
	   	}
	   	 $_html=array();
	   	 $html['id']=$rows['tg_id'];
	   	 $_html['from_touser']=$rows['tg_from_touser'];
	   	 $_html['content']=$rows['tg_content'];
	   	 $_html['time']=$rows['tg_time'];
	   	 $_html=_html($_html);
	   }else{
	   	_alert_back('此短信不存在');
	   }
	}else{
		_alert_back("非法操作。");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--短信列表</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script type="text/javascript" src="js/member_message_detail.js"></script>
	</head>
	<body>
		<?php require ROOT_PATH."includes/header.inc.php";?>
		<div id="member">
			<?php require ROOT_PATH."includes/member.inc.php";?>
			<div id="member_main">
				<h2>短信详情中心</h2>
				<dl>
					<dd>发信人：<?php echo $_html['from_touser'] ?></dd>
					<dd>内    容：<?php echo $_html['content']?></dd>
					<dd>发信时间：<?php echo $_html['time'] ?></dd>
					<dd>
						<input class="text" type="button" value="返回列表" id="return" />
						<input class="text" type="button" value="删除短信" id="delete" name="<?php echo $html['id']?>" />
					</dd>
				</dl>
			</div>	
		</div>
		<?php require ROOT_PATH."includes/footer.inc.php";?>
	</body>
</html>