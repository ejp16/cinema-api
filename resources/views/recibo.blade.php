<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<h1>Meraki Ticket</h1>
<h2>Pelicula: {{ $pelicula->titulo }}</h2>
<h3>Reservacion N-{{ $reservacion->id }}</h3>
<h3>Asientos: {{ $reservacion->asiento }}</h3>
<h3>Hora de la funcion: {{ $hora }}</h3>
<h3>Fecha de la funcion: {{ $fecha }}</h3>
<h3>Tipo de sala: {{ $tipo_sala}}</h3>
<h3>Sucursal: {{ $sucursal }}</h3>
<h3>Costo del boleto: {{ $reservacion->total }}</h3>

<h3>Nombre del cliente: {{ $info->nombre }} -- Cedula {{ $info->cedula }}</h3>

