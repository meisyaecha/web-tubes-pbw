<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori Gamifikasi</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Portal Perusahaan Gamifikasi Indonesia</a>
        </div>
        <div>
            <?php if (!session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('/login') ?>" class="btn btn-primary me-2">Login</a>
                <a href="<?= base_url('/register') ?>" class="btn btn-secondary">Register</a>
            <?php else: ?>
                <span class="navbar-text me-2">Welcome, <?= session()->get('username') ?></span>
                <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
            <?php endif; ?>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
</nav>

    </nav>

    <section class="hero">
        <div class="container">
            <h1>Platform Direktori Perusahaan Gamifikasi</h1>
            <p>Temukan mitra terbaik untuk proyek gamifikasi Anda di sini!</p>
        </div>
        
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form action="<?= base_url('/companies') ?>" method="get">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari perusahaan..." value="<?= esc($search ?? '') ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Notifikasi Hasil Pencarian -->
        <?php if (isset($search) && $search): ?>
            <p class="text-muted">Hasil pencarian untuk: <strong><?= esc($search) ?></strong></p>
        <?php endif; ?>
        
        <div class="text-center mb-4">
            <a href="<?= base_url('companies/add') ?>" class="btn btn-warning">Tambah Perusahaan</a>
        </div>
    </section>

    <section id="companies" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Daftar Perusahaan</h2>
            <div class="row">
            <?php if ($companies): ?>
                    <?php foreach ($companies as $company): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card company-card">
                                <img src="<?= base_url('images/' . $company['logo']) ?>" class="card-img-top" alt="<?= $company['name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $company['name'] ?></h5>
                                    <p class="card-text"><?= $company['description'] ?></p>
                                    <a href="<?= $company['website'] ?>" target="_blank" class="btn btn-primary">Kunjungi Website</a>
                                    <?php if (session()->get('isLoggedIn')): ?>
                                        <a href="<?= base_url('/companies/edit/' . $company['id']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('/companies/delete/' . $company['id']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Belum ada perusahaan terdaftar.</p>
                <?php endif; ?>
                <div class="d-flex justify-content-center">
                    <?= $pager->links() ?>
                </div>


            </div>
        </div>
    </section>
</body>
</html>
