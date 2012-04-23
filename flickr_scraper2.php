<html>

  <?php
  
$tag=$_GET['tags'];

$feed1 = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags={$tag}");
$feed = str_replace("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>" , "", $feed1);

?>


<p id='feed' > </p>
<script type="text/javascript">
  var feed = unescape(' <?php echo rawurlencode($feed); ?> ');
  
  //document.write(feed);
  var txt="";
  parser =new DOMParser();
  xmlDoc=parser.parseFromString(feed, "text/xml"); 
  entry=xmlDoc.getElementsByTagName("entry");
  
  var randomnumber=Math.floor(Math.random()*(entry.length+1));

  content= entry[randomnumber].getElementsByTagName("content");
  txt=txt+content[0].firstChild.nodeValue +"</br>";
  
  document.write(txt);
    
  

</script>

</html>



