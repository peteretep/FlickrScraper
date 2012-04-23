<html>
<head>

</head>
<body>

Enter A Tag To Search For Photos
  <form name="tagbox" action="flickr_scraper2.php" method="get" target="my_iframe" >
    <input type="text" id="tags" name="tags"/>
    <input type="submit" value="Submit"/>
  
  </form>
  <script type="text/javascript" >
    var oRequest=new XMLHttpRequest();
    var sURL="http://api.flickr.com/services/feeds/photos_public.gne";
    
    oRequest.open("GET",sURL,false);
    oRequest.setRequestHeader("User-Agent", navigator.userAgent);
    oRequest.send(null);
    
    if (oRequest.status==200) alert(oRequest.responseText);
    else alert("Error executing XMLHttpRequest call!");
  </script>
  

  </body>
</html> 
