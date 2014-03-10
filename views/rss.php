<?
header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="utf-8"?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0" xmlns:georss="http://www.georss.org/georss" xmlns:media="http://search.yahoo.com/mrss/">' . "\n";

?>
<channel>
<title>YOON NYC</title>
<link>http://www.yoonnyc.com</link>
<description>Yoon sweaters, cashmere sweaters, contemporary sweaters, trendy sweaters, stitches, stripes, casual essentials, pure cashmere, intarsia, pullovers, cardgian, tunics, cashmere, knitwear, sweaters, dresses, contemporary, leggings, hats, scrafs</description>
<?

foreach($static_list as $key=>$value){

echo "<item>";

		echo "<title>".trim($value[static_name])."</title>
			<link>https://www.yoonnyc.com/product/".$value[static_alias]."</link>
			<description>".htmlentities("<img src=http://www.yoonnyc.com/temp/194_$value[static_pic]><p>").$value[static_cost]." USD".htmlentities("<p><a href=http://www.yoonnyc.com/product/$value[static_alias]>BUY NOW</a>")."</description>";

			?>

   
          <pubDate><?php echo date("c",date("U")); ?></pubDate>
	      <media:title><?php echo $value['static_name']; ?></media:title>
	      <media:description>&lt;img src="<? echo "http://www.yoonnyc.com/temp/194_$value[static_pic]"; ?>"/&gt;</media:description>
	      <media:content url="<? echo "http://www.yoonnyc.com/temp/194_$value[static_pic]"; ?>" width="194" type="image/jpeg" height="274">
	      </media:content>
	        <media:thumbnail url="<? echo "http://www.yoonnyc.com/temp/194_$value[static_pic]"; ?>" width="194" height="274">
	      </media:thumbnail>
        </item>   

<?

}

?>

</channel>
</rss>