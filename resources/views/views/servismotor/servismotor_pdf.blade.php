<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <title>Data Servis Motor</title>
</head>

<body>
    <div class="text-center card-header">
        <h3>SISTEM INFORMASI BENGKEL</h3>
        <h4>Struk Servis Motor</h4>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Pelanggan</th>
            <th>Mekanik</th>
            <th>Sparepart</th>
            <th>Qty</th>
            <th>Harga Sparepart</th>
            <th>Harga Jasa</th>
            <th>Total Bayar</th>
            <th>Tanggal</th>
        </tr>
        @foreach($servis_motor as $sm)
        <tr>
            <td>{{ $sm->id }}</td>
            <td>{{ $sm->pelanggan->nama }}</td>
            <td>{{ $sm->mekanik->nama }}</td>
            <td>{{ $sm->sparepart->sparepart }}</td>
            <td>{{ $sm->qty}}</td>
            <td>{{ $sm->harga_sparepart }}</td>
            <td>{{ $sm->harga_jasa }}</td>
            <td>{{ $sm->total_bayar }}</td>
            <td>{{ $sm->tanggal}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
