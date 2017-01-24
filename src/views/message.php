<!DOCTYPE HTML>
<html>
    <head>
        <title>Error Message</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $assestsPath ?>pub/assets/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?= $assestsPath ?>pub/assets/css/styles.css"/>
    </head>
    <body>
        <div id="wrapper" class="wrapWidth ">
            <div class="messageError">
                <?php echo $message ?>
            </div>
        </div>
        <script src="<?= $assestsPath ?>pub/assets/js/jquery-2.2.4.min.js"></script>
    </body>
</html>
