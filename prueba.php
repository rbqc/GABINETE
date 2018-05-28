<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<div style="color:blue;font-size:18px;">
	<script type="text/javascript">
function sbClock() {
 var DateString=(new Date()).toString();
 self.status=DateString.substring(0,3+DateString.lastIndexOf(':'));
 setTimeout("sbClock()",200);}
 window.onload=function(){sbClock();}
</script>
	</div>

	<script language="JavaScript">
    function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()


    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
    segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
    minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
    hora = "0" + hora


    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible + "hola"

    setTimeout("mueveReloj()",1000)
    }
	</script>

	<script>
	function horaFecha(){
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		var f=new Date();
		document.write(diasSemana[f.getDay()] + " => " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
	}
	</script>

<body onload="horaFecha()" onload=mueveReloj()">
	<?php
		$hora= date ("h:i:s");
		$fecha= date ("j/n/Y");
		echo "La hora es: ".$hora;
		echo "La fecha es: ".$fecha;
	?>

	<div style="float:right;">
<script type="text/javascript">
//<![CDATA[
var  today = new Date();
var m = today.getMonth() + 1;
var mes = (m < 10) ? '0' + m : m;
  document.write('Fecha: '+today.getDate(),'/' +mes,'/'+today.getYear());
//]]>
</script></div>
<script type="text/javascript">
//<![CDATA[
function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write("Hoy es " + day + " de " + months[month] + " del " + year);
//]]>
</script>



</body>
</html>
