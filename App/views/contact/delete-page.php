<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= siteUri("assets/css/bootstrap.min.css") ?>">
</head>

<body>
    <div class="container mt-5">
        <?php if ($deletedCount): ?>
            <span class="text-primary">Contact deleted successfully...</span>


        <?php else: ?>
            <span class="text-danger">Contact not exists</span>

        <?php endif ?>
        <div>
            <h2>Loading</h2>
            <script>
                setTimeout(() => {
                    location.href = "<?= siteUri() ?>"
                }, 2000);
            </script>

        </div>
    </div>
</body>

</html>