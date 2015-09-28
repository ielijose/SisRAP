<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Papayote Cotiza</h2>

		<div>
            El (La) Sr(a) <strong>{{ strtoupper($cotizacion->name) }}</strong> cotizó <strong>{{ $cotizacion->tour->nombre }}</strong> para <strong>{{ $cotizacion->count }}</strong> personas.
            <br>
Valor Cotización: <strong>{{ number_format($cotizacion->price, 2) }}</strong>

            <hr>
            <strong>Mensaje: </strong> {{ $cotizacion->message }}
		</div>

	</body>
</html>
