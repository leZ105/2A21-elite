<?php
    include_once '../Model/reclamation.php';
    include_once '../Controller/reclamationC.php';

    $error = "";

    // create reclamation
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        isset($_POST["IDR"]) &&
		isset($_POST["typer"]) &&		
        isset($_POST["dater"]) &&
		isset($_POST["sujet"]) && 
        isset($_POST["dess"]) 
    ) {
        if (
            !empty($_POST["IDR"]) && 
			!empty($_POST['typer']) &&
            !empty($_POST["dater"]) && 
			!empty($_POST["sujet"]) && 
            !empty($_POST["dess"])
        ) {
            $reclamation = new reclamation(
                $_POST['IDR'],
				$_POST['typer'],
                $_POST['dater'], 
				$_POST['sujet'],
                $_POST['dess']
            );
            $reclamationC->modifierreclamation($reclamation, $_POST["IDR"]);
            header('location:afficherListereclamations.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListereclamations.php">Retour à la liste des reclamations</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['IDR'])){
				$reclamation = $reclamationC->recupererreclamation($_POST['IDR']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IDR">Numéro reclamation:
                        </label>
                    </td>
                    <td><input type="text" name="IDR" id="IDR" value="<?php echo $reclamation['IDR']; ?>"></td>
                </tr>
				<tr>
                    <td>
                        <label for="typer">type de reclamation:
                        </label>
                    </td>
                    <td><input type="text" name="typer" id="typer" value="<?php echo $reclamation['typer']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dater">date de reclamation:
                        </label>
                    </td>
                    <td><input type="date" name="dater" id="dater" value="<?php echo $reclamation['dater']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">sujet de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" value="<?php echo $reclamation['sujet']; ?>" id="sujet">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dess">description de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="dess" name="dess" id="dess" value="<?php echo $reclamation['dess']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>