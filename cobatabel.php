<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive DataTable</title>
    <!-- Link CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.3/css/responsive.dataTables.min.css">
    <!-- Link jQuery dan JS DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.3/js/dataTables.responsive.min.js"></script>
</head>

<body>

    <h1>Responsive Table with DataTables</h1>

    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Jl. Sudirman No.2</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Alice Brown</td>
                <td>alice@example.com</td>
                <td>Jl. Diponegoro No.3</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Jl. Merdeka No.1</td>
            </tr>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            scrollX: true
        });
    });
    </script>

</body>

</html>