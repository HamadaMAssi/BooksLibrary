<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read book</title>
</head>

<body>
    <div>
        <?php $file = $_GET['file']; ?>
        <embed src="uploads/<?php echo $file; ?>" type='application/pdf' width='100%' height='700px' />
    </div>
</body>

</html>