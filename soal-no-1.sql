CREATE TABLE produk (
    id_produk INT NOT NULL,
    nama_produk VARCHAR(32) NOT NULL,
    PRIMARY KEY (id_produk)
);

CREATE TABLE sales (
    id_sales INT NOT NULL,
    nama_sales VARCHAR(32) NOT NULL,
    PRIMARY KEY (id_sale)
);

CREATE TABLE leads (
    id_leads INT NOT NULL AUTO_INCREMENT,
    tanggal DATE,
    id_sales INT NOT NULL,
    id_produk INT NOT NULL,
    no_wa VARCHAR(16),
    nama_lead VARCHAR(64),
    kota VARCHAR(32),
    id_user INT,
    PRIMARY KEY (id_leads),
    FOREIGN KEY (id_sales) REFERENCES sales(id_sales),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

INSERT INTO produk (id_produk, nama_produk) VALUES (1, 'Cipta Residence 2');
INSERT INTO produk (id_produk, nama_produk) VALUES (2, 'The Rich');
INSERT INTO produk (id_produk, nama_produk) VALUES (3, 'Namorambe City');
INSERT INTO produk (id_produk, nama_produk) VALUES (4, 'Grand Banten');
INSERT INTO produk (id_produk, nama_produk) VALUES (5, 'Turi Mansion');
INSERT INTO produk (id_produk, nama_produk) VALUES (6, 'Cipta Residence 1');

INSERT INTO sales (id_sales, nama_sales) VALUES (1, 'sales 1');
INSERT INTO sales (id_sales, nama_sales) VALUES (2, 'sales 2');
INSERT INTO sales (id_sales, nama_sales) VALUES (3, 'sales 3');