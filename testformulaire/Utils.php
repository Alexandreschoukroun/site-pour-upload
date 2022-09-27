<?php


/**
 * Classe utilitaire pour toutes les fonctions du projet 
 * @author Alexandre Schoukroun
 */
class Utils
{
    /**
     * Fonction qui renvoit un tableau html a partir d'un array php
     * @param array $resultArray tableau crée à convertir 
     * @return string code source html
     */
    static function array_to_table($resultArray)
    {
    ?>

        <table class ="tablestyle" >
        <thead>
            <tr>
                <?php
                for ($row = 0; $row < count($resultArray); $row++) {
                    
                ?>
            </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        for ($col = 0; $col < count($resultArray[0]); $col++) {
        ?>
        <td><?php echo $resultArray[$row][$col]; ?></td>
        <?php
            }
            echo "</tr>";
            }
            ?>
        </tr>
            <tbody>
        </table>
<?php
}
}

