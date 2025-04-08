<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"
    ></script>
    <title>Tabel Leads</title>
  </head>
  <body>
    <div class="container mt-5">
    <h3 class="mb-4">Tabel Leads</h3>
    <div class="d-flex justify-content-end mb-3">
      <a href="leads-form.php" class="btn btn-success">+ Tambah Lead Baru</a>
    </div>

    <form method="GET" class="mb-3">
      <div class="col-md-4">
        <select class="form-select" id="produk" name="produk">
          <option value="">-- Pilih Produk --</option>
          <?php
            $queryProduk = "SELECT * FROM produk";
            $resultProduk = $conn->query($queryProduk);
            while ($row = $resultProduk->fetch_assoc()) {
              echo "<option value='{$row['id_produk']}'>{$row['nama_produk']}</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" id="sales" name="sales">
          <option value="">-- Pilih Sales --</option>
          <?php
            $querySales = "SELECT * FROM sales";
            $resultSales = $conn->query($querySales);
            while ($row = $resultSales->fetch_assoc()) {
              echo "<option value='{$row['id_sales']}'>{$row['nama_sales']}</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-md-3">
        <select name="bulan" class="form-select">
          <option value="">Filter bulan ini</option>
          <?php
            for ($m = 1; $m <= 12; $m++) {
              $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $m) ? 'selected' : '';
              echo "<option value='$m' $selected>" . date('F', mktime(0, 0, 0, $m, 1)) . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-md-1">
        <button class="btn btn-primary w-100" type="submit">Cari</button>
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>ID Input</th>
            <th>Tanggal</th>
            <th>Sales</th>
            <th>Produk</th>
            <th>Nama Leads</th>
            <th>No Wa</th>
            <th>Kota</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            $query = "
              SELECT l.id_leads, l.tanggal, s.nama_sales, p.nama_produk, l.nama_lead, l.no_wa, l.kota
              FROM leads l
              JOIN sales s ON l.id_sales = s.id_sales
              JOIN produk p ON l.id_produk = p.id_produk
              ORDER BY l.id_leads DESC
            ";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['id_leads']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['nama_sales']}</td>
                        <td>{$row['nama_produk']}</td>
                        <td>{$row['nama_lead']}</td>
                        <td>{$row['no_wa']}</td>
                        <td>{$row['kota']}</td>
                      </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='8' class='text-center'>No Data</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>
