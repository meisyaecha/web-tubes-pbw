<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perusahaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">Edit Perusahaan</h2>
        <form action="<?= base_url('/companies/update/' . $company['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= esc($company['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($company['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" class="form-control" id="website" name="website" value="<?= esc($company['website']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo Perusahaan</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti logo.</small>
            </div>
            <input type="hidden" name="existing_logo" value="<?= esc($company['logo']) ?>">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
