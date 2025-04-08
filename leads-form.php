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
    <title>Leads Form</title>
  </head>
  <body>
    <div class="container mt-5">
      <a href="index.php" class="btn btn-secondary mb-4">&larr; Kembali</a>
      <h3 class="mb-4">Form Leads</h3>
      <form action="simpan.php" method="POST">
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input
            type="date"
            class="form-control"
            id="tanggal"
            name="tanggal"
            required
          />
        </div>
        <div class="mb-3">
          <label for="sales" class="form-label">Sales</label>
          <select class="form-select" id="sales" name="sales" required>
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
        <div class="mb-3">
          <label for="namaLead" class="form-label">Nama Lead</label>
          <input
            type="text"
            class="form-control"
            id="namaLead"
            name="namaLead"
            placeholder="Nama Lead"
            required
          />
        </div>
        <div class="mb-3">
          <label for="produk" class="form-label">Produk</label>
          <select class="form-select" id="produk" name="produk" required>
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
        <div class="mb-3">
          <label for="whatsapp" class="form-label">No. WhatsApp</label>
          <input
            type="text"
            class="form-control"
            id="whatsapp"
            name="whatsapp"
            placeholder="No. WhatsApp"
            required
          />
        </div>
        <div class="mb-3">
          <label for="kota" class="form-label">Kota</label>
          <input
            type="text"
            class="form-control"
            id="kota"
            name="kota"
            placeholder="Asal Kota"
            required
          />
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
    </div>
  </body>
</html>
