<html>
<head>
    <link rel="stylesheet" href="<?= siteUri("assets/css/bootstrap.min.css") ?>" />
</head>
<body>
    <div class="container mt-5">
        <?= !empty($errors) ? 
            '<div class="alert alert-warning"><ul>' . implode('', array_map(fn($error) => "<li>$error</li>", $errors)) . '</ul></div>' :
       
              
                "<div class='alert alert-success'>Success : id : $contactId</div>"
            
        ?>
        <a href="<?= siteUri('') ?>" class="btn btn-primary">Back To Home Page</a>
    </div>
</body>
</html>
