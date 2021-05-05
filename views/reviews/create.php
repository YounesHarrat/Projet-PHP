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

    <form class="formReview" action="" method="POST">        
        <div class="input-group">
            <h5 class="addReview">Ajouter un commentaire : </h5>
            <textarea class="form-control" name="review" placeholder="Donnez nous votre avis">
            
            </textarea>
        </div>
        <div class="d-grid gap-2">

        <button type="sumbit" class="btn btn-warning" onclick=<?php save($id) ?> >Envoyer</button>
        </div>
    </form>