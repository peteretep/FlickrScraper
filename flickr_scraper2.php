  <?php
  
 # $tag=$_GET['tags'];
#$feed = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags= . $tag");

#echo $feed;
?>

<p id='feed' > </p>
<script type="text/javascript">
  var feed = "http://localhost/FlickrScraper/xml.gne"

  var xmlhttp;
  var entry, i, title, content;
  var txt ="";
  try 
  {
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", feed, false);
    xmlhttp.send();  
  }
  catch (er)
  {
    alert ("error");  
  }
  xmlDoc=xmlhttp.responseXML
  entry=xmlhttp.responseXML.documentElement.getElementsByTagName("entry");
  var randomnumber=Math.floor(Math.random()*(entry.length+1));

  content= entry[randomnumber].getElementsByTagName("content");
  txt=txt+content[0].firstChild.nodeValue +"</br>"




  document.getElementById('feed').innerHTML=txt;

</script>





