<?

header("Content-type: text/xml");

$result.='<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="
            http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/09/sitemap.xsd">';


$result.="<url>
	<loc>https://www.yoonnyc.com/</loc>
	<priority>1.0</priority>
	<lastmod>".date("Y-m-d")."T".date("H:i:s")."+00:00</lastmod>
	<changefreq>daily</changefreq>
</url>
";	

foreach($static_list as $key=>$value){

$result.="<url>
	<loc>https://www.yoonnyc.com/product/".trim(strtolower(str_replace(" ", "-", $value[static_name])))."</loc>
	<priority>1.0</priority>
	<lastmod>".date("Y-m-d")."T".date("H:i:s")."+00:00</lastmod>
	<changefreq>daily</changefreq>
</url>
";	

}	

$result.="</urlset>";

echo $result;

?>