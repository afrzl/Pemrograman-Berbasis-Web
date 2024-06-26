<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CI4 Portfolio App</title>
    <style>
    body {
        margin-top: 30px;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php echo $this->include('partials/navbar'); ?>
        <!-- Section content-->
        <?php echo $this->renderSection('content'); ?>
        <!-- end Section Content -->
        <div class="row mt-4">
            <?php echo $this->include('partials/footer'); ?>
        </div>
    </div>
    <?php echo $this->renderSection('scripts'); ?>
</body>

</html>