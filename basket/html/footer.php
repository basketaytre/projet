<!-------------------------------------------------------Page du footer---------------------------------------------------------------->
<footer class=" bg-dark pt-4 pb-3 pl-3 pr-4 text-white text-center ombres mt-5">
    <div> 
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-right p-0">
                        <img src="images/logo_mini.PNG" height="50" width="44">
                    </div>
                    <div class="col text-left">
                        <h5 class="mb-0">ABBA</h5>
                        <small>
                            <ul class="list-unstyled">
                                <li class="mb-2">Association BasketBall Aytré</li>
                                <li>Gymnase - Rue des Pâquerettes</li>
                                <li class="mb-3">17440 AYTRÉ</li>
                                <li>Téléphone : xx-xx-xx-xx-xx                            </ul>
                        </small>
                        <input type="button" value="Nous contacter" class="btn btn-outline-light pr-2 pl-2" OnClick="window.location.href = 'index.php?action=en_travaux'">

                    </div>
                </div>
            </div>
            <div class="col">
                <h5>Site</h5>
                <div class="row">
                    <div class="col text-right">
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="text-white" >Accueil</a></li>
                            <li><a href="index.php?action=affiche_article" class="text-white" >Article</li>
                        </ul>
                    </div>
                    <div class="col text-left">
                        <ul class="list-unstyled">
                            <li><a href="index.php?action=affiche_sponsor" class="text-white" >Partenaires</a></li>
                            <li><a href="index.php?action=en_travaux" class="text-white" >[vide]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <h5>Réseaux sociaux</h5>
                <div id="fb-root"></div>
                <div class="fb-page" data-href="https://www.facebook.com/aytrebasket/" data-tabs="timeline" data-width="" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/aytrebasket/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/aytrebasket/">ABBA Association Basket Ball Aytré</a></blockquote></div>
            </div>
        </div>
        <hr class='hrp'>
        <div class="row">
            <div class="col">
                <small><a class="text-white" href="index.php?action=protec_donnees">Protection des données</a></small>
                <small class="pl-2 pr-2">|</small>
                <small><a class="text-white" href="index.php?action=mention_legales">Mention légales</a></small>
                <small class="pl-2 pr-2">|</small>
                <small><a class="text-white" href="index.php?action=plan_site">Plan du site</a></small>
                <br>
                <small>© 2020</small>
            </div>
        </div>
</footer>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script><!--
-->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<?php
if (isset($_GET['texte'])) {
    $texte = $_GET['texte'];
    if ($texte == 'ok') {
        echo '<!-- Editeur de texte -->'
        . '<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>'
        . '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>'
        . '<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>'
        . '<script>'
        . '$(document).ready(function () {'
        . "$('#summernote').summernote({"
        . 'height: 400'
        . '});'
        . '});'
        . '</script>';
    }
} else {
    echo
    '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>'
    . '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
}
?>
</body>
</html>
<!-------------------------------------------------------Fin de la page du footer---------------------------------------------------------------->
