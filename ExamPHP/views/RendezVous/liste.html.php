<!DOCTYPE html>
<html>
<head>
    <title>Liste des rendez-vous</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <h2>Liste des rendez-vous :</h2>
    <?php foreach ($rendezVous as $rv) : ?>
        <p>ID : <?php echo $rv['id']; ?> - Date : <?php echo $rv['date']; ?> - État : <?php echo $rv['etat']; ?> - Numéro Patient : <?php echo $rv['patient_numPatient']; ?></p>
    <?php endforeach; ?>

</body>
</html>
