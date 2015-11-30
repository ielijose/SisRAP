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

    <h2 align="center">CONSTANCIA DE COMUNIÓN</h2>
    <br>
    <p style="text-align: justify;">
        <span style="margin-left:1.2cm;"></span>
        Quien suscribe, <strong>Pbro. Lcdo. Jorge Luis Ramírez Rivera</strong>, Párroco de la Iglesia  Ntra. Sra. Del Rosario de Aránzazu,
        hago constar que: <strong>{{ $comunion->persona }}</strong>, recibió el sacramento de la comunión en esta parroquia el {{ $comunion->fecha }}, sacramento administrado por <strong>{{ $comunion->ministro }}</strong>
        <br>


    <br>
        <strong>Para fines:</strong> {{ $comunion->fines or '' }}<br>
        <strong>Nota Marginal:</strong> {{ $comunion->nota_marginal or '' }}<br>
        <strong>Observaciones: </strong>{{ $comunion->observaciones or 'Sin Observaciones' }}<br>

    </p>

    <br>
    <br>
    <p align="right"> <strong>Santa Rita, {{ date('d') }} / {{ date('m') }} / {{ date('Y') }}</strong> </p>

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