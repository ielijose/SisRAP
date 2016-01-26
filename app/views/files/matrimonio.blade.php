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

    <h2 align="center">CONSTANCIA DE MATRIMONIO ECLESIÁSTICO</h2>
    <br>
    <p style="text-align: justify;">
        <span style="margin-left:1.2cm;"></span>
        Quien suscribe, <strong>Pbro. Lcdo. Jorge Luis Ramírez Rivera</strong>, Párroco de la Iglesia  Ntra. Sra. Del Rosario de Aránzazu, hago constar que en nuestro archivo parroquial se encuentra insertado el Matrimonio Eclesiástico:

        <br>
        <strong>Libro N°:</strong> {{ $matrimonio->libro }},  <strong>Folio:</strong> {{ $matrimonio->folio }},   <strong>Numeral:</strong> {{ $matrimonio->numero }}

        <br>

        <strong>De:</strong> {{ $matrimonio->esposo }}
        <br><strong>Hijo de:</strong> {{ $matrimonio->esposo_padre }} y {{ $matrimonio->esposo_madre }}   <strong>Filiación</strong>: {{ $matrimonio->esposo_filiacion }}
        <br><strong>Nació en:</strong> {{ $matrimonio->esposo_nacido }}  <strong>Estado</strong>: {{ $matrimonio->esposo_estado }}  <strong>Edad</strong>: {{ $matrimonio->esposo_edad }}
        <br><strong>Bautizado en:</strong> {{ $matrimonio->esposo_bautizado }}

        <br><br><strong>Y:</strong> {{ $matrimonio->esposa }}
        <br><strong>Hija de:</strong> {{ $matrimonio->esposa_padre }} y {{ $matrimonio->esposa_madre }}   <strong>Filiación</strong>: {{ $matrimonio->esposa_filiacion }}
        <br><strong>Nació en:</strong> {{ $matrimonio->esposa_nacido }}  <strong>Estado</strong>: {{ $matrimonio->esposa_estado }}  <strong>Edad</strong>: {{ $matrimonio->esposa_edad }}
        <br><strong>Bautizado en:</strong> {{ $matrimonio->esposa_bautizado }}

        <br>
        <strong>Santa Rita Fecha: </strong> {{ $matrimonio->fecha_matrimonio }}. Parroquia Nuestra Señora del Rosario de Aránzazu
        <br><br><strong>Testigos:</strong> {{ $matrimonio->testigo }} y {{ $matrimonio->testigo2 }}
        <br><strong>Ministro:</strong> {{ $matrimonio->ministro }}
        <br><strong>Para fines:</strong> {{ $matrimonio->fines or '' }}<br>
        <strong>Nota Marginal:</strong> {{ $matrimonio->nota_marginal or '' }}<br>
        <strong>Observaciones: </strong>{{ $matrimonio->observaciones or 'Sin Observaciones' }}<br>

    </p>

    <br>
    <p align="right"> <strong>Santa Rita, {{ date('d') }} / {{ date('m') }} / {{ date('Y') }}</strong> </p>

    <br>



    <p align="center">

        <span style="border: 0px solid #666;border-top-width: 1px; font-weight: bold; padding: 5px 20px; ">Pbro. Lcdo. Jorge L. Ramírez R.</span>
        <br>
        <strong>Párroco</strong>
    </p>


</body>
</html>