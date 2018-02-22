<?php
/**
 * Created by PhpStorm.
 * User: Marcos Rubens de Camargo
 * Date: 17/02/2018
 * Time: 10:52
 */
$user = $_GET['user'];
include ("header.php");
?>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Bem Vindo, <strong><?= $user ?></strong></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope" about="Mensagens"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
            <i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding step-text"><i class="active fa fa-users fa-fw"></i>Home</a>
        <a data-toggle="tab" href="#info" class="w3-bar-item w3-button w3-padding"><i class="fa fa-info-circle"></i>  Informações</a>
        <a data-toggle="tab" href="#hank" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Hanking</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map-marker-alt"></i>EcoPoints</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users"></i> EcoCoop</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Geral</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Histórico</a>
        <a data-toggle="tab" href="#home" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Configurações</a><br><br>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fas fa-tachometer-alt"></i> Meu Dashboard</b></h5>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-green w3-padding-16">
                        <div class="w3-left"><i class="fas fa-gem fa-3x"></i></div>
                        <div class="w3-right">

                            1,234,567.00 <br>
                            $1.99 <br>
                            12345

                        </div>
                        <div class="w3-clear"></div>
                        <h4>Points</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><i class="fa fa-exchange-alt fa-3x"></i></div>
                        <div class="w3-right">
                            <h3>99</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Entregas feitas</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fab fa-youtube fa-4x"></i></div>
                        <div class="w3-right">
                            <h3>23</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Notícias</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-orange w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>50</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Users</h4>
                    </div>
                </div>
            </div>

            <div class="w3-panel">
                <div class="w3-row-padding" style="margin:0 -16px">
                    <div class="w3-third">
                        <h5>EcoPoints</h5>
                        <div id="map"></div>

                        <script>
                            var customLabel = {
                                restaurant: {
                                    label: 'R'
                                },
                                bar: {
                                    label: 'B'
                                }
                            };

                            function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: new google.maps.LatLng(-15.779500, -47.929699),
                                    zoom: 12
                                });
                                var infoWindow = new google.maps.InfoWindow;

                                // Change this depending on the name of your PHP or XML file
                                downloadUrl('xmlDataMaps.php', function(data) {
                                    var xml = data.responseXML;
                                    var markers = xml.documentElement.getElementsByTagName('marker');
                                    Array.prototype.forEach.call(markers, function(markerElem) {
                                        var name = markerElem.getAttribute('name');
                                        var address = markerElem.getAttribute('address');
                                        var type = markerElem.getAttribute('type');
                                        var point = new google.maps.LatLng(
                                            parseFloat(markerElem.getAttribute('lat')),
                                            parseFloat(markerElem.getAttribute('lng')));

                                        var infowincontent = document.createElement('div');
                                        var strong = document.createElement('strong');
                                        strong.textContent = name
                                        infowincontent.appendChild(strong);
                                        infowincontent.appendChild(document.createElement('br'));

                                        var text = document.createElement('text');
                                        text.textContent = address
                                        infowincontent.appendChild(text);
                                        var icon = customLabel[type] || {};
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: point,
                                            label: icon.label
                                        });
                                        marker.addListener('click', function() {
                                            infoWindow.setContent(infowincontent);
                                            infoWindow.open(map, marker);
                                        });
                                    });
                                });
                            }

                        </script>

                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcTSqViCcdMJLFlkuHKSrajUV-vUm99pE&callback=initMap">
                        </script>
                    </div>
                    <div class="w3-twothird">
                        <h5>Ultimas Tranzações</h5>
                        <table class="w3-table w3-striped w3-white">
                            <tr class="text-warning">
                                <td><i class="fab fa-paypal"></i></td>
                                <td><i class="fa fa-dollar-sign"></i> Resgate de saldo</td>
                                <td><i class="fa fa-gem"></i>75300</td>
                            </tr>
                            <tr class="text-success">
                                <td><i class="fa fa-retweet"></i></td>
                                <td><i class="fa fa-recycle"></i> Plastico Pet</td>
                                <td><i class="fa fa-gem"></i>1300</td>
                            </tr>
                            <tr class="text-success">
                                <td><i class="fa fa-retweet"></i></td>
                                <td><i class="fa fa-recycle"></i> Plastico Pet</td>
                                <td><i class="fa fa-gem"></i>1300</td>
                            </tr>
                            <tr class="text-success">
                                <td><i class="fa fa-retweet"></i></td>
                                <td><i class="fa fa-recycle"></i> Alumínio </td>
                                <td><i class="fa fa-gem"></i>5300</td>
                            </tr>
                            <tr class="text-success">
                                <td><i class="fa fa-retweet"></i></td>
                                <td><i class="fa fa-recycle"></i> Plastico Pet</td>
                                <td><i class="fa fa-gem"></i>1300</td>
                            </tr>
                            <tr class="text-primary">
                                <td><i class="fa fa-hourglass-half"></i> Pendente </td>
                                <td><i class="fa fa-recycle"></i> Plastico Pet</td>
                                <td><i class="fa fa-gem"></i>1300</td>
                            </tr>
                            <tr class="text-success">
                                <td><i class="fa fa-retweet"></i></td>
                                <td><i class="fa fa-recycle"></i> Plastico Pet</td>
                                <td><i class="fa fa-gem"></i>1300</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--CONTENT 2-->
    <div id="hank" class="tab-pane fade">

        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fas fa-tachometer-alt"></i> Meu Dashboard</b></h5>
            </header>
            <div class="w3-container">
                <h5>Hanking Estadual</h5>
                <p></p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
                </div>

                <p>New Users</p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
                </div>

                <p>Bounce Rate</p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
                </div>
            </div>
            <hr>

            <div class="w3-container">
                <h5>EcoHank</h5>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                    <tr>
                        <td>
                            <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
                        </td>
                        <td>Marcos Aurelio</td>
                        <td><i class="fa fa-gem"></i>5300</td>
                    </tr>
                    <tr>
                        <td>UK</td>
                        <td>15.7%</td>
                    </tr>
                    <tr>
                        <td>Russia</td>
                        <td>5.6%</td>
                    </tr>
                    <tr>
                        <td>Spain</td>
                        <td>2.1%</td>
                    </tr>
                    <tr>
                        <td>India</td>
                        <td>1.9%</td>
                    </tr>
                    <tr>
                        <td>France</td>
                        <td>1.5%</td>
                    </tr>
                </table><br>
                <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
            </div>

        </div>

    </div>

    <div id="depoiment" class="tab-pane fade">
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <div class="w3-container">
                <h5>Depoimentos</h5>
                <ul class="w3-ul w3-card-4 w3-white">
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Mike</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jill</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jane</span><br>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="info" class="tab-pane fade">
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <div class="w3-container">
                <h5>Depoimentos</h5>
                <ul class="w3-ul w3-card-4 w3-white">
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Mike</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jill</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jane</span><br>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="socialComents" class="tab-pane fade">
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <div class="w3-container">
                <h5>Recent Comments</h5>
                <div class="w3-row">
                    <div class="w3-col m2 text-center">
                        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
                    </div>
                    <div class="w3-col m10 w3-container">
                        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
                        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                    </div>
                </div>

                <div class="w3-row">
                    <div class="w3-col m2 text-center">
                        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
                    </div>
                    <div class="w3-col m10 w3-container">
                        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                    </div>
                </div>
            </div>
            <br>
            <div class="w3-container w3-dark-grey w3-padding-32">
                <div class="w3-row">
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
                        <p>Language</p>
                        <p>Country</p>
                        <p>City</p>
                    </div>
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-red">System</h5>
                        <p>Browser</p>
                        <p>OS</p>
                        <p>More</p>
                    </div>
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-orange">Target</h5>
                        <p>Users</p>
                        <p>Active</p>
                        <p>Geo</p>
                        <p>Interests</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php include ("footer.php");?>




