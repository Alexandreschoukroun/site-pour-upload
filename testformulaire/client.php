<?php

include 'db_connect.php';



class Client
{

    //contructeur de la class client 
    public function __construct($IdPersonnel, $Nom, $Prenom, $Tel, $Fixe, $Mail)
    {

        $this->IdPersonnel = $IdPersonnel;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Tel = $Tel;
        $this->Fixe = $Fixe;
        $this->Mail = $Mail;
    }

   
    public static function createClients($resultArray)
    {
        
        $IdPersonnel = 0;
        $Nom = 1;
        $Prenom = 2;
        $Tel = 3;
        $Fixe = 4;
        $Mail = 5;

        
        ?>
        <table class ="tablestyle" align ="center">
            <thead>
            <tr>
                <?php
                
                
                    for ($col = 0; $col < count($resultArray); $col++) {
                        $clients[] = new Client($resultArray[$col][$IdPersonnel], $resultArray[$col][$Nom], $resultArray[$col][$Prenom], $resultArray[$col][$Tel], $resultArray[$col][$Fixe], $resultArray[$col][$Mail]);
                ?>
                </thead>
                <tbody>
                
                
                         <td><?php echo $resultArray[$col][$IdPersonnel];?></td>
                         <?
                          $NouveauIdPersonnel = $resultArray[$col][$IdPersonnel];
                          
                            ?> 
                         <td><?php echo $resultArray[$col][$Nom];?></td>
                         <?php
                          $NouveauNom = $resultArray[$col][$Nom];
                            ?>
                         <td><?php echo $resultArray[$col][$Prenom];?></td>
                            <?php
                            $NouveauPrenom = $resultArray[$col][$Prenom];
                                ?>
                        <td><?php if(preg_match("^(7|6)[0-9]{8}$^", $resultArray[$col][$Tel])){
                            //faire apparaitre une seule colonne du tableau
                            echo"0". $resultArray[$col][$Tel];
                            $NouveauTel = "0". $resultArray[$col][$Tel];
                        }
                          if(preg_match("^(7|6)[0-9]{8}$^", $resultArray[$col][$Fixe])){
                            ?>
                            <?php  echo "0".$resultArray[$col][$Fixe];?>
                            <?php
                            $NouveauFixe = "0".$resultArray[$col][$Fixe]; 
                            
                        }
                        if(preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[6-7](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $resultArray[$col][$Tel])){
                          ?>
                            <?php  echo $resultArray[$col][$Tel];?>
                                                 
                            <?php
                            $NouveauTel = $resultArray[$col][$Tel];
                            
                        }
                         if(preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[6-7](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $resultArray[$col][$Fixe])){
                            ?>
                            <?php  echo   " ". $resultArray[$col][$Fixe];?>
                            </td>
                                <?php
                                $NouveauTel =  " ".$resultArray[$col][$Fixe];
                        }
                        if(preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-5](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $resultArray[$col][$Tel])){
                          ?>
                            <td><?php  echo $resultArray[$col][$Tel];?>
                            <?php
                            $NouveauFixe = $resultArray[$col][$Tel];
                        }
                      if(preg_match("^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-5](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^", $resultArray[$col][$Fixe])){
                            ?>
                            <td><?php  echo $resultArray[$col][$Fixe];?>
                            <?php
                            $NouveauFixe = $resultArray[$col][$Fixe];
                        }
                         elseif (preg_match("^(1|2|3|4|5)[0-9]{8}$^", $resultArray[$col][$Fixe])){
                             ?>
                            <td> <?php echo "0". $resultArray[$col][$Fixe];?>
                            <?php
                            $NouveauFixe = "0".$resultArray[$col][$Fixe];
                        }
                           if (preg_match("^(1|2|3|4|5)[0-9]{8}$^", $resultArray[$col][$Tel])){
                             ?>
                            <td><?php echo "0". $resultArray[$col][$Tel];?></td>
                            

                            <?php
                            $NouveauFixe = "0".$resultArray[$col][$Tel];
                            }
                        //verifier une adresse mail
                        if(preg_match("^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$^", $resultArray[$col][$Mail])){
                            ?>
                            <td><?php echo $resultArray[$col][$Mail];?></td>
                            <?php
                            $NouveauMail = $resultArray[$col][$Mail];
                        }
                        else{
                            ?>
                            <td><?php echo "";?></td>
                            <?php
                            $NouveauMail = "";
                        }
                        //inseré tout ces données dans la base de données
                        include 'SaveClient.php';
                       ?></td>
                       <?php
                    echo "</tr>";
                    
                }
                ?>
            </tr>
            </tbody>
        </table>
        <?php
        }
    

}


