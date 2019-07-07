<?php

require_once '../../model/ProfilProfessionel.class.php';
require_once '../../model/Connexion.class.php';
require_once '../../globals/database.php';
require_once '../../globals/functions.php';
require_once '../../globals/situationProfessionnel.php';
$profilByCountry=ProfilProfessionel::selectProfilForRecrutementByCountry();


if(!empty($profilByCountry) and sizeof($profilByCountry)>0){
    foreach ($profilByCountry as $country) {
        echo '<table>
            <tr>
                <td width="200px"><label>'.$country['pays'].'</label></td>
                <td><input type="checkbox"  class="input" name="ville" value="'.$country['pays'].'" onclick="javascript:showProfilByCountryOrCity(this);"></td>
            </tr>
            </table>';

    }
}