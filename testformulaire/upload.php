<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage du fichier </title>
</head>

<body>
  <div class="svg-container">
    
    <svg viewbox="0 0 800 400" class="svg">
      <path id="curve"  d="M 800 300 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
      </path>
    </svg>
  </div>

  <header>
    <div class="header_icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
    </div>
    <h1>Upload de fichier</h1>
    </div>
    <div class="title_h3">
    <h3><br>Ce site permet d'afficher le contenu de votre fichier directement sur la page.</h3>
    

    
    
  

<?php

include_once 'utils.php';



// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le fichier a été uploadé sans erreur.
    if (isset($_FILES["sheet"]) && $_FILES["sheet"]["error"] == 0) {
        $allowed = array("xls" => "image/xls", "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "ods" => "application/vnd.oasis.opendocument.spreadsheet", "csv" => "text/csv");
        $filename = $_FILES["sheet"]["name"];
        $filetype = $_FILES["sheet"]["type"];
        $filesize = $_FILES["sheet"]["size"];
        


        // Vérifie l'extension du fichier
        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed)) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists("upload/" . $_FILES["sheet"]["name"])) {
                echo "<br>"."<br>"."<h3>".$_FILES["sheet"]["name"] . " existe déjà."."</h3>";
                echo "<h3>"."<br>Il n'y as rien à afficher.<br>"."</h3>"."<br>";
                ?>
                </div>
                </header>
    <main>
        
               
           <?php
            } else {
                move_uploaded_file($_FILES["sheet"]["tmp_name"], "upload/" . $_FILES["sheet"]["name"]);
                 
   
           
                echo "<h3>"."<br>Votre fichier a été téléchargé avec succès.<br>"."</h3>";
                echo "<h3>"."<br>Scrollez vers le bas pour affichés son contenu.<br>"."</h3>"."<br>";
                
                ?>
                </div>
                </header>
    <main>
                
    
    <?php 
        

                //TODO : Traiter l'affichage du fichier csv
                /*var_dump(file_get_contents("upload/" . $_FILES["sheet"]["name"]));*/
                $content = file_get_contents("upload/" . $_FILES["sheet"]["name"]);
                //var_dump($content);
                $contentArray = explode(PHP_EOL, $content);
                // var_dump($contentArray);
                $resultArray = [];
                foreach ($contentArray as $line) {
                    //var_dump($line);
                    $lineArray = explode(";", $line);
                    //var_dump($lineArray);
                    if (count($lineArray) > 1) $resultArray[] = $lineArray;
                }
                //var_dump($resultArray);
                ?>
                <br><br>
                <div class = "sheet">
              <?php
              echo "<h3>"."<br>Voici le contenu de votre fichier :<br>"."</h3>";
                echo utils::array_to_table($resultArray);
                ?></div>
                <br><br>
                <?php
                //TODO: Terminer les 4 index (nom de famille , prenom , email , tel)
                $indexColFamilyName = 1;
                $indexColGivenName = 2;
                $indexColEmail = 5;
                $indexColMobile = 3;
                $indexColFixe = 4;
                $colNames = array_shift($resultArray);
                //var_dump($colNames);
                foreach ($colNames as $indexCol => $colName) {
                    //var_dump($colName);


                    switch (strtolower($colName)) {
                        case "prenom":
                            $indexColGivenName = $indexCol;
                            break;
                        case "nom":
                            $indexColFamilyName = $indexCol;
                            break;
                        case "email":
                        case "e-mail":
                            $indexColEmail = $indexCol;
                            break;
                        case "tel":
                            $indexColMobile = $indexCol;
                            break;
                        case "Fixe":
                            $indexColFixe = $indexCol;
                            break;
                    }
                }
                ?>
                <div class ="square">
                <?php
                foreach ($resultArray as $row) {
                    ?>
                <div class = 'add'>
                <?php
                    echo "<h4>Nouvelle personne ajoutée :</h4>";
                    ?>
                    
                    <?php
                
                    echo "<br>";
                    echo "<p>Prenom : " . $row[$indexColGivenName] . "</p> ";
                    echo "<p>Nom : " . $row[$indexColFamilyName] . "</p> ";
                    echo "<p>Email : " . $row[$indexColEmail] . "</p> ";
                     if (filter_var($row[$indexColEmail], FILTER_VALIDATE_EMAIL)) {
                        echo "<p><span style= color:green >L'adresse e-mail est valide </span></p>";
                    } else {
                        echo "<p><span style= color:red >" . "L'adresse e-mail '" . $row[$indexColEmail] . "' n'est pas valide" . "</span></p>" ;
                    }
                    echo "<p> Tel : " . $row[$indexColMobile] . "</p>";
                    if (preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $row[$indexColMobile])) {
                        echo "<p><span style= color:green> Le numéro de telephone est valide </span></p>" ;
                    } else {
                        echo "<p><span style= color:red >" . "Le numéro de telephone '" . $row[$indexColMobile] . "' n'est pas valide" . "</span></p>" ;
                    }
                    echo "<p>Fixe : " . $row[$indexColFixe] . " </p>";
                     if (preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-5](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $row[$indexColFixe])) {
                        echo "<p> <span style= color:green> Le fixe est valide </span></p>";
                        
                    } else {
                        echo "<p><span style= color:red >" . "Le fixe '" . $row[$indexColFixe] . "' n'est pas valide" . "</span></p>" ;
                        
                    }
                    

                   
                   
                   
                    ?>

                    </div>
                    <?php
                }
                ?>
                </div>
                <?php
                include_once 'client.php';
                ?>
                <div class = "sheet2">
                <?php
                echo"<h3>"."<br>Voici la liste des données corrigés :<br>"."</h3>";
                client::createClients($resultArray);
                ?>
                </div>
                </main>
               <footer>
                <div class = "footerWrite">
                <p>
                <a href="index.php">Retour à l'accueil</a>
               </p>
               </div>
                </footer>
               </body>
               </html>

                <?php
            }
            
            
        }
        
    }
}
// suprimer le fichier dans le dossier upload
unlink("upload/" . $_FILES["sheet"]["name"]);

?>



    
    
