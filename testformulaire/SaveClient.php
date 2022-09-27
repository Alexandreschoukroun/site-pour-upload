<?php
include 'db_connect.php';
$conn = new PDO("mysql:host=localhost;dbname=donnee", "root", "");
try{
    //verifie qu'il ny ait pas de doublons 
    $sql = "SELECT * FROM client WHERE Mail= '$NouveauMail'";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result) > 0){
          ?>
            <td><?php echo "<span style= color:red >"."Cette adresse email existe déjà". "</span>";?></td>
            <?php
            //suprime le doublon dans la base de donnée
            $sql = "DELETE FROM client WHERE Mail= '$NouveauMail'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
        
    }else{
        ?>
        <td><?php echo "<span style = color:green> "."Cette adresse email n'existe pas"."</span>";?></td>
        <?php
    }
$sql = "INSERT INTO client (Nom, Prenom,Tel,Fixe,Mail)
 VALUES
 ('$NouveauNom','$NouveauPrenom','$NouveauTel','$NouveauFixe','$NouveauMail')";
$conn->query($sql); 
} 
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }                      


