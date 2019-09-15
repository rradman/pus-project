<?php
    include('session.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>LED Control</title>
		<!-- Knjižnica za Bootstrap koji služi za responzivni prikaz stranice -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- Knjižnica za "Font Awesome" koju koristimo -->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- Skripta za bojanje i dimenzioniranje elemenata stranice -->
		<link href="assets/css/custom-styles.css" rel="stylesheet" />
		<!-- Google Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>

<body>
    <div id="wrapper">     
        <div id="page-wrapper"> 
            <div id="page-inner">
				<!-- 4 panela na vrhu stranice  (zaglavlje)-->
                <div class="row"> <!-- Rasporedi elemente po stupcima (12) [Bootstrap]-->
				<!-- Aktivne ledice -->
                    <div class="col-md-3 col-sm-12 col-xs-12">	<!-- Uzmi si 3 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
						<div class="panel panel-primary text-center no-boder bg-color-blue">	 <!-- Stil za panel -->
                            <div class="panel-body">
                                <i class="fa fa-lightbulb-o fa-5x"></i>	<!-- Odabir ikonice iz "Font Awesome" i odabir veličine -->
                                <h3 id="numAktLed">4</h3>	<!-- Broj ledica koje koristimo -->
                            </div>
                            <div class="panel-footer back-footer-blue"> <!-- Prikaz teksta ispod ikonice -->
                                Number of active LED

                            </div>
                        </div>
                    </div>
					<!-- Upaljene ledice -->
                    <div class="col-md-3 col-sm-12 col-xs-12">	<!-- Uzmi si 3 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-primary text-center no-boder bg-color-green">	<!-- Stil za panel -->
                            <div class="panel-body">
                                <i class="fa fa-bolt fa-5x"></i>	<!-- Odabir ikonice iz "Font Awesome" i odabir veličine -->
                                <h3 id="numOnLed">4</h3>
                            </div>
                            <div class="panel-footer back-footer-green">	<!-- Prikaz teksta ispod ikonice -->
                                Number of LEDs ON
                            </div>
                        </div>
                    </div>
					<!-- Ugašene ledice -->
                    <div class="col-md-3 col-sm-12 col-xs-12">	<!-- Uzmi si 3 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-primary text-center no-boder bg-color-red">		<!-- Stil za panel -->
                            <div class="panel-body">
                                <i class="fa fa fa-times-circle fa-5x"></i>		<!-- Odabir ikonice iz "Font Awesome" i odabir veličine -->
                                   <h3 id="numOffLed">0</h3>
                            </div>
                            <div class="panel-footer back-footer-red">	<!-- Prikaz teksta ispod ikonice -->
                                Number of LEDs OFF
                            </div>
                        </div>
                    </div>
					<!-- Pokretanje i zaustavljanje skripte -->
                    <div class="col-md-3 col-sm-12 col-xs-12">	<!-- Uzmi si 3 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-primary text-center no-boder ">		<!-- Stil za panel -->
                            <div class="panel-body">
                                <i id="iconControl" class="fa fa-power-off fa-4x bg-color-green"></i>		<!-- Odabir ikonice iz "Font Awesome" i odabir veličine -->
								<h2 align = "center">
									<center><button type="button" id="start" class="btn btn-danger btn-md"> <a href="logout.php"> <b> Logout</b></a></button></center>
									
								</h2>
                            </div>
                            <div class="panel-footer back-footer-black">	<!-- Prikaz teksta ispod ikonice -->
                                LED Control
                            </div>
                        </div>
                    </div>
                </div>

				<!-- Paneli za LED1 i LED2 -->
                <div class="row">
					<!-- Panel za LED1 -->
                    <div class="col-md-6 col-sm-12 col-xs-12">	<!-- Uzmi si 6 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-default">
                            <div id="ledHeading1" class="panel-heading">
                                <h2 style="text-align:center;padding-bottom:15px;" id="ledIcon1"> 	<!-- Custom SVG LED ikonica koja se ne nalazi u "Font Awesome" -->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="35px" height="35px">
									<g><g><path d="M395.636,302.545h-58.182v-58.182c0-6.982-4.655-11.636-11.636-11.636h-23.273l20.945-27.927    c3.491-4.655,2.327-12.8-2.327-16.291s-12.8-2.327-16.291,2.327l-34.909,46.545c-2.327,3.491-3.491,8.145-1.164,11.636    S274.618,256,279.273,256h34.909v46.545H197.818v-93.091h46.545l-20.945,27.927c-3.491,4.655-2.327,12.8,2.327,16.291    s12.8,2.327,16.291-2.327l34.909-46.545c2.327-3.491,3.491-8.145,1.164-11.636s-5.818-6.982-10.473-6.982h-81.455    c-6.982,0-11.636,4.655-11.636,11.636v104.727c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h221.091    c6.982,0,11.636,4.655,11.636,11.636c0,6.982-4.655,11.636-11.636,11.636H116.364c-6.982,0-11.636-4.655-11.636-11.636    c0-6.982,4.655-11.636,11.636-11.636H128c11.636,0,11.636-10.473,11.636-18.618V139.636c0-64,52.364-116.364,116.364-116.364    s116.364,52.364,116.364,116.364v128c0,6.982,4.655,11.636,11.636,11.636s11.636-4.655,11.636-11.636v-128    C395.636,62.836,332.8,0,256,0S116.364,62.836,116.364,139.636c0,0,0,123.345,0,162.909c-19.782,0-34.909,15.127-34.909,34.909    c0,19.782,15.127,34.909,34.909,34.909h279.273c19.782,0,34.909-15.127,34.909-34.909    C430.545,317.673,415.418,302.545,395.636,302.545z" />
									</g></g>
									<g><g><path d="M186.182,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C197.818,400.291,193.164,395.636,186.182,395.636z" />
									</g></g>
									<g><g><path d="M325.818,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C337.455,400.291,332.8,395.636,325.818,395.636z"/>
									</g></g>
								</svg>
								<b id="panel_naslov1"> LED 1</b>
								</h2>
                            </div>
							<!-- Panel koji sadrži gumbe, slider i graf za upravljanje ledicom -->
                            <div class="panel-body">
								<div id="controlLed1"> <!-- Dio panela koji sadrži gumbe za paljenje i gašenje ledice -->
									<center>
										<button type="button" onclick="turnLed(1,1);" id="pinon1" class="btn btn-success btn-lg">ON</button>
										<button type="button" onclick="turnLed(1,0);" id="pinoff1" class="btn btn-danger btn-lg">OFF</button>
									</center>
								</div>
								<!-- Slider za izmjenu DC-a (onChange) -->
								<div id="controlSliderLed1" style="margin-left:25%;">
									<div id="slider1" style="margin-top:25px;width:60%;height:30px;">
										<div id="custom-handle1" class="ui-slider-handle" style="padding-top:5px;text-align:center;font-weight:bold;height:35px;width:30px;"></div>
									</div>
									<!-- Ručni unos Duty Cycle-a -->
									<div id="customControlInputLed1" style="margin-top:20px;">
										Custom DC:(1-100%) <input id="dc_custom1" style="font-weight:bold;text-align:center;padding-top:5px;padding-bottom:5px;" type="number" min="1" max="100">	<!-- Polje za unos -->
									<button id="btnCustom1" style="margin-left:10px;" type="button" onclick="sendCustomDc(1);" class="btn btn-primary btn-md">Submit</button>		<!-- Gumb za slanje -->							
									</div>								
								</div>
								<div id="led1setup" style="width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
									<div style="font-weight:bold;">
										<!-- Odabir datuma -->
										<div class="col-xs-12 col-md-4">From: <input placeholder="Date from" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker1Od"></div>
										<div class="col-xs-12 col-md-4">To: <input placeholder="Date to" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker1Do"></div>
										<div class="col-xs-12 col-md-4">
											<!-- Prikaži povijest -->
											<button type="button" onclick="showDataHistory(1);" id="" class="btn btn-primary btn-lg">Show</button>
											<!-- Prikaži zadnjih 10 vrijednosti -->
											<button type="button" onclick="showDataLive(1);" id="" class="btn btn-primary btn-lg">Live</button>
										</div>
									</div>
									<!-- Mjesto za ispis grafa -->
									<div id="chartdiv1" style="height:400px;width:100%;margin-top:100px;"> </div>							
								</div>						
                            </div>
                        </div>
                    </div>
					<!-- Panel za LED2 -->
					<div class="col-md-6 col-sm-12 col-xs-12">	<!-- Uzmi si 6 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-default">
                            <div id="ledHeading2" class="panel-heading">
                                <h2 style="text-align:center;padding-bottom:15px;" id="ledIcon2">	<!-- Custom SVG LED ikonica koja se ne nalazi u "Font Awesome" -->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="35px" height="35px">
									<g><g><path d="M395.636,302.545h-58.182v-58.182c0-6.982-4.655-11.636-11.636-11.636h-23.273l20.945-27.927    c3.491-4.655,2.327-12.8-2.327-16.291s-12.8-2.327-16.291,2.327l-34.909,46.545c-2.327,3.491-3.491,8.145-1.164,11.636    S274.618,256,279.273,256h34.909v46.545H197.818v-93.091h46.545l-20.945,27.927c-3.491,4.655-2.327,12.8,2.327,16.291    s12.8,2.327,16.291-2.327l34.909-46.545c2.327-3.491,3.491-8.145,1.164-11.636s-5.818-6.982-10.473-6.982h-81.455    c-6.982,0-11.636,4.655-11.636,11.636v104.727c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h221.091    c6.982,0,11.636,4.655,11.636,11.636c0,6.982-4.655,11.636-11.636,11.636H116.364c-6.982,0-11.636-4.655-11.636-11.636    c0-6.982,4.655-11.636,11.636-11.636H128c11.636,0,11.636-10.473,11.636-18.618V139.636c0-64,52.364-116.364,116.364-116.364    s116.364,52.364,116.364,116.364v128c0,6.982,4.655,11.636,11.636,11.636s11.636-4.655,11.636-11.636v-128    C395.636,62.836,332.8,0,256,0S116.364,62.836,116.364,139.636c0,0,0,123.345,0,162.909c-19.782,0-34.909,15.127-34.909,34.909    c0,19.782,15.127,34.909,34.909,34.909h279.273c19.782,0,34.909-15.127,34.909-34.909    C430.545,317.673,415.418,302.545,395.636,302.545z" />
									</g></g>
									<g><g><path d="M186.182,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C197.818,400.291,193.164,395.636,186.182,395.636z" />
									</g></g>
									<g><g><path d="M325.818,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C337.455,400.291,332.8,395.636,325.818,395.636z"/>
									</g></g>
								</svg><b id="panel_naslov2"> LED 2</b></h2>
                            </div>
							<!-- Panel koji sadrži gumbe, slider i graf za upravljanje ledicom -->
                            <div class="panel-body">
								<div id="controlLed2">	<!-- Dio panela koji sadrži gumbe za paljenje i gašenje ledice -->
									<center>
										<button type="button" onclick="turnLed(2,1);" id="pinon2" class="btn btn-success btn-lg">ON</button>
										<button type="button" onclick="turnLed(2,0);" id="pinoff2" class="btn btn-danger btn-lg">OFF</button>
									</center>
								</div>
								<!-- Slider za izmjenu DC-a (onChange) -->
								<div id="controlSliderLed2" style="margin-left:25%;">
									<div id="slider2" style="margin-top:25px;width:60%;height:30px;">
										<div id="custom-handle2" class="ui-slider-handle" style="padding-top:5px;text-align:center;font-weight:bold;height:35px;width:30px;"></div>
									</div>
									<!-- Ručni unos Duty Cycle-a -->
									<div id="customControlInputLed2" style="margin-top:20px;">
										Custom DC:(1-100%) <input id="dc_custom2" style="font-weight:bold;text-align:center;padding-top:5px;padding-bottom:5px;" type="number" min="1" max="100">	<!-- Polje za unos -->
									<button id="btnCustom2" style="margin-left:10px;" type="button" onclick="sendCustomDc(2);" class="btn btn-primary btn-md">Submit</button>		<!-- Gumb za slanje -->
									</div>
								</div>
								<div id="led2setup" style="width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
									<div style="font-weight:bold;">
										<!-- Odabir datuma -->
										<div class="col-xs-12 col-md-4">From: <input placeholder="Date from" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker2Od"></div>
										<div class="col-xs-12 col-md-4">To: <input placeholder="Date to" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker2Do"></div>
										<div class="col-xs-12 col-md-4">
											<!-- Prikaži povijest -->
											<button type="button" onclick="showDataHistory(2);" id="" class="btn btn-primary btn-lg">Show</button>
											<!-- Prikaži zadnjih 10 vrijednosti -->
											<button type="button" onclick="showDataLive(2);" id="" class="btn btn-primary btn-lg">Live</button>
										</div>
									</div>
								</div>
								<!-- Mjesto za prikaz grafa -->
								<div id="chartdiv2" style="height:400px;width:100%;margin-top:100px;"> </div>
                            </div>
                        </div>
                    </div>
                </div>

				<!-- Paneli za LED3 i LED4 -->		
				<div class="row">
					<!-- Panel za LED3 -->
                    <div class="col-md-6 col-sm-12 col-xs-12">	<!-- Uzmi si 6 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-default">
                            <div id="ledHeading3" class="panel-heading">
                                <h2 style="text-align:center;padding-bottom:15px;" id="ledIcon3">	<!-- Custom SVG LED ikonica koja se ne nalazi u "Font Awesome" -->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="35px" height="35px">
									<g><g><path d="M395.636,302.545h-58.182v-58.182c0-6.982-4.655-11.636-11.636-11.636h-23.273l20.945-27.927    c3.491-4.655,2.327-12.8-2.327-16.291s-12.8-2.327-16.291,2.327l-34.909,46.545c-2.327,3.491-3.491,8.145-1.164,11.636    S274.618,256,279.273,256h34.909v46.545H197.818v-93.091h46.545l-20.945,27.927c-3.491,4.655-2.327,12.8,2.327,16.291    s12.8,2.327,16.291-2.327l34.909-46.545c2.327-3.491,3.491-8.145,1.164-11.636s-5.818-6.982-10.473-6.982h-81.455    c-6.982,0-11.636,4.655-11.636,11.636v104.727c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h221.091    c6.982,0,11.636,4.655,11.636,11.636c0,6.982-4.655,11.636-11.636,11.636H116.364c-6.982,0-11.636-4.655-11.636-11.636    c0-6.982,4.655-11.636,11.636-11.636H128c11.636,0,11.636-10.473,11.636-18.618V139.636c0-64,52.364-116.364,116.364-116.364    s116.364,52.364,116.364,116.364v128c0,6.982,4.655,11.636,11.636,11.636s11.636-4.655,11.636-11.636v-128    C395.636,62.836,332.8,0,256,0S116.364,62.836,116.364,139.636c0,0,0,123.345,0,162.909c-19.782,0-34.909,15.127-34.909,34.909    c0,19.782,15.127,34.909,34.909,34.909h279.273c19.782,0,34.909-15.127,34.909-34.909    C430.545,317.673,415.418,302.545,395.636,302.545z" />
									</g></g>
									<g><g><path d="M186.182,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C197.818,400.291,193.164,395.636,186.182,395.636z" />
									</g></g>
									<g><g><path d="M325.818,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C337.455,400.291,332.8,395.636,325.818,395.636z"/>
									</g></g>
								</svg><b id="panel_naslov3"> LED 3</b></h2>
                            </div>
							<!-- Panel koji sadrži gumbe, slider i graf za upravljanje ledicom -->
                            <div class="panel-body">
								<div id="controlLed3">	<!-- Dio panela koji sadrži gumbe za paljenje i gašenje ledice -->
									<center>
										<button type="button" onclick="turnLed(3,1);" id="pinon3" class="btn btn-success btn-lg">ON</button>
										<button type="button" onclick="turnLed(3,0);" id="pinoff3" class="btn btn-danger btn-lg">OFF</button>
									</center>
								</div>
								<!-- Slider za izmjenu DC-a (onChange) -->
								<div id="controlSliderLed3" style="margin-left:25%;">
									<div id="slider3" style="margin-top:25px;width:60%;height:30px;">
										<div id="custom-handle3" class="ui-slider-handle" style="padding-top:5px;text-align:center;font-weight:bold;height:35px;width:30px;"></div>
									</div>
									<!-- Ručni unos Duty Cycle-a -->
									<div id="customControlInputLed3" style="margin-top:20px;">
										Custom DC:(1-100%) <input id="dc_custom3" style="font-weight:bold;text-align:center;padding-top:5px;padding-bottom:5px;" type="number" min="1" max="100">	<!-- Polje za unos -->
									<button id="btnCustom3" style="margin-left:10px;" type="button" onclick="sendCustomDc(3);" class="btn btn-primary btn-md">Submit</button>		<!-- Gumb za slanje -->
									</div>									
								</div>
								<div id="led3setup" style="width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
									<div style="font-weight:bold;">
										<!-- Unos datuma za prikaz povijesti -->
										<div class="col-xs-12 col-md-4">From: <input placeholder="Date from" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker3Od"></div>
										<div class="col-xs-12 col-md-4">To: <input placeholder="Date to" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker3Do"></div>
										<div class="col-xs-12 col-md-4">
											<!-- Gumb za slanje datuma -->
											<button type="button" onclick="showDataHistory(3);" id="" class="btn btn-primary btn-lg">Show</button>
											<!-- Gumb za prikaz posljednjih 10 vrijednosti -->
											<button type="button" onclick="showDataLive(3);" id="" class="btn btn-primary btn-lg">Live</button>
										</div>
									</div>
									<!-- Mjesto za kojemu će se prikazati graf -->
									<div id="chartdiv3" style="height:400px;width:100%;margin-top:100px;"> </div>						
								</div>	
                            </div>
                        </div>
                    </div>
					
					<!-- Panel za LED4 -->
					<div class="col-md-6 col-sm-12 col-xs-12">	<!-- Uzmi si 6 od mogućih 12 stupaca na velikim ekranima, na malima uzmi sve (12) -->
                        <div class="panel panel-default">
                            <div id="ledHeading4" class="panel-heading">
                                <h2 style="text-align:center;padding-bottom:15px;" id="ledIcon4">	<!-- Custom SVG LED ikonica koja se ne nalazi u "Font Awesome" -->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="35px" height="35px">
									<g><g><path d="M395.636,302.545h-58.182v-58.182c0-6.982-4.655-11.636-11.636-11.636h-23.273l20.945-27.927    c3.491-4.655,2.327-12.8-2.327-16.291s-12.8-2.327-16.291,2.327l-34.909,46.545c-2.327,3.491-3.491,8.145-1.164,11.636    S274.618,256,279.273,256h34.909v46.545H197.818v-93.091h46.545l-20.945,27.927c-3.491,4.655-2.327,12.8,2.327,16.291    s12.8,2.327,16.291-2.327l34.909-46.545c2.327-3.491,3.491-8.145,1.164-11.636s-5.818-6.982-10.473-6.982h-81.455    c-6.982,0-11.636,4.655-11.636,11.636v104.727c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h221.091    c6.982,0,11.636,4.655,11.636,11.636c0,6.982-4.655,11.636-11.636,11.636H116.364c-6.982,0-11.636-4.655-11.636-11.636    c0-6.982,4.655-11.636,11.636-11.636H128c11.636,0,11.636-10.473,11.636-18.618V139.636c0-64,52.364-116.364,116.364-116.364    s116.364,52.364,116.364,116.364v128c0,6.982,4.655,11.636,11.636,11.636s11.636-4.655,11.636-11.636v-128    C395.636,62.836,332.8,0,256,0S116.364,62.836,116.364,139.636c0,0,0,123.345,0,162.909c-19.782,0-34.909,15.127-34.909,34.909    c0,19.782,15.127,34.909,34.909,34.909h279.273c19.782,0,34.909-15.127,34.909-34.909    C430.545,317.673,415.418,302.545,395.636,302.545z" />
									</g></g>
									<g><g><path d="M186.182,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C197.818,400.291,193.164,395.636,186.182,395.636z" />
									</g></g>
									<g><g><path d="M325.818,395.636c-6.982,0-11.636,4.655-11.636,11.636v93.091c0,6.982,4.655,11.636,11.636,11.636    s11.636-4.655,11.636-11.636v-93.091C337.455,400.291,332.8,395.636,325.818,395.636z"/>
									</g></g>
								</svg><b id="panel_naslov4"> LED 4</b></h2>
                            </div>
							<!-- Panel koji sadrži gumbe, slider i graf za upravljanje ledicom -->
                            <div class="panel-body">
								<div id="controlLed4">	<!-- Dio panela koji sadrži gumbe za paljenje i gašenje ledice -->
									<center>
										<button type="button" onclick="turnLed(4,1);" id="pinon4" class="btn btn-success btn-lg">ON</button>
										<button type="button" onclick="turnLed(4,0);" id="pinoff4" class="btn btn-danger btn-lg">OFF</button>
									</center>
								</div>
								<!-- Slider za izmjenu DC-a (onChange) -->
								<div id="controlSliderLed4" style="margin-left:25%;">
									<div id="slider4" style="margin-top:25px;width:60%;height:30px;">
										<div id="custom-handle4" class="ui-slider-handle" style="padding-top:5px;text-align:center;font-weight:bold;height:35px;width:30px;"></div>
									</div>
									<!-- Ručni unos Duty Cycle-a -->
									<div id="customControlInputLed4" style="margin-top:20px;">
										Custom DC:(1-100%) <input id="dc_custom4" style="font-weight:bold;text-align:center;padding-top:5px;padding-bottom:5px;" type="number" min="1" max="100">	<!-- Polje za unos -->
									<button id="btnCustom4" style="margin-left:10px;" type="button" onclick="sendCustomDc(4);" class="btn btn-primary btn-md">Submit</button>		<!-- Gumb za slanje -->
									</div>
								</div>
								<div id="led4setup" style="width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
									<div style="font-weight:bold;">
										<!-- Unos datuma za prikaz povijest -->
										<div class="col-xs-12 col-md-4">From: <input placeholder="Date from" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker4Od"></div>
										<div class="col-xs-12 col-md-4">To: <input placeholder="Date to" style="width:70%;text-align:center;font-size:15px;padding-bottom:10px;padding-top:10px;" type="text" id="datepicker4Do"></div>
										<div class="col-xs-12 col-md-4">
											<!-- Gumb za slanje datuma -->
											<button type="button" onclick="showDataHistory(4);" id="pinoff2" class="btn btn-primary btn-lg">Show</button>
											<!-- Gumb za prikaz posljednjih 10 vrijednosti -->
											<button type="button" onclick="showDataLive(4);" id="pinoff1" class="btn btn-primary btn-lg">Live</button>
										</div>
									</div>
								</div>
								<!-- Mjesto na kojemu će se prikazati graf -->
								<div id="chartdiv4" style="height:400px;width:100%;margin-top:100px;"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="amcharts/amcharts.js" type="text/javascript"></script>
    <script src="amcharts/serial.js" type="text/javascript"></script>
	<script src="assets/moment.js" type="text/javascript"></script>	
	
	<script>
	//varijable za čuvanje posljednjeg DC, kojega ćemo iskoristiti za usporedbu sa novounesenim DC
	var tmpFade1 = "";
	var tmpFade2 = "";
	var tmpFade3 = "";
	var tmpFade4 = "";

//	var onLedice = [];	//polje koje sadrži upaljene ledice
//	var offLedice = ["1","2","3","4"];	//polje koje sadrži ugašene ledice
	
	var offLedice =[];
	var onLedice = ["1","2","3","4"]; 
	// polja u koja spremamo vrijednosti koje se prikazuju na grafu (korišteno za "čišćenje" grafa)
	var globalChartData1 = [];
	var globalChartData2 = [];
	var globalChartData3 = [];
	var globalChartData4 = [];

	//varijable za inicijalizaciju grafa
	var chart1;		//graf
	var chartData1 = [];	//polje za punjenje podataka grafa (JSON)
	var chart2;
	var chartData2 = [];
	var chart3;
	var chartData3 = [];
	var chart4;
	var chartData4 = [];

	//varijable za provjeru prvog učitavanja aplikacije radi sprječavanja ponovnog iscrtavanja grafa
	var prviLoad1 = 1;
	var prviLoad2 = 1;
	var prviLoad3 = 1;
	var prviLoad4 = 1;
	//Dio koda koji se izvršava nakon učitavanja HTML dijela stranice 
	$(document).ready(function(){

		//dohvacanje stanja iz baze nakon reseta             				//ajax poziv za start.php koja pokreće python skriptu
		var a = new XMLHttpRequest();
		a.open("GET","start.php");      //destination URL
		a.send();       //slanje naredbe
 
		document.getElementById("start").style.display = "block";
		
		//Pri prvom pokretanju stranice, sakrij sve slidere i polja za ručni unos 		
		for(var i=1;i<5;i++){
		document.getElementById("controlSliderLed"+i+"").style.display = "none";
		document.getElementById("controlLed"+i+"").style.display = "none";
		}
			
			
		var handle1 = $( "#custom-handle1" );			//Inicijalizacija Slidera za LED1
		$( "#slider1" ).slider({
		  create: function() { 							//Nakon učitavanja stranice, prikaži vrijednost kao broj na slideru
			handle1.text( $( this ).slider( "value" ) );
		  },
		  slide: function( event, ui ) { 				//promjenom stanja slidera, mijenjaj vrijednost broja koji se prikazuje na slideru
			handle1.text( ui.value );
			
		  },
		  change: function( event, ui ) {				//nakon otpuštanja slidera pozovi funkciju za slanje DC-a
			sendSliderDataToChange(ui.value,1);
			
		  }
		});
		 
		var handle2 = $( "#custom-handle2" );				// Inicijalizacija Slidera za LED2 
		$( "#slider2" ).slider({
		  create: function() {								//Nakon učitavanja stranice, prikaži vrijednost kao broj na slideru
			handle2.text( $( this ).slider( "value" ) );
		  },
		  slide: function( event, ui ) {					//promjenom stanja slidera, mijenjaj vrijednost broja koji se prikazuje na slideru
			handle2.text( ui.value );
			
		  },
		  change: function( event, ui ) {					//nakon otpuštanja slidera pozovi funkciju za slanje DC-a
			sendSliderDataToChange(ui.value,2);
		  }
		});		
	
		var handle3 = $( "#custom-handle3" );				// Inicijalizacija Slidera za LED3 
		$( "#slider3" ).slider({
		  create: function() {								//Nakon učitavanja stranice, prikaži vrijednost kao broj na slideru
			handle3.text( $( this ).slider( "value" ) );
		  },
		  slide: function( event, ui ) {					//promjenom stanja slidera, mijenjaj vrijednost broja koji se prikazuje na slideru
			handle3.text( ui.value );
			
		  },
		  change: function( event, ui ) {					//nakon otpuštanja slidera pozovi funkciju za slanje DC-a
			sendSliderDataToChange(ui.value,3);
		  }
		});	
		
			var handle4 = $( "#custom-handle4" );			// Inicijalizacija Slidera za LED4 
		$( "#slider4" ).slider({
		  create: function() {								//Nakon učitavanja stranice, prikaži vrijednost kao broj na slideru
			handle4.text( $( this ).slider( "value" ) );
		  },
		  slide: function( event, ui ) {					//promjenom stanja slidera, mijenjaj vrijednost broja koji se prikazuje na slideru
			handle4.text( ui.value );
			
		  },
		  change: function( event, ui ) {					//nakon otpuštanja slidera pozovi funkciju za slanje DC-a
			sendSliderDataToChange(ui.value,4);
		  }
		});	

		//Inicijalizacija odabira datuma koristeći Jquerry datepicker (prikaži kalendar)					
		$("#datepicker1Od").datepicker({});
		$("#datepicker1Do").datepicker({});
		$("#datepicker2Od").datepicker({});
		$("#datepicker2Do").datepicker({});
		$("#datepicker3Od").datepicker({});
		$("#datepicker3Do").datepicker({});
		$("#datepicker4Od").datepicker({});
		$("#datepicker4Do").datepicker({});
		

	
	});
			

	function showDataLive(id){	//funkcija za vraćanje LIVE prikaza na graf pritiskom na gumb SHOW
		if(id==1){getChartData1(); }
		if(id==2){getChartData2(); }
		if(id==3){getChartData3(); }
		if(id==4){getChartData4(); }
	}

	function showDataHistory(id){ //funkcija koja se poziva pritiskom na button "SHOW", a prikazuje povijest korištenja ledice
		
		//formatiranje i dohvaćanje vrijednosti datuma za prikaz povijesti ledica
		var datumOD = moment(document.getElementById("datepicker"+id+"Od").value).format("YYYY-MM-DD");	//formatiranje pomoću skripte moment.js
		var datumDO = moment(document.getElementById("datepicker"+id+"Do").value).format("YYYY-MM-DD"); //formatiranje pomoću skripte moment.js
		
		if(datumOD>datumDO) { alert("Krajnji datum mora biti veći od početnog datuma."); } //provjera valjanosti datuma
		else if(datumOD==datumDO){ alert("Datumi moraju biti različiti."); }	//provjera valjanosti datuma
		
		//ako su datumi OK izvrši sljedeće
		else {
		$.ajax({					//ajax za slanje potrebnih vrijednosti kako bi se dobili rezultati za prikaz na grafu
			type: 'GET',			//vrsta slanja podataka je GET
			url: "ajax/showHistory.php?id="+id+"&datumOD="+datumOD+"&datumDO="+datumDO+"", 		//destination URL sa poslanim vrijednostima
			dataType:'json',		//tip formatiranja povratnih podataka
			result: {
				get_param: 'value'	//uzmi vrijednosti iz vraćenih podataka
			},
			
			success: function(response){	//ako je JSON uspješan, radi sljedeće	
				if( (response.datum).length==0 ){	//ukoliko je vraćeni JSON prazan, upozori korisnika				
					alert("Ledica nije korištena u odabranom vremenskom periodu");
				}
				
				else if(id==1){
					for(var i=globalChartData1.length-1; i > -1; i--){	//petlja za pražnjenje grafa (polja)
						chartData1.pop();
					}
		
					for(var i=0; i<(response.datum).length; i++){		//petlja za punjenje polja sa dobivenim JSON podacima
						chartData1.push({								//unesi kao novi element na kraj polja
							"year": response.datum[i],					//u indeks year spremi datum
							"value": response.fade[i]					//u indeks value spremi DC vrijednost
						});
					}
					
					globalChartData1 = chartData1;						//ažuriranje polja sa novim podacima za prikaz na grafu
					
					if(chart1!=undefined && chart1!="undefined"){		//da li je graf već iscrtan
					chart1.validateData();								//ako je, osvježi podatke bez osvježavanja cijele stranice
					}
				}
				else if(id==2){
					for(var i=globalChartData2.length-1; i > -1; i--){	//petlja za pražnjenje grafa (polja)
						chartData2.pop();
					}
		
					for(var i=0; i<(response.datum).length; i++){		//petlja za punjenje polja sa dobivenim JSON podacima
						chartData2.push({								//unesi kao novi element na kraj polja
							"year": response.datum[i],					//u indeks year spremi datum
							"value": response.fade[i]					//u indeks value spremi DC vrijednost
						});
					}
					
					globalChartData2 = chartData2;						//ažuriranje polja sa novim podacima za prikaz na grafu
					
				if(chart2!=undefined && chart2!="undefined"){			//da li je graf već iscrtan
					chart2.validateData();								//ako je, osvježi podatke bez osvježavanja cijele stranice
				}
				}
				else if(id==3){
					for(var i=globalChartData3.length-1; i > -1; i--){	//petlja za pražnjenje grafa (polja)
						chartData3.pop();	
					}
		
					for(var i=0; i<(response.datum).length; i++){		//petlja za punjenje polja sa dobivenim JSON podacima
						chartData3.push({								//unesi kao novi element na kraj polja
							"year": response.datum[i],					//u indeks year spremi datum
							"value": response.fade[i]					//u indeks value spremi DC vrijednost
						});
					}
					globalChartData3 = chartData3;						//ažuriranje polja sa novim podacima za prikaz na grafu
					
				if(chart3!=undefined && chart3!="undefined"){			//da li je graf već iscrtan
					chart3.validateData();								//ako je, osvježi podatke bez osvježavanja cijele stranice
				}
				}
				else if(id==4){
					for(var i=globalChartData4.length-1; i > -1; i--){	//petlja za pražnjenje grafa (polja)
						chartData4.pop();
					}
		
					for(var i=0; i<(response.datum).length; i++){		//petlja za punjenje polja sa dobivenim JSON podacima
						chartData4.push({								//unesi kao novi element na kraj polja
							"year": response.datum[i],					//u indeks year spremi datum
							"value": response.fade[i]					//u indeks value spremi DC vrijednost
						});
					}
					
					globalChartData4 = chartData4;						//ažuriranje polja sa novim podacima za prikaz na grafu
					
				if(chart4!=undefined && chart4!="undefined"){			//da li je graf već iscrtan
					chart4.validateData();								//ako je, osvježi podatke bez osvježavanja cijele stranice
				}
				}		
			}
		});
		}
	}

		window.setInterval(function() {
		$.ajax({
			type: 'GET',			//metoda GET
			url: "check_rpi_status.php",				//destination URL
			dataType:'text',
			success: function(response){
				if(response==1){
					for(var i=1;i<5;i++){
						document.getElementById("controlSliderLed"+i+"").style.display = "none";
						document.getElementById("controlLed"+i+"").style.display = "none";
						document.getElementById("ledHeading"+i+"").style="background:red";
						document.getElementById("panel_naslov"+i+"").innerHTML="<h2><b>RPi OFFLINE :(</b></h2>";
					}
					document.getElementById("numAktLed").innerHTML="0";
				}
				else{
                                        for(var i=1;i<5;i++){
                                        	document.getElementById("controlSliderLed"+i+"").style.display = "block";
                                        	document.getElementById("controlLed"+i+"").style.display = "block";
						document.getElementById("ledHeading"+i+"").style="background:none";
						document.getElementById("panel_naslov"+i+"").innerHTML=" LED "+i+"";                                
					}
					document.getElementById("numAktLed").innerHTML = "4";
				}
			}
		});
		}, 1000);

	function turnLed(id,akcija){	//funkcija koja se poziva na ON-OFF svake ledice, prima ID ledice i stanje 1 ili 0
		$.ajax({					//ajax za paljenje i gašenje ledica
			type: 'GET',			//metoda GET
			url: "ajax/led-on-off.php?id="+id+"&akcija="+akcija+"",				//destination URL
			dataType:'text',
			success: function(response){
				//ako palim
				if(akcija==1){
					//document.getElementById("ledIcon"+id+"").style.fill = "green";	//promjena boje custom SVG LED ikonice
					//document.getElementById("ledIcon"+id+"").style.color = "green";	//promjena boje custom SVG LED teksta
									
					var index = offLedice.indexOf(""+id+"");	//dohvati indeks ID-a ledice iz OFF polja (offLedice)
					
					if (index > -1) {					//ako postoji u OFF polju
						offLedice.splice(index, 1);		//izbaci 1 element iz polja kojemu je indeks jednak "index"
						onLedice.push(""+id+"");		//ubaci element na kraj polja ON				
					}				
				}
				//ako gasim
				else {
					//document.getElementById("ledIcon"+id+"").style.fill = "red";	//promjena boje custom SVG LED ikonice
					//document.getElementById("ledIcon"+id+"").style.color = "red";	//promjena boje custom SVG LED teksta
					
					var index = onLedice.indexOf(""+id+"");		//dohvati indeks ID-a ledice iz ON polja (onLedice)
					
					if (index > -1) {					//ako postoji u ON polju
						onLedice.splice(index, 1);		//izbaci 1 element iz polja kojemu je indeks jednak "index"
						offLedice.push(""+id+"");		//ubaci element na kraj polja OFF					
					}	
				}
				//ažuriranje vrijednosti u panelima 2 i 3 s novim brojevima
				document.getElementById("numOnLed").innerHTML = onLedice.length;
				document.getElementById("numOffLed").innerHTML = offLedice.length;
				
				//ažuriraj graf sa novim vrijednostima (LIVE UPDATE)
				if(id==1){
					getChartData1();	//poziv funkcije za prikaz zadnjih 10 vrijednosti (LIVE)
				}
				if(id==2){
					getChartData2();	//poziv funkcije za prikaz zadnjih 10 vrijednosti (LIVE)
				}
				if(id==3){
					getChartData3();	//poziv funkcije za prikaz zadnjih 10 vrijednosti (LIVE)
				}
				if(id==4){
					getChartData4();	//poziv funkcije za prikaz zadnjih 10 vrijednosti (LIVE)
				}
			}
		});
	}

	//funkcija za provjeru i usporedbu unesenih Duty Cycle-a (spriječava ponavljanje zadnjeg unosa)
	function checkFadeStatus(sliderValue,id){
		
		if(id == 1){
			if(tmpFade1 == sliderValue){	//ažuriraj tmpFade1 sa najnovijom vrijednosti slidera
				return 1;
			}else{
				return 0;
			}
		}
		if(id == 2){
			if(tmpFade2 == sliderValue){	//ažuriraj tmpFade2 sa najnovijom vrijednosti slidera
				return 1;
			}else{
				return 0;
			}
		}
		if(id == 3){
			if(tmpFade3 == sliderValue){	//ažuriraj tmpFade3 sa najnovijom vrijednosti slidera
				return 1;
			}else{
				return 0;
			}
		}
		if(id == 4){
			if(tmpFade4 == sliderValue){	//ažuriraj tmpFade4 sa najnovijom vrijednosti slidera
				return 1;
			}else{
				return 0;
			}
		}
	}
	function sendSliderDataToChange(sliderValue,id){	//slanje DC-a sa sliderom (onChange)
		var flagFade;
		if(id == 1){
			flagFade = checkFadeStatus(sliderValue,id);		//usporedi sliderValue i id
		}
		if(id == 2){
			flagFade = checkFadeStatus(sliderValue,id);		//usporedi sliderValue i id
		}
		if(id == 3){
			flagFade = checkFadeStatus(sliderValue,id);		//usporedi sliderValue i id
		}
		if(id == 4){
			flagFade = checkFadeStatus(sliderValue,id);		//usporedi sliderValue i id
		}
		if(flagFade == 1){	//ako su jednaki
			alert("Nije došlo do promjene");
		}
		else{	//ako je došlo do promjene, ažuriraj tmpFade varijable
			if(id == 1){
				tmpFade1 = sliderValue;
			}
			if(id == 2){
				tmpFade2 = sliderValue;
			}
			if(id == 3){
				tmpFade3 = sliderValue;
			}
			if(id == 4){
				tmpFade4 = sliderValue;
			}
		$.ajax({
			type: 'GET',
			url: "ajax/dc_post.php?id="+id+"&valueslider="+sliderValue+"",		//sliderValue ovdje koristimo za slanje vrijednosti sa SLIDERA
			dataType:'text',
			success: function(response){
				
				//ažuriranje grafa (LIVE UPDATE)
				if(id==1){
					getChartData1();
				}
				if(id==2){
					getChartData2();
				}
				if(id==3){
					getChartData3();
				}
				if(id==4){
					getChartData4();
				}
			}
		});
		}
	}

	function sendCustomDc(id){	//funckija za slanje DC-a koristeći polje za ručni unos
		
		var dc = document.getElementById("dc_custom"+id+"").value;	//dohvati unesenu vrijenost
		
		var flagFade;
		if(id == 1){
			flagFade = checkFadeStatus(dc,id);		//posalji u funkciju i usporedi uneseni DC i predhodni DC
		}
		if(id == 2){
			flagFade = checkFadeStatus(dc,id);		//posalji u funkciju i usporedi uneseni DC i predhodni DC
		}
		if(id == 3){
			flagFade = checkFadeStatus(dc,id);		//posalji u funkciju i usporedi uneseni DC i predhodni DC
		}
		if(id == 4){
			flagFade = checkFadeStatus(dc,id);		//posalji u funkciju i usporedi uneseni DC i predhodni DC
		}
		if(flagFade == 1){		//ako su jednaki
			alert("Nije došlo do promjene");
		}

		else if(dc == ""){		//ako nije uneseno ništa
			alert("Unesi vrijednost!");
		}
		else if(dc > 100 || dc < 1){		//provjera ispravnosti unosa
			alert("Vrijednost mora biti između 1 i 100");
		}
		else{	//ažuriraj tmpFade varijable
			if(id == 1){
				tmpFade1 = dc;	
			}
			if(id == 2){
				tmpFade2 = dc;
			}
			if(id == 3){
				tmpFade3 = dc;
			}
			if(id == 4){
				tmpFade4 = dc;
			}
		$.ajax({
			type: 'GET',
			url: "ajax/dc_post.php?id="+id+"&valueslider="+dc+"",	////sliderValue ovdje koristimo za slanje vrijednosti sa polja za ručni unos DC-a
			dataType:'text',
			success: function(response){
				
				//ažuriranje grafa (live)
				if(id==1){ getChartData1();  }
				if(id==2){ getChartData2();  }
				if(id==3){ getChartData3();  }
				if(id==4){ getChartData4();  }
				
			}
		});
		}
	}

	//pri učitavanju aplikacija, iscrtaj sva 4 grafa sa zadnjih 10 vrijednosti (LIVE)
	getChartData1();
	getChartData2();
	getChartData3();
	getChartData4();

	function getChartData1(){	//funcija za crtanje LIVE grafa za LED1 (posljednjih 10)

		$.ajax({	//dohvati podatke za crtanje grafa iz getChartData1.php koristeći POST metodu
			type: 'POST',
			url: "ajax/getChartData1.php",
			dataType:'json',
			result: {
				get_param: 'value'	//dohvati parametre iz JSON polja
			},
			success: function(response){
				
				for(var i=(response.datum).length-1; i > -1; i--){		//pražnjenje polja ako je prikaz bio LIVE
					chartData1.pop();
				}
				
				 for(var i=globalChartData1.length-1; i > -1; i--){		//pražnjenje cijelog polja
					chartData1.pop();
				}
				
				for(var i=(response.datum).length-1; i > -1; i--){		//punjenje polja sa zadnjih deset podataka
					chartData1.push({
						"year": response.datum[i],
						"value": response.fade[i]
					});
				}
				globalChartData1 = chartData1;	//spremi polje u globalnu varijablu
			},

			complete: function(data){ 
				if(chart1!=undefined && chart1!="undefined"){
				   chart1.validateData();	//osvježavanje grafa bez osvježavanja stranice
				}
				if(prviLoad1==1){
					createChart1(); 	//ako je prvo učitavanje, iscrtaj cijeli graf
					prviLoad1 = 0;		//vrati zastavicu na 0				
				}
			}
		});
	}

	function getChartData2(){		//funcija za crtanje LIVE grafa za LED2 (posljednjih 10)

		$.ajax({		//dohvati podatke za crtanje grafa iz getChartData2.php koristeći POST metotu
			type: 'POST',
			url: "ajax/getChartData2.php",
			dataType:'json',
			result: {
				get_param: 'value'
			},
			success: function(response){
			
				for(var i=(response.datum).length-1; i > -1; i--){		//pražnjenje polja ako je prikaz bio LIVE
					chartData2.pop();
				}
				
				 for(var i=globalChartData2.length-1; i > -1; i--){		//pražnjenje cijelog polja
					chartData2.pop();
				}
				
				for(var i=(response.datum).length-1; i > -1; i--){		//punjenje polja sa zadnjih deset podataka
					chartData2.push({
						"year": response.datum[i],
						"value": response.fade[i]
					});
				}
				globalChartData2 = chartData2;		//spremi polje u globalnu varijablu
	},

			complete: function(data){ 
				if(chart2!=undefined && chart2!="undefined"){
				   chart2.validateData();		//osvježavanje grafa bez osvježavanja stranice
				}
				if(prviLoad2==1){
					createChart2(); 		//ako je prvo učitavanje, iscrtaj cijeli graf
					prviLoad2 = 0;			//vrati zastavicu na 0	
				}
			}
		});
	}

	function getChartData3(){		//funcija za crtanje LIVE grafa za LED3 (posljednjih 10)

		$.ajax({		//dohvati podatke za crtanje grafa iz getChartData3.php koristeći POST metotu
			type: 'POST',
			url: "ajax/getChartData3.php",
			dataType:'json',
			result: {
				get_param: 'value'
			},
			success: function(response){

				 for(var i=(response.datum).length-1; i > -1; i--){		//pražnjenje polja ako je prikaz bio LIVE
					chartData3.pop();
				}
				
				for(var i=globalChartData3.length-1; i > -1; i--){		//pražnjenje cijelog polja
					chartData3.pop();	
				}
				
				for(var i=(response.datum).length-1; i > -1; i--){		//punjenje polja sa zadnjih deset podataka
					chartData3.push({
						"year": response.datum[i],
						"value": response.fade[i]
					});
				}
				globalChartData3 = chartData3;		//spremi polje u globalnu varijablu
	},

			complete: function(data){
				if(chart3!=undefined && chart3!="undefined"){
				   chart3.validateData();		//osvježavanje grafa bez osvježavanja stranice
				}
				if(prviLoad3==1){
					createChart3(); 		//ako je prvo učitavanje, iscrtaj cijeli graf
					prviLoad3 = 0;			//vrati zastavicu na 0
					
				}
			}
		});
	}

	function getChartData4(){		//funcija za crtanje LIVE grafa za LED4 (posljednjih 10)

		$.ajax({		//dohvati podatke za crtanje grafa iz getChartData4.php koristeći POST metotu
			type: 'POST',
			url: "ajax/getChartData4.php",
			dataType:'json',
			result: {
				get_param: 'value'
			},
			success: function(response){
			
				for(var i=(response.datum).length-1; i > -1; i--){		//pražnjenje polja ako je prikaz bio LIVE
					chartData4.pop();
				}
					
				for(var i=globalChartData4.length-1; i > -1; i--){		//pražnjenje cijelog polja
					chartData4.pop();
				}
				
				for(var i=(response.datum).length-1; i > -1; i--){		//punjenje polja sa zadnjih deset podataka
					chartData4.push({
						"year": response.datum[i],
						"value": response.fade[i]
					});
				}
				globalChartData4 = chartData4;		//spremi polje u globalnu varijablu
	},
		
			complete: function(data){ 
			if(chart4!=undefined && chart4!="undefined"){
			   chart4.validateData();		//osvježavanje grafa bez osvježavanja stranice
			}
			if(prviLoad4==1){
				createChart4(); 	//ako je prvo učitavanje, iscrtaj cijeli graf
				prviLoad4 = 0;		//vrati zastavicu na 0
				
			}
			}
		});
	}
	//funkcija za crtanje grafa za LED1
	function createChart1(){
			chart1 = new AmCharts.AmSerialChart(); //objekt koji u sebi sadrži graf
			//Amcharts postavke za stil grafa i prikaz
			chart1.dataProvider = chartData1;	//podaci koje graf koristi (JSON)
			chart1.marginBottom = 50;
			chart1.marginRight = 50;
			chart1.marginLeft = 50;
			chart1.autoMargins = "false";
			
//			chart1.addTitle("LED 1", 18, "black");
			chart1.categoryField = "year";
			chart1.dataDateFormat = "mm";
			var categoryAxis2 = chart1.categoryAxis;
			categoryAxis2.parseDates = false; 
			categoryAxis2.minPeriod = "mm"; 	//period podataka u sekundama
			categoryAxis2.minorGridEnabled = true;
			categoryAxis2.minorGridAlpha = 0.15;
			categoryAxis2.color = "black";
			categoryAxis2.gridColor = "black";
			categoryAxis2.gridThickness = "3";
			categoryAxis2.labelRotation = 55;
			
			var valueAxis2 = new AmCharts.ValueAxis();
			valueAxis2.gridAlpha = 0;
			valueAxis2.axisAlpha = 1;
			valueAxis2.color = "black";
			valueAxis2.fillColor = "transparent";
			valueAxis2.offset = 0;
			valueAxis2.fillAlpha = 0.4;
			valueAxis2.axisColor = "rgb(69,102,202)";
			chart1.addValueAxis(valueAxis2);
			var chartScrollbar2 = new AmCharts.ChartScrollbar();
			chartScrollbar2.enabled = "false";
			// GRAPH

			var graph = new AmCharts.AmGraph();
			graph.type = "step"; // tip grafa: STEP
			graph.valueField = "value";
			graph.lineColor = "rgb(69,102,202)";
			graph.lineThickness = "3";
			graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]] </span></b>";
			chart1.addGraph(graph);

		  // CURSOR
			var chartCursor = new AmCharts.ChartCursor();
			chartCursor.cursorAlpha = 0;
			chartCursor.cursorPosition = "mouse";
			chartCursor.categoryBalloonDateFormat = "JJ:NN, DD MMMM";
			chart1.addChartCursor(chartCursor);
			chart1.creditsPosition = "bottom-right";
			var chartScrollbar = new AmCharts.ChartScrollbar();
			chart1.addChartScrollbar(chartScrollbar);

			// WRITE
		   chart1.write("chartdiv1");	//lokacija grafa     
	}
	//funkcija za crtanje grafa za LED2
	function createChart2(){
			chart2 = new AmCharts.AmSerialChart();		//objekt koji u sebi sadrži graf
			//Amcharts postavke za stil grafa i prikaz
			chart2.dataProvider = chartData2;		//podaci koje graf koristi (JSON)
			chart2.marginBottom = 50;
			chart2.marginRight = 50;
			chart2.marginLeft = 50;
			chart2.autoMargins = "false";
			
//			chart2.addTitle("LED 2", 18, "black");
			chart2.categoryField = "year";
			chart2.dataDateFormat = "mm";
			var categoryAxis2 = chart2.categoryAxis;
			categoryAxis2.parseDates = false; // as our data is date-based, we set parseDates to true
			categoryAxis2.minPeriod = "mm"; // our data is yearly, so we set minPeriod to YYYY
			categoryAxis2.minorGridEnabled = true;
			categoryAxis2.minorGridAlpha = 0.15;
			categoryAxis2.color = "black";
			categoryAxis2.gridColor = "black";
			categoryAxis2.gridThickness = "3";
			categoryAxis2.labelRotation = 55;
			
			var valueAxis2 = new AmCharts.ValueAxis();
			valueAxis2.gridAlpha = 0;
			valueAxis2.axisAlpha = 1;
			valueAxis2.color = "black";
			valueAxis2.fillColor = "transparent";
			valueAxis2.offset = 0;
			valueAxis2.fillAlpha = 0.4;
			valueAxis2.axisColor = "rgb(69,102,202)";
			chart2.addValueAxis(valueAxis2);
			var chartScrollbar2 = new AmCharts.ChartScrollbar();
			chartScrollbar2.enabled = "false";
			// GRAPH

			var graph = new AmCharts.AmGraph();
			graph.type = "step"; // this line makes step graph
			graph.valueField = "value";
			graph.lineColor = "rgb(69,102,202)";
			graph.lineThickness = "3";
			graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]] </span></b>";
			chart2.addGraph(graph);

			// CURSOR
			var chartCursor = new AmCharts.ChartCursor();
			chartCursor.cursorAlpha = 0;
			chartCursor.cursorPosition = "mouse";
			chartCursor.categoryBalloonDateFormat = "JJ:NN, DD MMMM";
			chart2.addChartCursor(chartCursor);
			chart2.creditsPosition = "bottom-right";
			var chartScrollbar = new AmCharts.ChartScrollbar();
			chart2.addChartScrollbar(chartScrollbar);

			// WRITE
			chart2.write("chartdiv2");	//lokacija grafa
		  
	}
	//funkcija za crtanje grafa za LED3
	function createChart3(){
			chart3 = new AmCharts.AmSerialChart();		//objekt koji u sebi sadrži graf
			//Amcharts postavke za stil grafa i prikaz
			chart3.dataProvider = chartData3;		//podaci koje graf koristi (JSON)
			chart3.marginBottom = 50;
			chart3.marginRight = 50;
			chart3.marginLeft = 50;
			chart3.autoMargins = "false";
			
//			chart3.addTitle("LED 3", 18, "black");
			chart3.categoryField = "year";
			chart3.dataDateFormat = "mm";
			var categoryAxis2 = chart3.categoryAxis;
			categoryAxis2.parseDates = false; // as our data is date-based, we set parseDates to true
			categoryAxis2.minPeriod = "mm"; // our data is yearly, so we set minPeriod to YYYY
			categoryAxis2.minorGridEnabled = true;
			categoryAxis2.minorGridAlpha = 0.15;
			categoryAxis2.color = "black";
			categoryAxis2.gridColor = "black";
			categoryAxis2.gridThickness = "3";
			categoryAxis2.labelRotation = 55;
			
			var valueAxis2 = new AmCharts.ValueAxis();
			valueAxis2.gridAlpha = 0;
			valueAxis2.axisAlpha = 1;
			valueAxis2.color = "black";
			valueAxis2.fillColor = "transparent";
			valueAxis2.offset = 0;
			valueAxis2.fillAlpha = 0.4;
			valueAxis2.axisColor = "rgb(69,102,202)";
			chart3.addValueAxis(valueAxis2);
			var chartScrollbar2 = new AmCharts.ChartScrollbar();
			chartScrollbar2.enabled = "false";
			// GRAPH

			var graph = new AmCharts.AmGraph();
			graph.type = "step"; // this line makes step graph
			graph.valueField = "value";
			graph.lineColor = "rgb(69,102,202)";
			graph.lineThickness = "3";
			graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]] </span></b>";
			chart3.addGraph(graph);

			// CURSOR
			var chartCursor = new AmCharts.ChartCursor();
			chartCursor.cursorAlpha = 0;
			chartCursor.cursorPosition = "mouse";
			chartCursor.categoryBalloonDateFormat = "JJ:NN, DD MMMM";
			chart3.addChartCursor(chartCursor);
			chart3.creditsPosition = "bottom-right";
			var chartScrollbar = new AmCharts.ChartScrollbar();
			chart3.addChartScrollbar(chartScrollbar);

			// WRITE
			chart3.write("chartdiv3");	//lokacija grafa
		  
	}

	function createChart4(){
			chart4 = new AmCharts.AmSerialChart();		//objekt koji u sebi sadrži graf
			//Amcharts postavke za stil grafa i prikaz
			chart4.dataProvider = chartData4;		//podaci koje graf koristi (JSON)
			chart4.marginBottom = 50;
			chart4.marginRight = 50;
			chart4.marginLeft = 50;
			chart4.autoMargins = "false";
			
//			chart4.addTitle("LED 4", 18, "black");
			chart4.categoryField = "year";
			chart4.dataDateFormat = "mm";
			var categoryAxis2 = chart4.categoryAxis;
			categoryAxis2.parseDates = false; // as our data is date-based, we set parseDates to true
			categoryAxis2.minPeriod = "mm"; // our data is yearly, so we set minPeriod to YYYY
			categoryAxis2.minorGridEnabled = true;
			categoryAxis2.minorGridAlpha = 0.15;
			categoryAxis2.color = "black";
			categoryAxis2.gridColor = "black";
			categoryAxis2.gridThickness = "3";
			categoryAxis2.labelRotation = 55;
			
			var valueAxis2 = new AmCharts.ValueAxis();
			valueAxis2.gridAlpha = 0;
			valueAxis2.axisAlpha = 1;
			valueAxis2.color = "black";
			valueAxis2.fillColor = "transparent";
			valueAxis2.offset = 0;
			valueAxis2.fillAlpha = 0.4;
			valueAxis2.axisColor = "rgb(69,102,202)";
			chart4.addValueAxis(valueAxis2);
			var chartScrollbar2 = new AmCharts.ChartScrollbar();
			chartScrollbar2.enabled = "false";
			// GRAPH

			var graph = new AmCharts.AmGraph();
			graph.type = "step"; // this line makes step graph
			graph.valueField = "value";
			graph.lineColor = "rgb(69,102,202)";
			graph.lineThickness = "3";
			graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]] </span></b>";
			chart4.addGraph(graph);



		  // CURSOR
				   var chartCursor = new AmCharts.ChartCursor();
				   chartCursor.cursorAlpha = 0;
				   chartCursor.cursorPosition = "mouse";
				   chartCursor.categoryBalloonDateFormat = "JJ:NN, DD MMMM";
				   chart4.addChartCursor(chartCursor);
					chart4.creditsPosition = "bottom-right";
	var chartScrollbar = new AmCharts.ChartScrollbar();
					chart4.addChartScrollbar(chartScrollbar);

					// WRITE
				   chart4.write("chartdiv4");	//lokacija grafa
		  
	}
				
</script>

</body>
</html>
