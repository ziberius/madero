<!DOCTYPE html>
<html ng-app="maderoApp" id="htmlTag"   >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">        
        <?php require_once('main/web/pages/include/head.php'); ?>
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Your Website Title" />
        <meta property="og:description"   content="Your description" />
        <meta property="og:image"         content="{{imageFacebook}}" />

        <title>Madero FM</title>
    </head>
    <body ng-cloak>
        <div id="main-wrapper">
            <?php require_once('main/web/pages/include/header.php'); ?> 
            <div id="menuXs" class="menuXs">
                <button class="btn btn-default btn-xs center-block" style="margin-top:20px;" type="button" ng-click="esconderMenu()"><i class="glyphicon glyphicon-arrow-left"></i></button>
                <ul id="ulMenuXs" ng-click="esconderMenu()" class="nav navbar" style="margin-left:20px;">
                    <li><a class="selectedItem" href="#/">Altamira</a></li>
                    <li><a href="#mapa">Mapa</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#contacto">Contáctanos</a></li>
                </ul>
            </div>            
            <div ng-if="loading === true" class="loader"><div id="loadingAnim"></div></div>
            <div ng-view>

            </div>
            <?php require_once('main/web/pages/include/footer.php'); ?> 
        </div>
    </body>

</html>