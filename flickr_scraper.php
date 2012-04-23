<html>
<head>
<title>Flickr Image Scraper by DCU
</head>
<body>
  <! -- This is the HTML form / Search box -->
  Enter A Tag To Search For Photos
  <form name="tagbox" action="?" method="get" target="_self" >
    <input type="text" id="tags" name="tags"/>
    <input type="submit" value="Submit"/>
  
  </form>
  
  <!-- The PHP connects to the flickr feed. -->  
  <?php

  if (isset($_Get['tags']))
  {  
    #checks if tag is being searched for, if so adds it to the variable
    $tag=$_GET['tags'];
  }
  # Gets the content of the feed and adds it to the variable
  $feed1 = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags={$tag}");

  #This line removes the doctype heading from the string variable
  $feed = str_replace("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>" , "", $feed1);

  ?>


  <script type="text/javascript">
   // changes the contents of the php feed variable to a JS variable
    var feed = unescape(' <?php echo rawurlencode($feed); ?> ');
   
    var photoContent="";
    //initialises a new DOM parser
    parser =new DOMParser();
    xmlDoc=parser.parseFromString(feed, "text/xml"); 
    
    var entry=xmlDoc.getElementsByTagName("entry");
    
    //creates a random number to select what entry to show
    var randomnumber=Math.floor(Math.random()*(entry.length+1));

    var content= entry[randomnumber].getElementsByTagName("content");
    
    photoContent=photoContent+content[0].firstChild.nodeValue +"</br>";
    //writes the photoContent to the screen
    document.write(photoContent);
      
  </script>


  </body>
</html> 
