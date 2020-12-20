<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">

</head>

<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <h1><?= $judul; ?></h1>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-3 col-md-6 col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <p class="card-title">Masukkan jumlah data yang ingin ditambahkan!</p>
                                <input type="number" max="5" name="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-req">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">

            <div class="col-lg-12">

                <form action="<?= base_url('home/save_dataset'); ?>" method="post">

                    <div class="row">

                        <input type="hidden" class="jml-req" name="jmlReq" value="<?= $jmlReq; ?>">

                        <?php for ($i = 1; $i <= $jmlReq; $i++) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card card-data">
                                    <div class="card-header badge-success">
                                        <h1>Data - <?= $i; ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="umur">Umur</label>
                                            <select name="umur<?= $i; ?>" id="umur" class="form-control" required>
                                                <option value="1">
                                                    <= 30 Tahun </option> <option value="2"> 31 - 40 Tahun
                                                </option>
                                                <option value="3"> > 40 Tahun </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendapatan">Pendapatan</label>
                                            <select name="pendapatan<?= $i; ?>" id="pendapatan" class="form-control" required>
                                                <option value="1">Rendah</option>
                                                <option value="2">Menengah</option>
                                                <option value="3">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pelajar">Pelajar ?</label>
                                            <select name="pelajar<?= $i; ?>" id="pelajar" class="form-control" required>
                                                <option value="1">Bukan</option>
                                                <option value="2">Ya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <select name="rating<?= $i; ?>" id="rating" class="form-control" required>
                                                <option value="1">Baik</option>
                                                <option value="2">Luar Biasa</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="beli">Beli Komputer ?</label>
                                            <select name="beli<?= $i; ?>" id="beli" class="form-control" required>
                                                <option value="1">Tidak Beli</option>
                                                <option value="2">Beli</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group btn-submit">
                <button type="submit" name="tambah_dataset" class="btn btn-primary btn-block mb-4">Simpan</button>
            </div>
        </div>
        </form>
    </div>

    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            var jmlReq = $('.jml-req').val();

            if (jmlReq > 0) {
                $('.card-data').css('display', 'inline');
                $('.btn-submit').css('display', 'inline');
            }

        })
    </script>

</body>

</html>