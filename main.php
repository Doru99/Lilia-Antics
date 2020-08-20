<html>
    
<head></head>

<body>

    <h1>Ia la pula</h1>
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
        

</body>

</html>