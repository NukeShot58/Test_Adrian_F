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
        <!-- <section class="opinia">
            <img src="media/anna.jpg" alt="klient">
            <div>
                <p>Dobra współpraca, zawsze swieże towary i miła obsługa</p>
                <h4>Anna</h4>
            </div>
        </section>
        <section class="opinia">
            <img src="media/ewa.jpg" alt="klient">
            <div>
            <p>Poleca hurtownię za profesjonalne podejście do klienta</p>
            <h4>Ewa</h4>
        </div>
        </section>
        <section class="opinia">
            <img src="media/janek.jpg" alt="klient">
            <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, quod!</p>
            <h4>Janek</h4>
        </div>
        </section>
        <section class="opinia">
            <img src="media/john.jpg" alt="klient">
            <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, corporis.</p>
            <h4>John</h4>
        </div>
        </section>
        <section class="opinia">
            <img src="media/judy.jpg" alt="klient">
            <div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, esse!</p>
            <h4>Judy</h4>
        </div>
        </section> -->
        <?php 
        require_once('conn.php');
        try{
        $conn = mysqli_connect($hostname,$username,$password,$dbname);
        $sql = "select k.zdjecie, k.imie, o.opinia from Klienci k join opinie o on k.id = o.Klienci_id where k.Typy_id = 2 or k.Typy_id = 3;";
        $result = $conn->query($sql);
        while($rekord = $result->fetch_array(MYSQLI_ASSOC)){
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
        ?>
        <!-- Patrz skrypt 1 --> </section>
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