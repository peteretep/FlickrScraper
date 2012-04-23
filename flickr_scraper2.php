<?xml version="1.0" encoding="utf-8" standalone="yes"?> 
  <?php
  
 # $tag=$_GET['tags'];
$feed = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne");

?>

<p id='feed' > </p>
<script type="text/javascript">
  var feed = unescape(' <?php echo rawurlencode($feed); ?> ');
  
  parser =new DOMParser();
  xmlDoc=parser.parseFromString(feed, "text/xml");
    
    
  document.getElementById('feed').innerHTML=xmlDoc;


</script>





