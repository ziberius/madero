<div class="footer-top">
    <div class="container-fluid">
        <ul class="list-inline social-icons text-center">
            <li><a ><i class="fa fa-facebook"></i>Facebook</a></li>
            <li><a ><i class="fa fa-twitter"></i>Twitter</a></li>
            <!-- <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li> -->
            <li><a ><i class="fa fa-instagram"></i>Instagram</a></li>
            <!-- <li><a href="#"><i class="fa fa-pinterest"></i>Pinterest</a></li> -->
            <li><a ><i class="fa fa-youtube"></i>Youtube</a></li>
            <li><a ><i class="fa fa-whatsapp"></i>Whatsapp</a></li>
        </ul>
    </div>
</div><!--/.footer-top-->

<footer id="footer" ng-controller="footerController">
    <div class="bottom-widgets">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="text-uppercase text-strong">{{currentDate}}</h4>

                        <div ng-show="dailyIndicators">
                            <div class="line">
                                <h4 class="text-uppercase text-strong margin-top-30">Indicadores Económicos:</h4>
                                <div class="margin">
                                    <div class="s-12 m-12 l-8 margin-m-bottom">
                                        <ul>
                                            <li>UF: ${{dailyIndicators.uf.valor | number}}</li>
                                            <li>Dólar: ${{dailyIndicators.dolar.valor | number}}</li>
                                            <li>Euro: ${{dailyIndicators.euro.valor | number}}</li>
                                            <li>IPC: {{dailyIndicators.ipc.valor}}%</li>
                                            <li>UTM: ${{dailyIndicators.utm.valor | number}}</li>
                                            <li>Libra de Cobre: ${{dailyIndicators.libra_cobre.valor | number}} USD</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="text-uppercase text-strong">Contacto</h4>
                        <div class="line">
                            <div class="s-1 m-1 l-1 text-center">
                                <i class="icon-placepin text-primary text-size-12"></i>
                            </div>
                            <div class="s-11 m-11 l-11 margin-bottom-10">
                                <p><b>Dirección:</b> Avenida Argentina 44, Valparaíso</p>
                            </div>
                        </div>
                        <div class="line">
                            <div class="s-1 m-1 l-1 text-center">
                                <i class="icon-mail text-primary text-size-12"></i>
                            </div>
                            <div class="s-11 m-11 l-11 margin-bottom-10">
                                <p><a href="mailto:contact@ejemplo.com" class="text-primary-hover"><b>Email:</b> contact@ejemplo.com</a></p>
                            </div>
                        </div>
                        <div class="line">
                            <div class="s-1 m-1 l-1 text-center">
                                <i class="icon-smartphone text-primary text-size-12"></i>
                            </div>
                            <div class="s-11 m-11 l-11 margin-bottom-10">
                                <p><b>Teléfono:</b> 0700 000 987</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="weather"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid text-center">
            <p>Copyright &copy; 2016, Madero FM. Desarrollado por <a href="http://www.indiceapps.cl/">Indice Apps</a>
            </p>
        </div>
    </div>
</footer>

<script type="text/javascript" src="/main/web/lib/jquery.js"></script>
<script type="text/javascript" src="/main/web/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="/main/web/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/main/web/lib/owl.carousel.min.js"></script>
<script type="text/javascript" src="/main/web/js/main.js"></script>
<script type="text/javascript" src="/main/web/lib/jquery.simpleWeather.min.js"></script>
<script src="/main/web/lib/angular.min.js"></script>
<script src="/main/web/lib/angular-route.min.js"></script>
<script src="/main/web/lib/angular-animate.min.js"></script>
<script src="/main/web/lib/angular-locale_es-cl.min.js" type="text/javascript"></script>
<script src="/main/web/lib/lodash.min.js" type="text/javascript"></script>
<script src="/main/web/lib/angular-simple-logger.min.js" type="text/javascript"></script>
<script src="/main/web/js/controller.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-touch.js"></script>