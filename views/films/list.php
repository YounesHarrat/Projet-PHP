<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Films</title>
    </head>
    <body>

        <h1>Liste des Films</h1>
        <div style="display:flex;flexDirection:row;padding: 10px; border: 1px solid black; flex-wrap: wrap; justify-content: space-evenly;">
            <?php
            foreach($tab_f as $f) {

                echo "<div style='justify-content: space-around;text-align:center;' > ";
                echo "<br>";
                echo "<img src='" . $f->affiche . "' style='width:240px;height:400px;'/><br><br>";
                for($i = 1; $i<=5; $i++){
                    echo "<button onclick='onClick(".$i.",".$f->id.")'>".$i."</button>";
                }
                echo '<p> <b>' . $f->nom . '</b>.</p>';
                echo '<p> Date de Sortie : [ ' . $f->dateSortie . '].</p>';
                echo '<p> Durée : ' . $f->duree . '.</p>';
                echo '<p> Acteurs : <b> ' . $f->acteurs . '</b>.</p>';
                // echo '<p> Affiche : ' . $f->affiche . '.</p>';
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
<script type="text/javascript" src="./notation.js"></script>

