<html>
<head>
<style>
body {
  background-color: #E2DACF;
}

.wrapper {
  display:inline-block;
  height: 420px;
  width: 654px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 420px;
  width: 327px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 420px;
  width: 327px;
  border-radius: 0 7px 10px 7px;
  background-color: #ffffff;
}

.product-text {
  height: 300px;
  width: 327px;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 52px;
  font-size: 34px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  margin: 0 0 47px 38px;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #6F4C38;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
  height: 103px;
  width: 327px;
  margin-top: 17px;
  position: relative;
}

.product-price-btn p {
  display: inline-block;
  position: absolute;
  top: -13px;
  height: 50px;
  font-family: 'Trocchi', serif;
  margin: 0 0 0 38px;
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn button {
  float: right;
  display: inline-block;
  height: 50px;
  width: 176px;
  margin: 0 40px 0 16px;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: #ffffff;
  background-color: #142E2F;
  cursor: pointer;
  outline: none;
}

.product-price-btn button:hover {
  background-color: #79b0a1;
}





/*CSS de MENIU */

/* 
=====
EFFECT FADING OUT FOR SIBLINGS MENU OPTIONS 
=====
*/

.menu:hover .menu__link:not(:hover){
  color: #E1D9CE;
}

/* 
=====
MENU STYLES
=====
*/

/* core styles */

.menu__list{
  display: flex;  
  text-align: center;
  padding-left: 0;
  margin-top: 0;
  margin-bottom: 0;
  list-style: none;  
}

.menu__group{
  flex-grow: 1;
}

.menu__link{
  display: block;
}

/* skin */

.menu{
  background-color: #173034;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24);
}

.menu__link{
  padding: 2rem 1.5rem;

  font-weight: 700;
  color: #fff;
  text-decoration: none;
  text-transform: uppercase;
}

/* states */
.menu__link:focus{
  outline: 2px solid #fff;
}

/* hover animation */

.menu__link{
  position: relative;
  overflow: hidden;

  will-change: color;
  transition: color .25s ease-out;  
}

.menu__link::before, 
.menu__link::after{
  content: "";
  width: 0;
  height: 3px;
  background-color: #fff;

  will-change: width;
  transition: width .1s ease-out;

  position: absolute;
  bottom: 0;
}

.menu__link::before{
  left: 50%;
  transform: translateX(-50%); 
}

.menu__link::after{
  right: 50%;
  transform: translateX(50%); 
}

.menu__link:hover::before, 
.menu__link:hover::after{
  width: 100%;
  transition-duration: .2s;
}

/*
=====
DEMO
=====
*/

@media (min-width: 768px){

  html{
    font-size: 62.5%;
  }
}

@media (max-width: 767px){

  html{
    font-size: 50%;
  }
}


.page{
  box-sizing: border-box;
  width: 100%;  
  padding-left: 1rem;
  padding-right: 1rem;
  
  order: 1;
  margin: auto;
}


.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}


</style>
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

 while ($row=mysqli_fetch_array($query_run)){?>
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
      <p><span><?php echo $row['pret'];
  ?></span></p>
      <button type="button">Adauga in cos</button>
    </div>
  </div>
</div>
<?php
 }?>

 
 <?php
 for($page=1;$page<=$number_of_pages;$page++){?>
 <div class="pagination">
 <?php
   echo '<a href="produse.php?page=' . $page . '">' . $page . '</a>';?>
   <?php
 }?>
 </div>


</body>
</html>
