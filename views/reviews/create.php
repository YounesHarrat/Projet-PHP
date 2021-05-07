<?php

use App\Models\ReviewModel;

            
function save($id ) {
    $rm = new ReviewModel();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $fkUser = $_SESSION['id'];
    }
    $fkFilm = $id;
    if (isset($_POST['review']) && $_POST['review'] != "" ){
        $reviewText = $_POST['review']; 
        $rm->saveOne($reviewText,$fkUser, $fkFilm);
    }
}
       
?>

            <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?>

    <form class="formReview" action="" method="POST">        
        <div class="input-group">
            <div class="input-group input-group-lg">
            <h5 class="addReview">Ajouter un commentaire : </h5>
                <input type="text" class="form-control" name="review" placeholder="Donnez nous votre avis" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div>
        </div>
        <div class="d-grid gap-2">

        <button type="sumbit" class="btn btn-warning mt-2" onclick=<?php save($id) ?> >Envoyer</button>
        </div>
    </form>
 
        <?php
            } else {

            }
        ?>