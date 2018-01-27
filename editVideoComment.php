<?php
require_once 'konfiguracija.php';
if(isset($_GET["id"])){
  $id =  trim($_GET["id"]);
  $sql = "SELECT * FROM videoComments WHERE id = ?";
  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $id);
    if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);

      if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $ime = $row["ime"];
        $prezime = $row["prezime"];
        $email = $row["email"];
        $komentar = $row["komentar"];
      } else{
        echo "Something went wrong. Please try again later.";
      }

    } else{
      echo "Oops! Something went wrong. Please try again later.";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($link);
}  else{
  echo "Oops! Something went wrong. Please try again later.";
  exit();
}
?>


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
        <h2>Uredi komentar</h2>
        <form action="azurirajVideo.php" method="get">
            <div>
                <label>Ime</label>
                <input type="text" name="ime" value="<?php echo $ime; ?>">
            </div>
            <div>
                <label>Prezime</label>
                <input type="text" name="prezime" value="<?php echo $prezime; ?>">
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label>Komentar</label>
                <input type="text" name="komentar" value="<?php echo $komentar; ?>">
            </div><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" class="submit button-primary" value="Izmijeni">
        </form>
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