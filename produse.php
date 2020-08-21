<html>
  <head>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="produse.css">
  </head>
  <body>



    <div class="page">
      <nav class="menu">
        <ul class="menu__list">
          <li class="menu__group"><a href="main.html" class="menu__link">Despre noi/Contact</a></li>
          <li class="menu__group"><a href="produse.php" class="menu__link">Produse</a></li>
          <li class="menu__group"><a href="cos.php" class="menu__link">Cos</a></li>
        </ul>
      </nav>
    </div>




    <?php
      $connection=mysqli_connect("localhost", "root","");
      $db=mysqli_select_db($connection,'anticariat');
      $query="SELECT produse.idProdus, produse.numProdus, produse.tip, produse.descriere, produse.pret, imagini.poza FROM produse LEFT JOIN imagini ON (produse.idProdus = imagini.idProdus)";
      $query_run=mysqli_query($connection,$query);
      $results_per_page=18;
      $number_of_results=mysqli_num_rows($query_run);
      $number_of_pages=ceil($number_of_results/$results_per_page);

      if(!isset($_GET['page'])){
        $page=1;

      }else{
        $page=$_GET['page'];
      }

      $this_page_first_result = ($page-1)*$results_per_page;

      $query="SELECT produse.idProdus, produse.numProdus, produse.tip, produse.descriere, produse.pret, imagini.poza FROM produse LEFT JOIN imagini ON (produse.idProdus = imagini.idProdus) LIMIT " . $this_page_first_result.','.$results_per_page;
      $query_run=mysqli_query($connection,$query);

      while ($row=mysqli_fetch_array($query_run)){
    ?>
    <div class="wrapper">
      <div class="product-img">
        <?php echo '<img src="data:image;base64,'.base64_encode($row['poza']).'"alt="Poza" height="420" width="327">';?>
      </div>
      <div class="product-info">
        <div class="product-text">
          <h1><?php echo $row['numProdus'];?></h1>
          <h2><?php echo $row['tip'];?></h2>
          <p> <?php echo $row['descriere'];?></p>
        </div>
        <div class="product-price-btn">
          <p><span class="card_text"><?php echo $row['pret'];
      ?></span></p>
          <button type="button">Adauga in cos</button>
        </div>
      </div>
    </div>
    <?php
    }?>

    <div class="pagination">
    <?php
    for($page=1;$page<=$number_of_pages;$page++){
      echo '<a href="produse.php?page=' . $page . '">' . $page . '</a>';
    }?>
    </div>

    <div id="footer">
      <div class="footer_box">
        <span class="footer_titlu">Lilia Antique</span>
        <hr>
        <br>
        <span class="descriere_comp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </span>
      </div>
      <div class="footer_box">
        <span class="footer_titlu">Linkuri utile</span>
        <hr>
        <br>
        <div class="contact_link">
          <a href="main.html" class="footer_link">Despre noi</a>
        </div>
        <div class="contact_link">
          <a href="produse.php" class="footer_link">Produse</a>
        </div>
        <div class="contact_link">
          <a href="cos.php" class="footer_link">Cos</a>
        </div>
      </div>
      <div class="footer_box">
        <span class="footer_titlu">Contact</span>
        <hr>
        <br>
        <div class="contact_link">
          <img src="imagini\fb.svg" alt="fb" class="icon_contact">
          <a href="https://www.facebook.com/liliantiqueshop" class="footer_link">Lilia Antique</a>
        </div>
        <div class="contact_link">
          <img src="imagini\gmail.svg" alt="gmail" class="icon_contact">
          <span style="word-break: break-all;" class="contact_text">oprea.stefanteodor@gmail.com</span>
        </div>
        <div class="contact_link">
          <img src="imagini\tel.svg" alt="tel" class="icon_contact">
          <span class="contact_text"> +40 722 900 252</span>
        </div>
        <div class="contact_link">
          <img src="imagini\address.svg" alt="adr" class="icon_contact">
          <span class="contact_text">strada Grigore Plesoianu, bl. 11B, et. 1</span>
        </div>
      </div>
      <div class="footer_box">
        <span class="footer_titlu">Metode de plata</span>
        <hr>
        <br>
        <img src="imagini\paypal.svg" alt="paypal" class="icon_card">
        <img src="imagini\mastercard.svg" alt="mastercard" class="icon_card">
        <img src="imagini\visa.svg" alt="visa" class="icon_card">
      </div>
    </div>


  </body>
</html>
