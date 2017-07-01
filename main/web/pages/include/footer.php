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

<footer id="footer" ng-cloak ng-controller="footerController">
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

<div id="radiotvModal" class="modal fade" style="margin-top:30%;border-radius:5px" role="dialog" ng-controller="tvModalController">
    <div class="modal-dialog modal-sm center-block" style="width:60%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#ed1c24;color:white">
                <button ng-click="cerrarRadios()" type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Emisiones</h4>
            </div>
            <div class="modal-body"> 
                <div>
                    <img id="playImgModal" class="img-responsive" src="/madero/main/web/images/maderotv/play.jpeg" />
                    <iframe id="tvIframeModal" style="display:none;width:100%;height:210px" class="vrudo"  allowfullscreen="true" frameborder="0" scrolling="no"></iframe>
                </div>

                <ul class="menu vertical radiolist">
                    <li><span>Madero TV:</span></li>
                    <li><a ng-click="cargarRadio('ANTOFAGASTA')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Antofagasta</a></li>
                    <li><a ng-click="cargarRadio('ATACAMA')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Atacama</a></li>
                    <li><a ng-click="cargarRadio('DESIERTO')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Desierto</a></li>
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

