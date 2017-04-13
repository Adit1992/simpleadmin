/*==============================================================*/
/* Table: KOTA                                                  */
/*==============================================================*/
create table KOTA 
(
   ID_KOTA              char(5)                        not null,
   ID_PROVINSI          char(3),
   NAMA_KOTA            varchar(50),
   constraint PK_KOTA primary key (ID_KOTA)
);

/*==============================================================*/
/* Index: KOTA_PK                                               */
/*==============================================================*/
create unique index KOTA_PK on KOTA (
ID_KOTA ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_1_FK on KOTA (
ID_PROVINSI ASC
);

/*==============================================================*/
/* Table: PENGGUNA                                              */
/*==============================================================*/
create table PENGGUNA 
(
   ID_PENGGUNA          char(36)                       not null,
   NAMA_PENGGUNA        varchar(50),
   USER_PENGGUNA        varchar(30),
   LAHIR_PENGGUNA       date,
   ALAMAT_PENGGUNA      varchar(80),
   KOTA_PENGGUNA        varchar(20),
   TELEPON_PENGGUNA     varchar(15),
   EMAIL_PENGGUNA       varchar(50),
   SANDI_PENGGUNA       varchar(30),
   FOTO_PENGGUNA        varchar(50),
   constraint PK_PENGGUNA primary key (ID_PENGGUNA)
);

/*==============================================================*/
/* Index: PENGGUNA_PK                                           */
/*==============================================================*/
create unique index PENGGUNA_PK on PENGGUNA (
ID_PENGGUNA ASC
);

/*==============================================================*/
/* Table: PENJUALAN                                             */
/*==============================================================*/
create table PENJUALAN 
(
   ID_PENJUALAN         char(36)                       not null,
   USER_PENJUALAN       varchar(30),
   PERUSAHAAN_PENJUALAN varchar(50),
   TIPE_PENJUALAN       varchar(10),
   PRODUK_PENJUALAN     varchar(50),
   HARGA_PENJUALAN      integer,
   constraint PK_PENJUALAN primary key (ID_PENJUALAN)
);

/*==============================================================*/
/* Index: PENJUALAN_PK                                          */
/*==============================================================*/
create unique index PENJUALAN_PK on PENJUALAN (
ID_PENJUALAN ASC
);

/*==============================================================*/
/* Table: PERUSAHAAN                                            */
/*==============================================================*/
create table PERUSAHAAN 
(
   ID_PERUSAHAAN        varchar(36)                    not null,
   NAMA_PERUSAHAAN      varchar(50),
   ALAMAT_PERUSAHAAN    varchar(80),
   KOTA_PERUSAHAAN      varchar(20),
   TELEPON_PERUSAHAAN   varchar(15),
   EMAIL_PERUSAHAAN     varchar(50),
   BADAN_PERUSAHAAN     varchar(5),
   PEMILIK_PERUSAHAAN   varchar(30),
   PRODUK_PERUSAHAAN    varchar(50),
   LOGO_PERUSAHAAN      varchar(50),
   constraint PK_PERUSAHAAN primary key (ID_PERUSAHAAN)
);

/*==============================================================*/
/* Index: PERUSAHAAN_PK                                         */
/*==============================================================*/
create unique index PERUSAHAAN_PK on PERUSAHAAN (
ID_PERUSAHAAN ASC
);

/*==============================================================*/
/* Table: PROVINSI                                              */
/*==============================================================*/
create table PROVINSI 
(
   ID_PROVINSI          char(3)                        not null,
   NAMA_PROVINSI        varchar(50),
   constraint PK_PROVINSI primary key (ID_PROVINSI)
);

/*==============================================================*/
/* Index: PROVINSI_PK                                           */
/*==============================================================*/
create unique index PROVINSI_PK on PROVINSI (
ID_PROVINSI ASC
);

alter table KOTA
   add constraint FK_KOTA_RELATIONS_PROVINSI foreign key (ID_PROVINSI)
      references PROVINSI (ID_PROVINSI)
      on update restrict
      on delete restrict;