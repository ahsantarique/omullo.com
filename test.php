<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<script language="JavaScript">
<!--
function euroConverter(){
document.converter.dollar.value = document.converter.euro.value * 1.470
document.converter.pound.value = document.converter.euro.value * 0.717
document.converter.yen.value = document.converter.euro.value * 165.192
}
function dollarConverter(){
document.converter.euro.value = document.converter.dollar.value * 0.680
document.converter.pound.value = document.converter.dollar.value * 0.488
document.converter.yen.value = document.converter.dollar.value * 112.36
}
function poundConverter(){
document.converter.dollar.value = document.converter.pound.value * 2.049
document.converter.euro.value = document.converter.pound.value * 1.394
document.converter.yen.value = document.converter.pound.value * 230.27
}
function yenConverter(){
document.converter.dollar.value = document.converter.yen.value * 0.0089
document.converter.pound.value = document.converter.yen.value * 0.00434
document.converter.euro.value = document.converter.yen.value * 0.00605
}
//-->
</script>
</head>

<body>

<form name="converter">
<table border="0">
<tr>
<td>Euro: </td><td><input type="text" name="euro" onChange="euroConverter()" /></td>
</tr>
<tr>
<td>US Dollar: </td><td><input type="text" name="dollar" onChange="dollarConverter()" /></td>
</tr>
<tr>
<td>British Pound:</td><td><input type="text" name="pound" onChange="poundConverter()" /></td>
</tr>
<tr>
<td>Japanese Yen: </td><td><input type="text" name="yen" onChange="yenConverter()" /></td>
</tr>
</table>
</form>


</body>

</html>