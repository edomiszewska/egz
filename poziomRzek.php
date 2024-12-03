<!DOCTYPE html>
<html lang="pl ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
<header id="baner1">
    <img src="obraz1.png" alt="Mapa Polski">
</header>

<header id="baner2">
    <h1>Rzeki w województwie dolnośląskim</h1>
</header>

<main id="menu">
    <form action="poziomRzek.php" method="POST">
   <label for="wszystkie"> <input type="radio" name="rzeki" id="wszystkie" class="rzeki" value="1">Wszystkie</label>
    <label for="stano"><input type="radio" name="rzeki" id="stano" class="rzeki" value="2">Ponad stan ostrzegawczy</label>
    <label for="stana"><input type="radio" name="rzeki" id="stana" class="rzeki" value="3">Ponad stan alarmowy</label>
    <button id="pokaz" name="pokaz">Pokaż</button>
  </form>
</main>

<section id="lewy">


<?php

$baza=mysqli_connect('localhost', 'root','','rzeki');

if(isset($_POST['pokaz'])){   
$rzeki=$_POST['rzeki'];
$zapytanie="select nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody   from wodowskazy
join pomiary on pomiary.wodowskazy_id=wodowskazy.id
where dataPomiaru='2022-05-05';";
$cos=mysqli_query($baza,$zapytanie);
$wynik=mysqli_fetch_all($cos);

echo "<h3>Stany na dzień 2022-05-05</h3>
<table>
<tr>
    <th>Wodomierz</th>
    <th>Rzeka</th>
    <th>Ostrzegawczy</th>
    <th>Alarmowy</th>
    <th>Aktualny</th>
</tr>";

foreach($wynik as $tablica){
 echo "<tr>".
 "<td>".$tablica[0]."</td>".
"<td>".$tablica[1]."</td>".
"<td>".$tablica[2]."</td>".
"<td>".$tablica[3]."</td>".
"<td>".$tablica[4]."</td>".
"</tr>";
}

}






?>


</table>
</section>

<aside id="prawy">
<h3>Informacje</h3>
<ul>
    <li>Brak ostrzeżeń o burzach z gradem</li>
    <li>Smog w mieście Wrocław</li>
    <li>Silny wiatr w Karkonoszach</li>
</ul>
<h3>Średnie stany wód</h3>

<?php

?>




<a href="https://komunikaty.pl">Dowiedz się więcej</a>
<img src="obraz2.jpg" alt="rzeka" id="obraz2">
</aside>


<footer>
<p>Stronę wykonał: nr 7</p>
</footer>
</body>
</html>