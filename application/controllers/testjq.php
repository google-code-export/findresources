<?php

class Testjq extends CI_Controller {
  function index()
  {
    echo 'Hola Mundo!';

    ?>
   <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <title>jQuery demo</title>
 </head>
 <body>
   <a href="http://jquery.com/">jQuery</a>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
   <script>
     $(document).ready(function(){
       $("a").click(function(event){
         alert("As you can see, the link no longer took you to jquery.com");
         event.preventDefault();
       });
     });
   </script>
   
    <div id="reccommend">
<img id="Recommend" src="http://i56.tinypic.com/2z7nz9e.png" usemap="#Recommend" border="0" width="200" height="200" alt="" />
<map id="Recommend" name="Recommend">
<area shape="rect" coords="78,113,142,163" href="http://www.tumblr.com/directory/recommend/entertainment/epicjamess" alt="Yes" title="Yes"    />
<div id="no">
<area shape="rect" coords="144,113,195,163" href="#" alt="No" title="No" />
</div>
</map>
</div>
<script>
  $("#no").click(function () {
	  $("#reccommend").animate({opacity: 0}, 200);
  });
  
</script>
 </body>
 </html>
    <?php

    
    
    } 
}
?>