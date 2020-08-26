<?php session_start();
$connection=mysqli_connect("localhost", "root","");
$db=mysqli_select_db($connection,'anticariat');

?>

<html>
  <head>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="produse.css">
    <link rel="stylesheet" href="myMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>



  <div id="meniu_container">
        <div class="search-container">
            <form action="cautare.php" method="POST">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <nav class="meniu">
            <ul class="main_meniu">
                <li onclick="location.href='contact.html';"><a href="contact.html" class="meniu_page">Acasa/Contact</a></li>
                <li class="active" onclick="location.href='produse.php';"><a href="produse.php" class="meniu_page">Produse</a></li>
                <li onclick="location.href='cos.php';"><a href="cos.php" class="meniu_page">Cos(<?php

                    if(isset($_SESSION['cart'])){
                      $count=count($_SESSION['cart']);
                      echo $count;
                    }else echo "0";

                ?>) </a></li> 
            </ul>
        </nav>
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



<?php

function cartElement($productimg, $productname, $productprice, $productid){
  $element = "
  
  <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                  <div class=\"border rounded\">
                      <div class=\"row bg-white\">
                          <div class=\"col-md-3 pl-0\">
                              <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                          </div>
                          <div class=\"col-md-6\">
                              <h5 class=\"pt-2\">$productname</h5>
                              <small class=\"text-secondary\">Seller: dailytuition</small>
                              <h5 class=\"pt-2\">$$productprice</h5>
                              <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                              <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                          </div>
                          <div class=\"col-md-3 py-5\">
                              <div>
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                  <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
  
  ";
  echo  $element;
}

?>