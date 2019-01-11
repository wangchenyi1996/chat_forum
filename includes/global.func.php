<?php
	header('content-Type:text/html;charset=utf-8');
	//耗时
	function run_time(){
		$m_time=explode(' ',microtime());
		return $m_time[0]+$m_time[1];
	}

//制作验证码
function code($_width=75,$_height=25,$_rnd_code=4,$flag=false){
	//创建随机码
	//$_rnd_code=4;
	$_nmsg='';
	for($i=0;$i<$_rnd_code;$i++){
		$_nmsg.=dechex(mt_rand(1,15));
	}
	
	//保存在session可以持久
	$_SESSION['code']=$_nmsg;
	//echo $_SESSION['code'];
	
	//设置图片长和高
	//$_width=75;
	//$_height=25;
	
	//创建一张图像
	$_img=imagecreatetruecolor($_width,$_height);

	//白色背景
	$_white=imagecolorallocate($_img,255,255,255);
	//填充到背景上
	imagefill($_img,0,0,$_white);

	//判断是否要边框
	//随机颜色边框
	if($flag==false){
		$_black=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);
	}
	
	//随即画出5个线条
	for($i=0;$i<6;$i++){
		$_rnd_color=imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rnd_color);
	}

	//随机雪花
	for($i=0;$i<10;$i++){
		$_rnd_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),"*",$_rnd_color);
	}

	//输出验证码

	for($i=0;$i<strlen($_SESSION['code']);$i++){
		$_rnd_color=imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
		//imagestring($_img,5,$i*$_width/4+mt_rand(0,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);
		imagestring($_img,5,$i*$_width/$_rnd_code+mt_rand(0,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);	
	}
	//输出图像
	header('Content-Type:image/png');
	imagepng($_img);
	
	//销毁图像
	imagedestroy($_img);
}
	
//JS弹出alert();并返回上一页面。
	function _alert_back($info){
		echo "<script type='text/javascript'>alert('".$info."');history.back();</script>";
		exit();
	}

//JS弹出alert();并关闭。
	function _alert_close($info){
		echo "<script type='text/javascript'>alert('".$info."');window.close();</script>";
		exit();
	}
	
	
//检查验证码
function _check_code($_first_code,$_end_code){
	if($_first_code!==$_end_code){
		//echo "<script type='text/javascript'>alert('验证码不正确哦，请重新输入。');history.back();</script>";
		//调用返回函数  _alert_back
		_alert_back("验证码不正确哦，请重新输入。");
	}
}

//跳转到首页index.php
function _location($info,$url){
	if(!empty($info)){
		echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
		exit();
	}else{
		header('Location:'.$url);
	}
}

//登录状态
function _login_state(){
	if(isset($_COOKIE['username'])){
		_alert_back('登陆状态无法进行本操作');
	}
}

//清除session
function _session_destroy(){
	if(session_start()){
		session_destroy();
	}
}

//删除cookie
function _unsetcookie(){
	setcookie('username','',time()-1);
	setcookie('password','',time()-1);
	_session_destroy();
	_location(null,'index.php');
}

