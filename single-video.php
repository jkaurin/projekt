<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
     <meta charset="utf-8">
     <title>JK Projekt</title>
     <meta name="description" content="">  
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="css/base.css">
     <link rel="stylesheet" href="css/vendor.css">  
     <link rel="stylesheet" href="css/main.css">
     <script src="js/modernizr.js"></script>
     <script src="js/pace.min.js"></script>
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <link rel="icon" href="favicon.ico" type="image/x-icon">
   </head>

   <body id="top">
   <header class="short-header">   
   	<div class="gradient-block"></div>	
   	<div class="row header-content">
   		<div class="logo">
        <a href="index.html">Josip</a>
      </div>
      <nav id="main-nav-wrap">
        <ul class="main-navigation sf-menu">
         <li><a href="index.html" title="">Početna</a></li>
         <li class="has-children current">
          <a href="single-video.php" title="">Video</a>
          <ul class="sub-menu">
           <li><a href="single-standard.html">Blog</a></li>
           <li><a href="single-audio.php">Audio</a></li>
         </ul>
       </li>
       <li><a href="Rezervacije.php" title="">Rezervacije</a></li>	
       <li><a href="kontakt.html" title="">Kontakt</a></li>										
     </ul>
   </nav>
</div>     		

</header>
     <section id="content-wrap" class="blog-single">
      <div class="row">
       <div class="col-twelve">
        <article class="format-video">  
         <div class="content-media">
          <div class="fluid-video-wrapper">
           <iframe src="https://www.youtube.com/embed/Sar8iIX6JQ4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
           </div> 
         </div>
         <div class="primary-content">
          <h1 class="entry-title">Pogledaj video.</h1>	
          <ul class="entry-meta">
           <li class="date">Siječanj 20, 2018</li>						
         </ul>
       </div>	
     </div> 
   </div> 
   <div class="comments-wrap">
     <div id="comments" class="row">
      <div class="col-full">
       <div class="respond">
        <h3>Ostavi komentar</h3>
        <form name="contactForm" id="contactForm" method="post" action="addVideoComment.php">
          <fieldset>
           <div class="form-field">
            <input name="ime" type="text" id="cName" class="full-width" placeholder="Ime" value="" required>
          </div>
          <div class="form-field">
            <input name="prezime" type="text" id="cName" class="full-width" placeholder="Prezime" value="" required>
          </div>
          <div class="form-field">
            <input name="email" type="text" id="cEmail" class="full-width" placeholder=" Email" value="" required>
          </div>
          <div class="message form-field">
            <textarea name="komentar" id="cMessage" class="full-width" placeholder="Komentar" required></textarea>
          </div>
          <button type="submit" class="submit button-primary">Pošalji</button>
        </fieldset>
      </form>

    </div>
    <h2>Upisani komentari</h2>
    <?php
    require_once 'konfiguracija.php';
    $sql = "SELECT * FROM videoComments";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table id=read>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th align=center>Ime</th>";
                        echo "<th>Prezime</th>";
                        echo "<th>Mail</th>";
                        echo "<th>Komentar</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['ime'] . "</td>";
                        echo "<td>" . $row['prezime'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['komentar'] . "</td>";
                        echo "<td>";
                            echo "<a href='editVideoComment.php?id=". $row['id'] ."' title='Uredi' data-toggle='tooltip'><span>Uredi</span></a>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";                            
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "<p><em>No records were found.</em></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    ?>
  </div>
</div>
</div>

</section> 
     <footer>
      <div class="footer-main">
       <div class="row">  
        <div class="col-four tab-full mob-full footer-info">
        </div>
        <div class="footer-bottom">
         <div class="row">
          <div class="col-twelve">
           <div class="copyright">
            <span>© Copyright Josip Kaurinović 2017</span>
            <div id="go-top">
              <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
            </div>         
          </div>
        </div> 
      </div>
    </footer>  
    <div id="preloader"> 
    	<div id="loader"></div>
    </div> 
     <script src="js/jquery-2.1.3.min.js"></script>
     <script src="js/plugins.js"></script>
     <script src="js/main.js"></script>
   </body>

   </html>