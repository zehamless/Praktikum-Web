# Praktikum Web
## Mahez Pradana-2015061070
---
## Penjelasan 
Sistem Gudang yaitu sistem yang berfungsi untuk melakukan tambah, edit, dan hapus barang. Sistem ini juga dilengkapi dengan API untuk mendapatkan JSON.

---
## Cara menjalankan di localhost
1. Memiliki local webserver
2. Mengunduh folder code
3. Ketakkan folder code didalam folder htdocs
4. Masuk ke phpmyadmin, buat database "apilog" dan import file sql
5. jalankan index.php dengan code editor/live server

---
## Desain database
| Nama | Jenis | Ekstra |
| ------ | ------ | ------ |
| Id(pk) | bigInt(20) | Auto increment |
| nama_barang | varchar(256) |
| jumlah | int(11) | 
| tanggal_masuk | date | 
| kode_barang | varchar(256) |

---
# [ApiDocs]
[ApiDocs]: <https://documenter.getpostman.com/view/23923810/2s8YstUE7Z>