//分页函数
function _page($type){
	global $_page,$pagemax,$num,$_id;
	if($type==1){
	echo '<div id="page_num">';
		echo'<ul>';	
			for($i=1;$i<=$pagemax;$i++){
				//把blog换成常量SCRIPT
				/*if($_page==$i){
					echo '<li><a href="blog.php?page='.($i).'" class="selected">'.($i).'</a></li>';
				}else{
					echo '<li><a href="blog.php?page='.($i).'">'.($i).'</a></li>';
				}*/
				if($_page==$i){
					echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.($i).'" class="selected">'.($i).'</a></li>';
				}else{
					echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.($i).'">'.($i).'</a></li>';
				}
			}	
		echo'</ul>';	
	echo '</div>';
	}elseif($type==2){
		echo '<div id="page_text">';
			echo '<ul style="text-align: center;">';
				//输出分页信息，显示上一页和下一页的连接
				echo "<br/><br/>";
				echo "<a>当前{$_page}/{$pagemax}页  | 共有{$num}条数据</a>";
				//把blog换成常量SCRIPT
				/*echo " <a href='blog.php?page=1'>首页</a> ";
				echo " <a href='blog.php?page=".($_page-1)."'>上一页</a> ";
				echo " <a href='blog.php?page=".($_page+1)."'>下一页</a> ";
				echo " <a href='blog.php?page={$pagemax}'>末页</a> ";*/
				
				echo ' <a href="'.SCRIPT.'.php?'.$_id.'page=1">首页</a> ';
				echo ' <a href="'.SCRIPT.'.php?'.$_id.'page='.($_page-1).'">上一页</a> ';
				echo ' <a href="'.SCRIPT.'.php?'.$_id.'page='.($_page+1).'">下一页</a> ';
				echo ' <a href="'.SCRIPT.'.php?'.$_id.'page='.$pagemax.'">末页</a> ';
			echo '</ul>';
		echo '</div>';
	}else{
		//如果参数都错了的话，就默认为第一种方式
		_page(1);
	}
}

function page($_sql,$size){//$_pagesize是每页的条数
	//定义全局变量，函数外也可以访问
	global $_pagesize,$_pagenum,$_page,$pagemax,$num;
	
	//先判断page,容错处理（page=0或者page=''）
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
	$_pagesize=$size;//每页的条数
	//首先获得所有数据总和
	$num=_num_rows(_query($_sql));
	if($num==0){
		$_page=1;
	}else{
		$pagemax=ceil($num/$_pagesize);//总的页数
	}
	//如果page大于总页码
	if($_page>$pagemax){
		$_page=$pagemax;
	}
	$_pagenum=($_page-1)*$_pagesize;
}

//将特殊字符转换为 HTML 实体
function _html($string){
	if(is_array($string)){
		foreach($string as $_key=>$_value){
		//$string[$_key]=htmlspecialchars($_value);
		$string[$_key]=_html($_value);	//递归
		}
	}else{
		$string=htmlspecialchars($string);
	}
	return $string;
}

//转义字符
function _mysql_string($string){
	if(!GPC){
		if(is_array($string)){
			foreach($string as $_key=>$_value){
			//$string[$_key]=htmlspecialchars($_value);
				$string[$_key]=_mysql_string($_value);	//递归
			}
		}else{
			$string=mysql_real_escape_string($string);
		}
	}
	
	return $string;
}
/*
 * 当表格中文字过多时，会影响布局。那这时我们应该让表格里的文字不要全部显示出来。只显示一部分
 */
function _title($_string){
	if(mb_strlen($_string,'utf-8')>20){
		$_string=mb_substr($_string,0,19,'utf-8').'...';
	}
	return $_string;
}

//设置xml
function _set_xml($_xmlfile,$_clean){
	$_fp=@fopen('new.xml','w');
	if(!$_fp){
		exit("文件不存在");
	}
	flock($_fp,LOCK_EX);
	$_string="<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="<vip>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<id>{$_clean['id']}</id>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<username>{$_clean['username']}</username>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<sex>{$_clean['sex']}</sex>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<face>{$_clean['face']}</face>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<email>{$_clean['email']}</email>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="\t<url>{$_clean['url']}</url>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	$_string="</vip>\r\n";
	fwrite($_fp,$_string,strlen($_string));
	
	flock($_fp,LOCK_UN);
	fclose($_fp);
}

