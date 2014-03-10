<? 

$this->load->view('header');

?>

<h2>Your Orders</h2>

<table cellpadding="0" cellspacing="0" width="995" border="0">
	
<?

echo "<tr>

<td width=150 style=padding:5px><b>Order ID</td>

<td width=150 style=padding:5px><b>Order Date</td>

<td width=150 style=padding:5px><b>Order Amount</td>

<td width=250 style=padding:5px><b>Order Status</td>

<td width=100 align=right style=padding:5px><b>Details</td>

</tr>";

foreach ($orders as $key => $value) {

if($i==0){

echo "<tr bgcolor=#eee>";

}
else
{

echo "<tr>"; $i="-1";

}

echo "

<td style=padding:5px>$value[transaction_id]</td>

<td style=padding:5px>$value[order_date]</td>

<td style=padding:5px>$ $value[order_amount]</td>

<td style=padding:5px>$value[order_note]</td>

<td width=100 align=right style=padding:5px><a href=/member/order_details/$value[id]>details</a></td>

</tr>";

$i=$i+1;

}

?>

</table>

<?

$this->load->view('footer'); 

?>