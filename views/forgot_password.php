<? $this->load->view('header'); ?>

<div id="mine">
<table border="0" cellpadding="0" cellspacing="0" width="100%">  
<tbody><tr>
<td width="50%" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="995" height="500"><tbody><tr><td height="550"><center><div id="topic">FORGOT PASSWORD?</div><p>
<table border="0" cellpadding="0" cellspacing="0" width="">
<form name="myform" action="/forgot_password" method="POST" enctype="multipart/form-data">
<tbody><tr><td height="25">Your fullname</td><td><input type="text" name="member_fullname" id="member_fullname" size="30" value=""> </td></tr>
<tr><td height="25">Your email</td><td><input type="text" name="member_email" id="member_email" size="30" value=""> </td></tr>
<tr><td width="160" height="30"></td><td height="25"> enter below code to right box</td></tr>
<tr><td height="25"><img src="http://www.yoonnyc.com/pic_captcha.php"></td><td><input type="text" name="captcha_code" id="captcha_code" size="30" value=""> </td></tr>
<tr><td height="30"></td><td><input type="submit" value="send my password"></td></tr></tbody></table></form>
</p></center></td></tr></tbody></table>
</td>
<td valign="top">
</td>
</tr>
</tbody></table>
</div>

<? $this->load->view('footer'); ?>