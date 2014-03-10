<? $this->load->view("header"); ?>

<div id="mine">
<div id="topic">CONTACT US</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">  
<tbody><tr>
<td width="50%" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<form name="myform" action="/contactus" method="POST" enctype="multipart/form-data">
<tbody><tr><td height="25">Your fullname</td><td><input type="text" name="your_fullname" id="your_fullname" size="30" value=""> </td></tr>
<tr><td height="25">Your email</td><td><input type="text" name="your_email" id="your_email" size="30" value=""> </td></tr>
<tr><td height="25">Tel</td><td><input type="text" name="your_mobile" id="your_mobile" size="30" value=""> </td></tr>
<tr><td colspan="2" height="2"></td></tr><tr><td valign="top">Message</td><td><textarea name="your_content" id="your_content" cols="60" rows="10"></textarea></td></tr>
<tr><td width="160" height="30"></td><td height="25"> enter below code to right box</td></tr>
<tr><td height="25"><img src="http://www.yoonnyc.com/pic_captcha.php"></td><td><input type="text" name="captcha_code" id="captcha_code" size="30" value=""> </td></tr>
<tr><td height="30"></td><td><input type="submit" value="send message"></td></tr></tbody></table></form>
</td>
<td valign="top">
<p class="MsoNormal" style="margin: 0px;">For further inquires please contact YOON directly at:</p><p class="MsoNormal" style="margin: 0px;"><br></p><p class="MsoNormal" style="margin: 0px;">Rosa Ciaccio</p><p class="MsoNormal" style="margin: 0px;">rosa@yoonnyc.com</p><p class="MsoNormal" style="margin: 0px;">646.449.7241</p><p class="MsoNormal" style="margin: 0px;"><br></p><div>For press inquries please contact</div><div><br></div><div>Jamie Reisman / Sarah Stearns<br><div><br></div><div><div>BWR PR</div><div>292 Madison Ave #9</div><div>New York, NY 10017</div><div><a href="tel:212.901.3920" value="+12129013920" target="_blank">212.901.3920</a></div></div></div><p class="MsoNormal" style="margin: 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);"><br></p>	
</td>
</tr>
</tbody></table>
</div>

<? $this->load->view("footer"); ?>
