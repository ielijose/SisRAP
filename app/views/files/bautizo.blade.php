<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <style>
        body{
            font-size: 16px;
            width: 75%;
            margin-right: auto;
            margin-left: auto;
            line-height: 26px;
        }
    </style>

    <style type="text/css" media="print">
        body{
            width: 90%;
        }
    </style>

</head>
<body onload="window.print()">
    <br>
    <br>
    <br>

    <h2 align="center">FE DE BAUTISMO Y NACIMIENTO</h2>
    <br>
    <p style="text-align: justify;">
        <span style="margin-left:1.2cm;"></span>
        Quien suscribe, <strong>Pbro. Lcdo. Jorge Luis Ramírez Rivera</strong>, Párroco de la Iglesia  Ntra. Sra. Del Rosario de Aránzazu, hago constar que en nuestro archivo parroquial se encuentra la fe de bautismo:
        <br>
        Libro N°: <strong>{{ $bautizo->libro }}</strong>   Folio: <strong>{{ $bautizo->folio }}</strong>      Numeral: <strong>{{ $bautizo->numero }}</strong>   Filiación: <strong>{{ $bautizo->filiacion }}</strong>

        <br><br>
        <strong>De:</strong> {{ $bautizo->persona }}<br>
        <strong>Hijo de:</strong> {{ $bautizo->padre or '' }} y {{ $bautizo->madre or '' }}<br>
        <strong>Nació en:</strong> {{ $bautizo->lugar_nacimiento or '' }}   -  <strong>Fecha:</strong> {{ $bautizo->fecha_nacimiento or '' }}<br>
        <strong>Bautizado (a)</strong>, el {{ $bautizo->fecha_bautismo or '' }} En esta parroquia<br>
        <strong>Sus Padrinos:</strong> {{ $bautizo->padrinos or '' }}<br>
        <strong>Ministro:</strong> {{ $bautizo->ministro or '' }}<br>
        <strong>Para fines:</strong> {{ $bautizo->fines or '' }}<br>
        <strong>Nota Marginal:</strong> {{ $bautizo->nota_marginal or '' }}<br>
        <strong>Reg. Civil N°:</strong> {{ $bautizo->registro_civil_numero or '' }} - <strong>Libro:</strong> {{ $bautizo->registro_civil_libro or '' }} - <strong>Año:</strong> {{ $bautizo->registro_civil_ano or '' }}<br>
        <strong>Observaciones: </strong>{{ $bautizo->observaciones or 'Sin Observaciones' }}<br>

    </p>

    <br>
    <br>
    <p align="right"> <strong>Santa Rita, {{ date('d') }} / {{ date('m') }} / {{ date('Y') }}</strong> </p>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <p align="center">

        <span style="border: 0px solid #666;border-top-width: 1px; font-weight: bold; padding: 5px 20px; ">Pbro. Lcdo. Jorge L. Ramírez R.</span>
        <br>
        <strong>Párroco</strong>
    </p>


</body>
</html>