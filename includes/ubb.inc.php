<?php
	//header('content-Type:text/html;charset=utf-8');
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
?>
<div id="ubb">
	<img src="ubbimg/1.png" title="字体放大" alt="字体放大"/><img src="ubbimg/2.png" title="字体缩小" alt="字体缩小"/>
	<img src="ubbimg/3.png" title="文字靠右" alt="文字靠右"/><img src="ubbimg/4.png" title="文字靠左" alt="文字靠左"/>
	<img src="ubbimg/5.png" title="加粗" alt="加粗"/><img src="ubbimg/13.png" title="字体颜色" alt="字体颜色"/>
	<img src="ubbimg/7.png" title="首行缩进" alt="首行缩进"/><img src="ubbimg/8.png" title="视频" alt="视频"/>
	<img src="ubbimg/9.png" title="图片" alt="图片"/><img src="ubbimg/10.png" title="倾斜" alt="倾斜"/>
	<img src="ubbimg/11.png" title="向下拉" alt="向下拉"/><img src="ubbimg/12.png" title="向上拉" alt="向上拉"/>
	<img src="ubbimg/6.png" title="分栏" alt="分栏"/><img src="ubbimg/14.png" title="下划线" alt="下划线"/>
	<img src="ubbimg/15.png" title="电子邮件" alt="电子邮件"/><img src="ubbimg/16.png" title="超链接" alt="超链接"/>
</div>
<div id="font">
	<strong onclick="font(10)">10px</strong>
	<strong onclick="font(12)">12px</strong>
	<strong onclick="font(14)">14px</strong>
	<strong onclick="font(16)">16px</strong>
	<strong onclick="font(18)">18px</strong>
	<strong onclick="font(20)">20px</strong>
	<strong onclick="font(22)">22px</strong>
	<strong onclick="font(24)">24px</strong>
</div>
<div id="color">
	<strong style="background: red;" onclick="showcolor('red')" title="red"></strong>
	<strong style="background: darkred;" onclick="showcolor('darkred')" title="darkred"></strong>
	<strong style="background: indianred;" onclick="showcolor('indianred')" title="indianred"></strong>
	<strong style="background: mediumvioletred;" onclick="showcolor('mediumvioletred')" title="mediumvioletred"></strong>
	<strong style="background: palevioletred;" onclick="showcolor('palevioletred')" title="palevioletred"></strong>
	<strong style="background: orange;" onclick="showcolor('orange')" title="orange"></strong>
	<strong style="background: orangered;" onclick="showcolor('orangered')" title="orangered"></strong>
	<strong style="background: coral;" onclick="showcolor('coral')" title="coral"></strong>
	<strong style="background: darkorange;" onclick="showcolor('darkorange')" title="darkorange"></strong>
	<strong style="background: yellow;" onclick="showcolor('yellow')" title="yellow"></strong>
	<strong style="background: lightgoldenrodyellow;" onclick="showcolor('lightgoldenrodyellow')" title="lightgoldenrodyellow"></strong>
	<strong style="background: yellowgreen;" onclick="showcolor('yellowgreen')" title="yellowgreen"></strong>
	<strong style="background: greenyellow;" onclick="showcolor('greenyellow')" title="greenyellow"></strong>
	<strong style="background: green;" onclick="showcolor('green')" title="green"></strong>
	<strong style="background: darkgreen;" onclick="showcolor('darkgreen')" title="'darkgreen'"></strong>
	<strong style="background: darkseagreen;" onclick="showcolor('darkseagreen')" title="darkseagreen"></strong>
	<strong style="background: blue;" onclick="showcolor('blue')" title="blue"></strong>
	<strong style="background: cadetblue;" onclick="showcolor('cadetblue')" title="cadetblue"></strong>
	<strong style="background: cornflowerblue;" onclick="showcolor('cornflowerblue')" title="cornflowerblue"></strong>
	<strong style="background: deepskyblue;" onclick="showcolor('deepskyblue')" title="deepskyblue"></strong>
	<strong style="background: cornflowerblue;" onclick="showcolor('cornflowerblue')" title="cornflowerblue"></strong>
	<strong style="background: mediumblue;" onclick="showcolor('mediumblue')" title="mediumblue"></strong>
	<strong style="background: royalblue;" onclick="showcolor('royalblue')" title="royalblue"></strong>
	<strong style="background: violet;" onclick="showcolor('violet')" title="violet"></strong>
	<strong style="background: blueviolet;" onclick="showcolor('blueviolet')" title="blueviolet"></strong>
	<strong style="background: darkviolet;" onclick="showcolor('darkviolet')" title="darkviolet"></strong>
	<strong style="background: mediumvioletred;" onclick="showcolor('mediumvioletred')" title="mediumvioletred"></strong>
	<strong style="background: black;" onclick="showcolor('black')" title="black"></strong>
	<strong style="background: sandybrown;" onclick="showcolor('sandybrown')" title="sandybrown"></strong>
	<strong style="background: gainsboro;" onclick="showcolor('gainsboro')" title="gainsboro"></strong>
	<strong style="background: rosybrown;" onclick="showcolor('rosybrown')" title="rosybrown"></strong>
	<strong style="background: floralwhite;" onclick="showcolor('floralwhite')" title="floralwhite"></strong>
	<strong style="background: navajowhite;" onclick="showcolor('navajowhite')" title="navajowhite"></strong>
	<strong style="background: white;" onclick="showcolor('white')" title="white"></strong>
	<strong style="background: antiquewhite;" onclick="showcolor('antiquewhite')" title="antiquewhite"></strong>
	<em><input type="text" name="writecolor"value="" /></em>
</div>