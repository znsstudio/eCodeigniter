<?

foreach($storelist as $key=>$store){

?>

<b><font color=#741012><?=$store[store_name]?></font></b>

<p>

<?=$store[store_address]?>

<br>

<?=$store[store_city]?>,<?=$store[store_zip]?>

<br>

( <a target=_blank href='https://www.google.com/search?q=<?=$store[store_address]?> <?=$store[store_city]?>,<?=$store[store_zip]?>'> <font size=1> on map </font> </a> )

<p>

<?

}

?>