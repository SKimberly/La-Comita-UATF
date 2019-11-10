<!DOCTYPE html>
<html>
<head>
    <title>Ventas-{{ $pedido->updated_at->format('M d') }}</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <meta name="description" content="Sistema de información bajo plataforma web para el control de ventas, pedidos y cotizaciones para la fabrica de ropa Sport La Comita de la ciudad de Potosí">
    <meta name="author" content="Univ. Silvana Kimberly Marquina Chambi">
    <meta name="keyword" content="Sistema web Sport La Comita">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <link href="{{ asset('css/pdfventas.css') }}" rel="stylesheet">

</head>

<body>
    <header class="clearfix">
        <div class="container">
            <figure>
            </figure>
            <div class="company-info">
                <h2 class="title" style="text-align:  right;"><img width="150px;" src="{{ asset('/img/logo1.png') }}" alt="">
                </h2>
                <span>Calle Oruro Nro. 184</span>
                <span class="line"></span>
                <a class="phone" >70462939</a>
                <span class="line"></span>
                <a class="email" href="http://lacomita.vue/#contacto">sport.lacomita19@gmail.com</a>
            </div>
        </div>
    </header>

    <section>
        <div class="details clearfix">
            <div class="client left">
                <p class="name">DATOS DEL CLIENTE:</p>
                <p>Nombre: {{ $carrito->user->fullname }}</p>
                <p>
                    Cédula de identidad: {{ $carrito->user->cedula }},<br>
                    Celular: {{ $carrito->user->telefono }}<br>
                </p>
                <a >{{ $carrito->user->email }}</a>
            </div>
            <div class="data right">
                <div class="title">Recibo Electrónico</div>
                <div class="date">
                    Fecha de compra: {{ $pedido->updated_at->format('M d') }}<br>
                    Fecha de impresión: {{ $fecha }}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="table-wrapper">
                <table>
                    <tbody class="head">
                        <tr>
                            <th class="no"></th>
                            <th class="qty"><div>Nombre</div></th>
                            <th class="qty"><div>Tallas</div></th>
                            <th class="qty"><div>Cantidad</div></th>
                            <th class="unit"><div>Precio U.</div></th>
                            <th class="total"><div>Total</div></th>
                        </tr>
                    </tbody>
                    <tbody class="body">
                            <?php $total = 0; $subtotal= 0;?>

use Milon\Barcode\DNS2D;
                            @foreach($carrito->detalles as $key => $detalle)
                            <tr>
                                <td class="no">{{ ++$key }}</td>
                                <td class="desc">{{ $detalle->producto->nombre }}</td>
                                <td class="qty">
                                  @foreach($detalle->tallas as $talla)
                                    {{ $talla->nombre }} /
                                  @endforeach
                                </td>
                                <td class="qty">{{ $detalle->cantidad }}</td>
                                <td class="unit">{{ $detalle->producto->precio }} Bs.</td>
                                <?php $subtotal = $detalle->cantidad*$detalle->producto->precio; ?>
                                <td class="total">{{ $subtotal }} Bs.</td>
                                <?php $total = $total+$subtotal; ?>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="no-break">
                <table class="grand-total">
                    <tbody>
                        <tr>
                            <td class="no"></td>
                            <td class="desc"></td>
                            <td class="qty"></td>
                            <td class="unit">TOTAL BS.:</td>
                            <td class="total">{{ $total }}</td>
                        </tr>
                        <tr>
                            <td class="no"></td>
                            <td class="desc"></td>
                            <td class="qty"></td>
                            <td class="unit">Anticipo:</td>
                            <td class="total">{{ $pedido->anticipo }}</td>
                        </tr>
                        <tr>
                            <td class="grand-total" colspan="5"><div><span>TOTAL PAGADO:</span> {{ $pedido->anticipo+$pedido->pago }} BS.</div></td>
                        </tr>
                        <tr >
                            <div  style="padding-left: 50px;">
                            {!! DNS2D::getBarcodeHTML($carrito->codigo, "QRCODE",5,5,"black", true) !!}
                            <p>Scanee el código</p>
                            </div>
                        </tr>
                    </tbody>
                </table>
                <footer>
                    <div class="container">
                        <div class="thanks">Gracias por su compra!</div>
                        <div class="notice">
                            <div>IMPORTANTE:</div>
                            <div>Aproveche nuestras ofertas en nuestra página web www.sportlacomita.net</div>
                        </div>
                        <div class="end">SPORT LA COMITA - POTOSÍ - {{ date('Y')  }}</div>
                    </div>
                </footer>
            </div>
        </div>
    </section>

</body>

</html>


