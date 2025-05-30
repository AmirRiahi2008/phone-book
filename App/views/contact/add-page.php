<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= siteUri("assets/css/bootstrap.min.css") ?>" />

</head>

<body>
    <div class="container mt-5">
        <?= !empty($errors) || count($errors) > 0 ?
            '<div class="alert alert-warning"><ul>' . implode("", array_map(fn($error) => "<li>$error</li>", $errors)) . "</ul></div>"
            :
            "<div class='alert alert-success'> Contact With Id $contactId Added To Phone Book  </div>"
            ?>

        <a href="<?= siteUri() ?>">Back To Home Page</a>


    </div>
</body>

</html>