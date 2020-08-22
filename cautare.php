<html>
  <head>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="myMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="produse.css">
  </head>
  <body>

<?php
$connection=mysqli_connect("localhost", "root","");
$db=mysqli_select_db($connection,'anticariat');
?>

  <div id="meniu_container">
        <div class="search-container">
            <form action="cautare.php" method="POST">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <nav class="meniu">
            <ul class="main_meniu">
                <li><a href="contact.html" class="meniu_page">Acasa</a></li>
                <li class="active"><a href="produse.php" class="meniu_page">Produse</a></li>
                <li  ><a href="cos.php" class="meniu_page">Cos</a></li> 
            </ul>
        </nav>
    </div>

<?php
$search=mysqli_real_escape_string($connection,$_POST['search']);

if(isset($_POST['submit-search'])||isset($_POST['search'])){
     $query="SELECT produse.idProdus, produse.numProdus, produse.tip, produse.descriere, produse.pret, imagini.poza FROM produse LEFT JOIN imagini ON (produse.idProdus = imagini.idProdus)
            WHERE (produse.numProdus like '%$search%')OR (produse.tip like'%$search%')OR (produse.descriere like '%$search%')OR (produse.pret like '%$search%') ";
    $result=mysqli_query($connection,$query);
    $queryResult=mysqli_num_rows($result);
    if($queryResult>0){?>
        <div id="container">
            <?php
        while ($row=mysqli_fetch_array($result)){
            ?>
             <div class="card">
                  <div class="img_prod">
                  <?php
                  echo '<img src="data:image;base64,'.base64_encode($row['poza']).'"alt="Poza">';
                  ?>
                  </div>
                  <div class="info_prod">
                    <div class="text_prod">
                      <span class="numProd"><?php echo $row['numProdus'];?></span>
                      <span class="tipProd"><?php echo $row['tip'];?></span>
                      <span class="descProd"><?php echo $row['descriere'];?></span>
                    </div>
                    <div class="com_prod">
                      <span class="pretProd"><?php echo $row['pret'];?> lei</span>
                      <br>
                      <button type="button">Adauga in cos</button>
                    </div>
                  </div>
                </div>
            <?php
            }?>
<?php
    }else{
        echo "Nu sunt rezultate pentru cautarea dumneavoastra!!!";
    }

}else{

    echo"NU AI CHESTIE";
}

?>
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
