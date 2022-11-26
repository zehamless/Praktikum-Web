<?php
function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/PWAAPI/api/main.php/barangs");
$data = json_decode($data, TRUE);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webassets/css/Nunito.css">
    <link rel="stylesheet" href="/webassets/fonts/fontawesome-all.min.css">
    <link rel="manifest" href="/manifest.json">
    <title>Gudang Barang</title>

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="/index.php">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Gudang</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href="/index.php"><i class="fas fa-tachometer-alt"></i><span>Barang</span></a></li>
            </ul>
        </div>
    </nav>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1"></li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Data Barang</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <a class="btn btn-outline-success" href="/web/create.php"> Tambah Barang</a>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                 aria-describedby="dataTable_info">
                                <table class="table table-striped" id="dataTable">
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama barang</th>
                                        <th>Jumlah barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th width="280px">Action</th>
                                    </tr>

                                    <?php
                                    error_reporting(0);
                                    foreach ($data as $brg ) {
                                        foreach ($brg as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['kode_barang']; ?></td>
                                                <td><?php echo $value['nama_barang']; ?></td>
                                                <td><?php echo $value['jumlah']; ?></td>
                                                <td><?php echo $value['tanggal_masuk']; ?></td>
                                                <td>
                                                    <a class="btn btn-outline-primary" href="/web/edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                                                    <form action="/api/main.php/delete/<?php echo $value['id']; ?>" method="post">
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                    
                                                    <!-- make delete button using function process_delete -->
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                    ?>
                                    <tfoot>
                                    <tr>
                                        <td><strong>Kode Barang</strong></td>
                                        <td><strong>Nama Barang</strong></td>
                                        <td><strong>Jumlah Barang</strong></td>
                                        <td><strong>Tanggal Masuk</strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/webassets/bootstrap/js/bootstrap.min.js"></script>
<script src="/webassets/js/app.js"></script>
</body>
</html>