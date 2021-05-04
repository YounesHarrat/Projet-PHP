
<div style="text-align:center;">
    <h1>Liste des Films</h1>
</div>

<div style="display:flex;flexDirection:row;padding: 10px; border: 1px solid black; flex-wrap: wrap; justify-content: space-evenly;">
    <?php
    foreach($tab_f as $f) {

        echo "<div style='justify-content: space-around;text-align:center;'  > ";
        echo "<br>";
        echo "<img src='" . $f->affiche . "' style='width:240px;height:400px;'/>";
        echo '<p> <b>' . $f->nom . '</b>.</p>';
        echo '<p> Date de Sortie : [ ' . $f->dateSortie . '].</p>';
        echo '<p> Durée : ' . $f->duree . '.</p>';
        echo '<p> Acteurs : <b> ' . $f->acteurs . '</b>.</p>';

        // echo '<p> Affiche : ' . $f->affiche . '.</p>';
        echo "</div>";
    }
    ?>
</div>