//读取new.xml
function _get_xml($filexml){
	$_html=array();
	if(file_exists($filexml)){
		$_xml=file_get_contents($filexml);
		preg_match_all('/<vip>(.*)<\/vip>/s',$_xml,$dom);
		//print_r($dom);
		foreach($dom[1] as $_value){
			preg_match_all('/<id>(.*)<\/id>/s',$_value,$_id);	
			preg_match_all('/<username>(.*)<\/username>/s',$_value,$_username);	
			preg_match_all('/<face>(.*)<\/face>/s',$_value,$_face);	
			preg_match_all('/<sex>(.*)<\/sex>/s',$_value,$_sex);
			preg_match_all('/<email>(.*)<\/email>/s',$_value,$_email);	
			preg_match_all('/<url>(.*)<\/url>/s',$_value,$_url);
					
			$_html['id']=$_id[1][0];
			$_html['username']=$_username[1][0];
			$_html['face']=$_face[1][0];
			$_html['sex']=$_sex[1][0];
			$_html['email']=$_email[1][0];
			$_html['url']=$_url[1][0];
		}
	}else{
		echo '文件不存在';
	}
	return $_html;
}

//将\n换成</br>
function _ubb($_string){
	$_string=nl2br($_string);//换行
	$_string=preg_replace('/\[b\](.*)\[\/b\]/U','<strong>\1</strong>',$_string);//加粗
	$_string=preg_replace('/\[i\](.*)\[\/i\]/U','<em>\1</em>',$_string);//倾斜
	$_string=preg_replace('/\[u\](.*)\[\/u\]/U','<span style="text-decoration: underline">\1</span>',$_string);//下划线
	$_string=preg_replace('/\[size=(.*)\](.*)\[\/size\]/U','<span style="font-size: \1px">\2</span>',$_string);//字体大小
	$_string=preg_replace('/\[img\](.*)\[\/img\]/U','<img src="\1" alt="图片"/>',$_string);//图片
	$_string=preg_replace('/\[flash\](.*)\[\/flash\]/U','<embed style="width:400px;height:400px" src="\1"/>',$_string);//flash视频
	$_string=preg_replace('/\[color=(.*)\](.*)\[\/color\]/U','<span style="color:\1">\2</span>',$_string);//颜色
	$_string=preg_replace('/\[url\](.*)\[\/url\]/U','<a href="\1">\1</a>',$_string);//超链接
	$_string=preg_replace('/\[email\](.*)\[\/email\]/U','<a href="\1">\1</a>',$_string);//emaill
	
	return $_string;
}

//等比缩放函数
/*_thumb($_filename,$_percent)
 * 第一个参数表示源文件，第二个参数表示要缩放多少比如50%，75%等
 */
function _thumb($_filename,$_percent){
	//缩略图
	header('Content-type:image/png');//生成png标头文件
	//获取文件的后缀
	$_n=explode('.',$_filename);
	//获取文件的宽和高
	list($_width,$_height)=getimageSize($_filename);
    //生成微缩的宽和高
    $_new_width=$_width*$_percent;
    $_new_height=$_height*$_percent;
    //创建一个微缩后新的图像源（目标图像）
    $_new_image=imagecreatetruecolor($_new_width,$_new_height);
    // 获取图片类型，并创建对应图片资源---源图像
    switch($_n[1]){	
        case 'gif':
              $im=imagecreatefromgif($_filename); 
              break;                  
        case 'jpg':
              $im=imagecreatefromjpeg($_filename);
              break;
        case 'png':
             $im=imagecreatefrompng($_filename);  
              break;
        default:
             die("图像类型错误");
    }
    $_image=imagecreatefromjpeg($_filename);
    //执行等比缩放
    imagecopyresampled($_new_image,$_image,0,0,0,0,$_new_width,$_new_height,$_width,$_height);
    imagepng($_new_image);
    //释放图片资源
    imagedestroy($_new_image);
    imagedestroy($_image);
}

//删除非空目录
function removeDir($dirName){
    if(!is_dir($dirName)){
        return false;
    }
    $handle = @opendir($dirName);
    while(($file = @readdir($handle)) !== false){
        if($file != '.' && $file != '..'){
            $dir = $dirName . '/' . $file;
            is_dir($dir) ? removeDir($dir) : @unlink($dir);
        }
    }
    closedir($handle);
    
    return rmdir($dirName) ;
}

?>