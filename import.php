
<?php
extract(filter_input_array(INPUT_POST));
$fichier =$_FILES["userfile"]["name"];
    if($fichier){
        $fp=fopen($_FILES["userfile"]["tmp_name"], "r");}
    else{?>
    <p align="center">-Importation écgouée-</p>
    <p align="center"><B>Desole mais vous n'avez pas specifie de chemin valide...</B></p>
    <?php exit();}
$cpt=0;?>
<p align="center">-Importation réussie</p>
<?php
while (!feof($fp)){
    $ligne=fgets($fp,4096);
    $liste=explode(";",$ligne);
    $table=filter_input(INPUT_POST,'userfile');

    $liste[0] = (isset($liste[0])) ? $liste[0] : Null;
    $liste[1] = (isset($liste[1])) ? $liste[1] : Null;
    $liste[2] = (isset($liste[2])) ? $liste[2] : Null;
    $liste[3] = (isset($liste[3])) ? $liste[3] : Null;
    $champs1=$liste[0];
    $champs2=$liste[1];
    $champs3=$liste[2];
    $champs4=$liste[3];

    if ($champs1!=''){
        $cpt++;
        $bdd = new PDO("mysql:host=localhost;dbname=projet;charset=utf8", "damery","damery");
        $sql =("INSERT INTO avancement(id, type, pourcentage, commentaire, date) VALUES ('', '$champs1', '$champs2', '$champs3', '$champs4)");
        $result = $bdd->query($sql);   
    }}
fclose($fp);

?>
<h2>Nombres de valeurs nouvellement enregistrees: </h2><b><?php echo $cpt;?></b>