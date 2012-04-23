<html>

  <?php
  
 # $tag=$_GET['tags'];
$feed = file_get_contents("http://localhost/FlickrScraper/xml.gne");

?>


<p id='feed' > </p>
<script type="text/javascript">
  var feed = unescape(' <?php echo rawurlencode($feed); ?> ');
  
  parser =new DOMParser();
  content=parser.parseFromString(feed, "text/xml"); 
  txt=content.getElementsByTagName("entry")[0].childNodes[0].nodeValue;
  document.write(txt);
    
  document.write("XML string is loaded into an xml dom object");

</script>

</html>



