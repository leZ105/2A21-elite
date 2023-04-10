<?php
    include_once '../Model/reclamation.php';
    include_once '../Controller/reclamationC.php';

    $error = "";

    // create reclamation
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (

		isset($_POST["typer"]) &&		
        isset($_POST["dater"]) &&
		isset($_POST["sujet"]) && 
        isset($_POST["dess"])
    ) {
        if (
			!empty($_POST['typer']) &&
            !empty($_POST["dater"]) && 
			!empty($_POST["sujet"]) && 
            !empty($_POST["dess"])
        ) {
            $reclamation = new reclamation(
                null,
				$_POST['typer'],
                $_POST['dater'], 
				$_POST['sujet'],
                $_POST['dess']

            );
            $reclamationC->ajouterreclamation($reclamation);
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
        
        <form action="" method="POST">
            <table border="1" align="center">
				<tr>
                    <td>
                        <label for="typer">type de reclamation :
                        </label>
                    </td>
                    <td><input type="text" name="typer" id="typer" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dater">date de reclamation :
                        </label>
                    </td>
                    <td><input type="date" name="dater" id="dater" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">sujet de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" id="sujet">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dess">description de reclamation :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dess" id="dess">
                    </td>
                </tr>            
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>