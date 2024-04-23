<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice Kasirku</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
        }

        #logo img {}

        #company {
            float: left;
            text-align: left;
            margin-top: 5px;
            margin-left: 10px;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #06283D;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #06283D;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }


        table th,
        table td {
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #06283D;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
            text-align: center;
        }

        table .total {
            background: #06283D;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #06283D;
            font-size: 1.4em;
            border-top: 1px solid #06283D;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #06283D;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">{{ @$penjualan->Pembeli . ' ' . @$penjualan->pelanggan->NamaPelanggan }}</h2>
            </div>
            <div id="invoice">
                <h1>INVOICE</h1>
                <div class="date">Tanggal : {{ tanggal_indo($penjualan->TanggalPenjualan) }}</div>
                <div class="date">Metode Pembayaran : Cash</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;">
            <thead>
                <tr>
                    <th class="desc">NO</th>
                    <th class="desc" width="50%">INFO PRODUK</th>
                    <th class="unit">HARGA SATUAN</th>
                    <th class="qty">JUMLAH</th>
                    <th class="total">TOTAL HARGA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailPenjualan as $item)
                    @php
                        $no = 1;
                    @endphp
                    <tr>
                        <td class="desc">
                            <h3>{{ $no++ }}</h3>
                        </td>
                        <td class="desc">
                            <h3>{{ ucfirst($item->produk->NamaProduk) }}</h3>
                        </td>
                        <td class="unit">Rp {{ number_format($item->produk->Harga, 0, ',', '.') }}</td>
                        <td class="qty">{{ $item->JumlahProduk }}x</td>
                        <td class="total">Rp {{ number_format($item->Subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot style="margin-top: 20px;">
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TOTAL TAGIHAN</td>
                    <td>Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Terima Kasih!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo veritatis, unde ratione
                dolorum non temporibus, nulla quas sapiente fugit qui doloribus recusandae quidem quisquam ipsum
                voluptatem rerum minus eveniet?</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
