/*==============================================================*/
/* Table: PENGGUNA                                              */
/*==============================================================*/
create table PENGGUNA 
(
   ID_PENGGUNA          char(36)                       not null,
   NAMA_PENGGUNA        varchar(50),
   TELEPON_PENGGUNA     varchar(15),
   EMAIL_PENGGUNA       varchar(50),
   SANDI_PENGGUNA       varchar(30),
   constraint PK_PENGGUNA primary key (ID_PENGGUNA)
);

/*==============================================================*/
/* Index: PENGGUNA_PK                                           */
/*==============================================================*/
create unique index PENGGUNA_PK on PENGGUNA (
ID_PENGGUNA ASC
);

