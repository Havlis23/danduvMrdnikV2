<?php
    require_once("header.php");
    require_once("connectDB.php");
    require_once("functions.php");
    require_once("message.php");
?>

<?php viewMenu($menu, 2);?>

<section>
    <form action="addreziser.php" method="POST">
    <label for="jmeno">Jmeno:</label><input type="text" placeholder="Jmeno" id="jmeno" name="jmeno">
    <label for="prijmeni">Prijmeni:</label><input type="text" placeholder="Prijmeni" id="prijmeni" name="prijmeni">
    <label for="rok_narozeni">Datum narozeni:</label><input type="date" placeholder="Datum narozeni" id="rok_narozeni" name="rok_narozeni">
    <input type="submit" name="submit"/>
    </form>
</section>


    <?php
        if(isset($_POST["submit"])){
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $rok_narozeni = $_POST["rok_narozeni"];
        $query = "INSERT INTO Reziseri (jmeno,prijmeni, rok_narozeni) VALUES (:jmeno,:prijmeni, :rok_narozeni)";
        
        try{
            $q = $db->prepare($query);
            $q->bindParam(":jmeno", $jmeno);
            $q->bindParam(":prijmeni", $prijmeni);
            $q->bindParam(":rok_narozeni", $rok_narozeni);
            $q->execute();
    }catch(PDOException $e){
        echo $msg["dberror"] . $e->getMessage();
    }
    }
    ?>

<?php
require_once("disconnectDB.php");
require_once("footer.php");
?>