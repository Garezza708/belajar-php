create DATABASE fakultas;

create Table Jurusan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    Kode CHAR(4) NOT NULL,
    Nama VARCHAR(50) NOT NULL
);

insert into jurusan (kode, nama) values("A123", "Sistem Informasi");
insert into jurusan (kode, nama) values("A124", "Teknik Informatika");
insert into jurusan (kode, nama) values("A125", "Informatika");
update jurusan set Nama = "test update" where id = 2;
delete jurusan where id = 3


create Table Mahasiswa (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_Jurusan INTEGER not NULL,
    NIM CHAR(12) not NULL,
    Nama VARCHAR(50) not NULL,
    jenis_kelamin enum('Laki-Laki', 'Perempuan') not NULL,
    tempat_lahir VARCHAR(50) not NULL,
    tanggal_lahir date Not Null,
    alamat VARCHAR(50) Not Null,
    foreign key (id_Jurusan) References Jurusan(id)
);

insert into mahasiswa (id_Jurusan, NIM, Nama, Jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) values ("1", "202410101131", "Moch. Dwi Rizky", "Laki-Laki", "jember", "20001-04-23", "Perum. Tegal Besar Permai 1 Blok F/8");