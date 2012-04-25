<!--Flickr Image Scraper by Peter Armstrong For Mark Humphrys, DCU CA651 -->
<!-- Widget connects to Flickr feed using PHP, parses the feed using AJAX, 
			Ranodmly selects one image from the feed to display
			On mouseovering the image, the Flickr user who uploaded the image is displayed -->
<!DOCTYPE html>
<html>
<head>
<title>Flickr Image Scraper by Peter Armstrong For Mark Humphrys, DCU </title>



</head>
<body>

<div id='container' style='width:240px;'>
  <! -- This is the HTML form / Search box -->
  Enter A Tag To Search For Photos
  <form name="tagbox" action="" method="get" target="_self" >
    <input type="text" id="tags" name="tags"/>
    <input type="submit" value="Submit"/>
  
  </form>
  
<!-- The PHP connects to the flickr feed. -->  
  <?php


    
    # if tag is being searched for, adds it to the variable
    $tag=$_GET['tags'];
  
  # Gets the content of the feed and adds it to the variable
  $feed1 = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags={$tag}");

  #This line removes the doctype heading from the string variable
  $feed = str_replace("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>" , "", $feed1);
  ?>  



	<div id='photo' onmouseover="document.getElementById('user').style.display='block'" onmouseout="document.getElementById('user').style.display='none'">
	photo

	</div>
	
	<!-- hidden div, will display on mouseover of the photo div -->
	<div id='user' style="margin-top:-30px; background-color:white; display:none; opacity:0.6;" onmouseover="document.getElementById('user').style.display='block'" onmouseout="document.getElementById('user').style.display='none'">
	</div>
</div>


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
    
    //finds the bits between the img tag using pattern matching
    var imgPattern="\<img.+\/\>";
    var img = photoContent.match(imgPattern);
    
    //displays the img tag in the photo element
    document.getElementById('photo').innerHTML=img;
    
    // finds the link to the user
    var userPattern="\<a href=\"http://www.flickr.com/people/.*\"\>.*\<\/a\>";
    var user=photoContent.match(userPattern);
		// displays the link to the user in the hidden user div.
		document.getElementById('user').innerHTML="Photo By: " + user;
		
		
    
  </script>

  </body>
</html> 
