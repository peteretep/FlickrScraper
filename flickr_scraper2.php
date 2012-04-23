<html>

  <?php
  
 # $tag=$_GET['tags'];
$feed = file_get_contents("http://localhost/shoutbox/xml.gne");

?>


<p id='feed' > </p>
<script type="text/javascript">
  var feed = unescape(' <?php echo rawurlencode($feed); ?> ');

  var txt="";
  parser =new DOMParser();
  xmlDoc=parser.parseFromString(feed, "text/xml"); 
  entry=xmlDoc.getElementsByTagName("entry");
  
  var randomnumber=Math.floor(Math.random()*(entry.length+1));

  content= entry[randomnumber].getElementsByTagName("content");
  txt=txt+content[0].firstChild.nodeValue +"</br>";
  
  document.write(txt);
    
  document.write("XML string is loaded into an xml dom object");

</script>

</html>



