

    <!-- CONTENEUR PRINCIPAL -->
    <main class="container">  
            
      <?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
class VueOuvrage{

    /**
     * Afficher la liste de tous les Ouvrage
     * @param array $aOuvrage tableau d'objets Ouvrage
     */
    public static function afficherListeOuvrages($aOuvrages, $sMsg="&nbsp;"){
      echo "
      <h1>Liste des ouvrages <a href=\"index.php?s=".$_GET['s']."&action=add\"><button type=\"button\" class=\"btn btn-success\">Ajouter un ouvrage</button></a></h1>
      <p>".$sMsg."</p>";
      if(count($aOuvrages) <= 0){
        echo "<p>Aucun ouvrage n'est disponible. Veuillez en ajouter un.</p>";
        return;
      }
      echo "        
      <ul>";
        for($i=0; $i<count($aOuvrages); $i++){
          echo "
          <li><img class=\"imageOuvrage\" src=". $aOuvrages[$i]->getOuvrageCouverture().">".$aOuvrages[$i]->getOuvrageTitre() 
            ." <a href=\"index.php?s=".$_GET['s']
            ."&action=mod&idOuvrage=".$aOuvrages[$i]->getIdOuvrage()."\">Modifier</a> |
            <a href=\"#\" onclick=\"supprimerUnOuvrage('Voulez-vous supprimer cet ouvrage', ".$_GET['s'].", 'sup', ".$aOuvrages[$i]->getIdOuvrage().")\">Supprimer</a></li>
            ";
          }
          echo "
        </ul>
        ";
      } 

    /**
     * Afficher le formulaire de modification d'un Ouvrage
     * @param Ouvrage $oOuvrage 
     */public static function afficherModifierOuvrage(Ouvrage $oOuvrage, $sMsg="&nbsp;"){

    echo "
    <p>".$sMsg."</p>
    <form class=\"formContact\" action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idOuvrage=".$oOuvrage->getIdOuvrage()."\" method=\"post\">
      <article class=\"form-group\">
        <input type=\"hidden\" name=\"idOuvrage\" value=\"".$oOuvrage->getIdOuvrage()."\" ><br>
        <article class=\"form-group\">
        <input type=\"text\" name=\"txtTitre\" id=\"titre\" value=\"".$oOuvrage->getOuvrageTitre()."\" class=\"form-control\">
        </article>

        <article class=\"form-group\">
        <select name=\"txtGenre\" id=\"genre\" class=\"form-control\"> 
          <option>".$oOuvrage->getOuvrageGenre()."</option>
          <option>Fiction</option> 
          <option>Suspense</option> 
          <option>Amour</option> 
          <option>Thriller</option> 
        </select>
</article>
<article class=\"form-group\">
        <label for=\"contenu\"></label><textarea rows=\"20\" cols=\"50\" name=\"txtContenu\" id=\"contenu\"class=\"form-control\">";
        if (isset($_SESSION['tContenu'])){
        foreach ($_SESSION['tContenu'] as $valeur ) {
          echo $valeur."\n";
        }
        }
        echo "</textarea><br>
        </article>
        <input type=\"submit\" name=\"cmd\" value=\"Enregistrer\">
     </article>

    </form>
    ";
    $_SESSION['tContenu'] = '';
  }
    /**
     * Afficher le formulaire de ajouter un Ouvrage
     * @param $sMsg  
     */
    public static function afficherAjouterOuvrage($sMsg="&nbsp;"){
      echo "
    <p>".$sMsg."</p>
    <form class=\"formContact\" action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."\" method=\"post\">
      <article class=\"form-group\">
        <input type=\"hidden\" name=\"idOuvrage\" value=\"\" ><br>
        <input type=\"text\" name=\"txtTitre\" id=\"titre\" placeholder=\"Titre\" class=\"form-control\"></article>
<article class=\"form-group\">
        
        <select name=\"txtGenre\" id=\"genre\" class=\"form-control\"> 
          <option>Fiction</option> 
          <option>Suspense</option> 
          <option>Amour</option> 
          <option>Thriller</option> 
        </select>
        </article>   
<article class=\"form-group\">
        <label for=\"contenu\"></label><textarea rows=\"20\" cols=\"50\" name=\"txtContenu\" id=\"contenu\" class=\"form-control\" placeholder=\"Article\"></textarea><br>
    </article>    
        <input type=\"submit\" name=\"cmd\" value=\"Enregistrer\" > 
     
    </form>
        <br>
    ";
    }

    }//fin de la classe VueOuvrage

    ?>     
        </main> <!-- /container -->
      