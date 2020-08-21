<html>
    
<head>
    <link rel="stylesheet" href="footer.css">
</head>

<body style="margin:0; padding:0;">
    <div id="container">
        <?php
            $connection=mysqli_connect("localhost", "root","");
            $db=mysqli_select_db($connection,'anticariat');
            $query="SELECT produse.idProdus, produse.numProdus, produse.tip, produse.descriere, produse.pret, imagini.poza FROM produse LEFT JOIN imagini ON (produse.idProdus = imagini.idProdus)";
            $query_run=mysqli_query($connection,$query);
            while ($row=mysqli_fetch_array($query_run))
            {
                echo $row['idProdus'];
                ?>
                <br>
                <?php
                echo $row['descriere'];
                ?>
                <br>
                <?php
                echo '<img src="data:image;base64,'.base64_encode($row['poza']).'"alt="Poza">';
                ?>
                <br>
                <?php
            }
        ?>
    </div>
    
    <div id="footer">
        <div class="footer_comp">
            <span class="footer_titlu">Lilia Antique</span>
            <hr>
            <br>
            <span class="descriere_comp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </span>
        </div>
        <div class="footer_produs">
        </div>
        <div class="footer_contact">
            <span class="footer_titlu">Contact</span>
            <hr>
            <br>
            <div class="contact_link">
                <img src="imagini\fb.svg" alt="fb" class="icon">
                <a href="https://www.facebook.com/liliantiqueshop">Lilia Antique</a>
            </div>
            <div class="contact_link">
                <img src="imagini\gmail.svg" alt="gmail" class="icon">
                <span class="contact_text">oprea.stefanteodor@gmail.com</span>
            </div>
            <div class="contact_link">
                <img src="imagini\tel.svg" alt="tel" class="icon">
                <span class="contact_text"> +40 722 900 252</span>
            </div>
            <div class="contact_link">
                <img src="imagini\address.svg" alt="adr" class="icon">
                <span class="contact_text">strada Grigore Plesoianu, bl. 11B, et. 1</span>
            </div>
        </div>
    </div>

</body>

</html>