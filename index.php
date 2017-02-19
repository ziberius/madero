<!DOCTYPE html>
<html ng-app="maderoApp" id="htmlTag" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">        
        <?php require_once('main/web/pages/include/head.php'); ?>
        <title>Madero FM</title>
    </head>
    <body ng-cloak ng-controller="mainController">
        <div id="main-wrapper">
        <?php require_once('main/web/pages/include/header.php'); ?> 
            <div ng-view></div>
        <?php require_once('main/web/pages/include/footer.php'); ?> 
        </div>
    </body>
    
</html>