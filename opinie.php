<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section class="banner"><h1>Hurtownia spożywcza</h1></section>
    <section class="glowny"><h2>Opinie naszych klientów</h2> 
        <?php 
        require_once('conn.php');
        try{
        $conn = mysqli_connect($hostname,$username,$password,$dbname);
        $sql = "select k.zdjecie, k.imie, o.opinia from Klienci k join opinie o on k.id = o.Klienci_id where k.Typy_id = 2 or k.Typy_id = 3;";
        $result = $conn->query($sql);
        while($rekord = $result->fetch_array(MYSQLI_ASSOC)){ //Przypisuje jeden rząd jako tablica asocjacyjna do $rekord
            echo '<section class="opinia">';
            echo '<img src="media/'.$rekord['zdjecie'] .'" alt="klient">';
            echo '<div>
            <p>'.$rekord['opinia'].'</p>';
            echo '<h4>'.$rekord['imie'].'</h4></div>';
            echo '</section>';
        }
        $conn->close();
        } catch(mysqli_sql_exception $e){
            echo $e;
        }
        ?></section>
        <div class="stopka_wrapper">
    <section class="stopka"><h3>Współpracują z nami</h3><a href="http://sklep.pl/">Sklep 1</a></section>
    <section class="stopka"><h3>Nasi top klienci</h3><ol> <?php 
        require_once('conn.php');
        try{
        $conn = mysqli_connect($hostname,$username,$password,$dbname);
        $sql = "select imie,nazwisko,punkty from klienci order by punkty desc limit 3;";
        $result = $conn->query($sql);
        while($rekord = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<li>'.$rekord['imie'].' '.$rekord['nazwisko'].', '.$rekord['punkty'].'pkt.</li>';
        }
        $conn->close();
        } catch(mysqli_sql_exception $e){
            echo $e;
        }
        ?></ol></section>
    <section class="stopka"><h3>Skontaktuj się</h3><p>telefon: 111222333</p></section>
    <section class="stopka"><h3>Autor: xxxxxxxxxxx</h3></section>
    </div>
</body>
</html>