# 18213008-18213041
Halo!
Jadi repositori ini dibuat untuk menyimpan tugas mata kuliah II3160 - Pemrograman Integratif

Sampai pada tanggal 16 September 2015, kami telah membuat dua versi socket client-server programming menggunakan dua bahasa yang berbeda yaitu java dan python. Jadi pada program dalam bahasa python, server hanya bisa menghandle satu client dalam satu waktu, akan tetapi client lain yang ingin membuat koneksi dapat menunggu sampai client sebelumnya memutuskan hubungan dengan server

Pada saat koneksi pertama, server memeriksa file-file berekstensi .txt pada direktori Text dan mengirimkan nama-nama tersebut kepada client. Kemudian, client dapat mengirimkan request berupa angka yang merepresentasikan nama file tersebut. Apabila input salah maka server akan mengirimkan pesan kesalahan. Apabila terdapat file yang bersangkutan, maka server akan membaca file tersebut dan mencetak isinya pada terminal client.

Pada tanggal 17 September 2015, kami telah membuat versi ketiga dari program client-server yang memungkinkan server mengirim file berekstensi .txt kepada folder milik client.

Tanggal 29 September 2015, kami telah membuat program WebpagesDownloader.java yang mampu mendownload webpage yang dituju kemudian menampilkan seluruh hyperlink yang terdapat pada laman tersebut dan mendownload seluruh webpage yang dituju hyperlink yang ada di laman itu. Kami menggunakan library jsoup-1.8.3.jar yang dapat diperoleh secara gratis. Library ini digunakan untuk melakukan parser html. Untuk mengkompilasi file ini pada cmd prmpt gunakan instruksi 'javac -classpath "directoryjsoup-1.8.3.jar" WebpagesDownloader.java' dan untuk menjalankan gunakan instruksi 'java -classpath "directoryjsoup-1.8.3.jar" WebpagesDownloader'.

Sekian, terimakasih!

Notes: Maaf Pak Baskara, kami tidak pakai bahasa Inggris. Kami juga sudah membuat program server-client dimana banyak client dapat mengirim data, karena koneksi dibuat hanya ketika mengirimkan saja dan dilakukan untuk setiap line data. Apabila perlu untuk dimasukkan ke dalam repositori dan ada komentar yang ingin disampaikan mohon dikirim ke email salah satu anggota kelompok kami nicolosinapitupulu@gmail.com Terimakasih Bapak!
