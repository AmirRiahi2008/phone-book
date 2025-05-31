<html>

<head>
    <link rel="stylesheet" href="<?= siteUri("assets/css/bootstrap.min.css") ?>" />
</head>

<body>
    <div class="container mt-5">
        <?php if ($deletedCount): ?>
            <span class="text-primary">Contact deleted successfully</span>


        <?php else: ?>
            <span class="text-danger">Contact not exists</span>

        <?php endif ?>
        <div>
            <h2>loading</h2>
            <script>
                setTimeout(() => {
                    location.href = "<?= siteUri('') ?>"
                }, 1000);
            </script>

        </div>
    </div>
</body>

</html>