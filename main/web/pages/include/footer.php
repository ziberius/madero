<div class="footer-top">
    <div class="container-fluid">
        <ul class="list-inline social-icons text-center">
            <li><a href="https://www.facebook.com/radiomaderofm" target="_blank" ><i class="fa fa-facebook"></i>Facebook</a></li>
            <li><a href="https://twitter.com/radiomaderofm" target="_blank"><i class="fa fa-twitter"></i>Twitter</a></li>
            <!-- <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li> -->
            <li><a href="https://www.instagram.com/radiomaderofm" target="_blank"><i class="fa fa-instagram"></i>Instagram</a></li>
            <!-- <li><a href="#"><i class="fa fa-pinterest"></i>Pinterest</a></li> -->
            <li><a ><i class="fa fa-youtube"></i>Youtube</a></li>
            <li><a class="mostrarWhatsapp"><i class="fa fa-whatsapp"></i>Whatsapp</a></li>
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
                                            <li>UF: ${{dailyIndicators.uf.valor| number}}</li>
                                            <li>Dólar: ${{dailyIndicators.dolar.valor| number}}</li>
                                            <li>Euro: ${{dailyIndicators.euro.valor| number}}</li>
                                            <li>IPC: {{dailyIndicators.ipc.valor}}%</li>
                                            <li>UTM: ${{dailyIndicators.utm.valor| number}}</li>
                                            <li>Libra de Cobre: ${{dailyIndicators.libra_cobre.valor| number}} USD</li>
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
                                <p><b>Dirección:</b>  Chañarcillo 528, Copiapó</p>
                            </div>
                        </div>
                        <div class="line">
                            <div class="s-1 m-1 l-1 text-center">
                                <i class="icon-mail text-primary text-size-12"></i>
                            </div>
                            <div class="s-11 m-11 l-11 margin-bottom-10">
                                <p><a href="mailto:contactoradio@madero.cl" class="text-primary-hover"><b>Email:</b>  contactoradio@madero.cl</a></p>
                            </div>
                        </div>
                        <div class="line">
                            <div class="s-1 m-1 l-1 text-center">
                                <i class="icon-smartphone text-primary text-size-12"></i>
                            </div>
                            <div class="s-11 m-11 l-11 margin-bottom-10">
                                <p><b>Teléfono:</b>  +56 972 281 896</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div id="weather1" class="item active"></div>
                        <div id="weather2" class="item"></div>
                        <div id="weather3" class="item"></div>
                        <div id="weather4" class="item"></div>
                    </div>
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

<div id="radiotvModal" class="modal fade" style="margin-top:30%;border-radius:5px" role="dialog">
    <div class="modal-dialog modal-sm center-block" style="width:40%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#ed1c24;color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Emisiones</h4>
            </div>
            <div class="modal-body">        
                <ul class="menu vertical radiolist">
                    <li><span>Madero TV:</span></li>
                    <li><a onClick="window.open('http://media.digitalproserver.com/v2/live/maderotv/', 'Antofagasta', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/madero/main/web/images/radio.jpg" style="width:20px;height:20px" />Antofagasta</a></li>
                    <li><a onClick="window.open('http://media.digitalproserver.com/v2/live/maderotv2/', 'Coquimbo', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/madero/main/web/images/radio.jpg" style="width:20px;height:20px" />Coquimbo</a></li>
                    <li><span>Escuchanos en:</span></li>
                    <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_antofagasta/mp3/icecast.audio', 'Antofagasta', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Antofagasta</a></li>
                    <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_copiapo/mp3/icecast.audio', 'Atacama', 'resizable,height=260,width=370'); return false;" href="#" target="_blank"  ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Atacama</a></li>
                    <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Coquimbo', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Coquimbo</a></li>
                    <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Nacional', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Nacional</a></li>

                </ul>              

            </div>
        </div>
    </div>
</div>  

<script type="text/javascript" src="/madero/main/web/lib/jquery.js"></script>
<script type="text/javascript" src="/madero/main/web/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="/madero/main/web/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/madero/main/web/lib/owl.carousel.min.js"></script>
<script type="text/javascript" src="/madero/main/web/js/main.js"></script>
<script type="text/javascript" src="/madero/main/web/lib/jquery.simpleWeather.min.js"></script>
<script src="/madero/main/web/lib/angular.min.js"></script>
<script src="/madero/main/web/lib/angular-route.min.js"></script>
<script src="/madero/main/web/lib/angular-animate.min.js"></script>
<script src="/madero/main/web/lib/angular-locale_es-cl.min.js" type="text/javascript"></script>
<script src="/madero/main/web/lib/lodash.min.js" type="text/javascript"></script>
<script src="/madero/main/web/lib/angular-simple-logger.min.js" type="text/javascript"></script>
<script src="/madero/main/web/js/controller.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-touch.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86337148-1', 'auto');
  ga('send', 'pageview');

</script>