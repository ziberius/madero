<!DOCTYPE html>
<html ng-app="maderoApp" id="htmlTag"   >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
    
        <?php require_once('main/web/pages/include/head.php'); ?>
        <meta property="og:type"         content="website" />
        <meta property="og:url"   content="http://www.maderofm.com/madero/main/web/pages/pagina.php?url=" />
        <title>Madero FM</title>

        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:522931,hjsv:5};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
        </script>        
    </head>
    <body ng-cloak ng-controller="SuperCtrl">
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-86337148-1', 'auto');
            ga('send', 'pageview');

        </script>          
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