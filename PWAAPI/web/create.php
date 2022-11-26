
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webassets/css/Nunito.css">
    <link rel="stylesheet" href="/webassets/fonts/fontawesome-all.min.css">
    <title>Gudang Barang</title>

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
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
                <p class="text-primary m-0 fw-bold">Tambah Barang</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/api/main.php/tambah" method="POST" enctype="multipart/form-data">
                    <div class="p-5">
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Kode Barang:</strong>
                                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Nama barang:</strong>
                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Jumlah:</strong>
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Tanggal Masuk</strong>
                                <input type="date" name="tanggal_masuk" class="form-control"
                                       placeholder="Tanggal masuk" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        <a class="btn btn-secondary" href="/index.php"> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

<script src="/webassets/bootstrap/js/bootstrap.min.js"></script>
</script>
</body>
</html>