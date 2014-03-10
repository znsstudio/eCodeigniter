<? $this->load->view("header"); ?>



<center>



<table  border="0" cellpadding="0" cellspacing="0" width="700" height="300"> 



<tr>



<form action=/signin method=post>

<td height=40 width=250 align=left>

<?

if($this->uri->segment(2)=="signinerror"){

?>

<div style=padding-top:5px;padding-bottom:5px;color:red;font-size:12px>Incorrect email or password</div>

<?

}

?>

<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 



<tr><td height=35 width=100> email </td> <td> <input type=text name=member_email size=30> </td> </tr>



<tr><td height=35> password </td> <td> <input type=password name=member_pass size=30> </td> </tr>



<tr><td height=35>  </td> <td> <input type=submit  value="SIGN IN" style="padding:5px"> </td> </tr>



<tr><td height=35 colspan=2>  <a href=/forgot_password> Forgot Password? </a> </td> </tr>



</table>



</td>



</form>



<td width=100> </td>



<form action=/signup method=post>


<td align=right width=250>



<center>



IF YOU ARE NOT MEMBER, SIGN UP NOW



<P>



<input type=submit value="SIGN UP" style="padding:5px">



<P>

</form>


<? if($this->session->userdata('basket_total_pay')>0){ ?>

- OR -

<P>

<form action=/checkout/guest method=post>

<input type=submit value="CHECKOUT AS GUEST" style="padding:5px">

</form>

<? } ?>

</td>

</tr>

</form>

</table>


<? $this->load->view("footer"); ?>