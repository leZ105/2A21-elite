<?php
	include '../Controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$listereclamations=$reclamationC->afficherreclamations(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterreclamation.php">Ajouter un reclamation</a></button>
		<center><h1>Liste des reclamations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>IDR</th>
				<th>type</th>
				<th>date </th>
				<th>sujet</th>
				<th>description</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listereclamations as $reclamation){
			?>
			<tr>
				<td><?php echo $reclamation['IDR']; ?></td>
				<td><?php echo $reclamation['typer']; ?></td>
				<td><?php echo $reclamation['dater']; ?></td>
				<td><?php echo $reclamation['sujet']; ?></td>
				<td><?php echo $reclamation['dess']; ?></td>

				<td>
					<form method="POST" action="modifierreclamation.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reclamation['IDR']; ?> name="IDR">
					</form>
				</td>
				<td>
					<a href="supprimerreclamation.php?IDR=<?php echo $reclamation['IDR']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
