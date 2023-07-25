<!DOCTYPE html>
<html>
<head>
    <title>Liste des patients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<body>
    <h2>Liste des patients :</h2>
    <?php foreach ($patients as $patient) : ?>
        <p>Numéro Patient : <?php echo $patient['numPatient']; ?> - Nom Complet : <?php echo $patient['nomCompet']; ?></p>
    <?php endforeach; ?>
</body>

</html>
