PGDMP                     	    z            slf_tabg_pertelaan    10.22    10.22     ?
           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ?
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ?
           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ?            1259    66766    slf    TABLE     z  CREATE TABLE public.slf (
    gid integer NOT NULL,
    no_sk_slf character varying(255),
    tgl_slf date,
    jenis_slf character varying(255),
    nama_bangunan character varying(255),
    no_persetujuan_teknis character varying(255),
    nama_pemohon_slf character varying(255),
    peruntukan character varying(255),
    kelurahan character varying(255),
    kecamatan character varying(255),
    no_imb character varying(255),
    tgl_imb date,
    atas_nama character varying(255),
    nama_pemohon_imb character varying(255),
    alamat_persil_imb character varying(255),
    penggunaan_bangunan character varying(255),
    luas_bangunan character varying(255),
    jumlah_lantai character varying(255),
    file_sk_slf character varying(255),
    file_surat_pernyataan character varying(255),
    file_imb character varying(255),
    file_gambar_as_build character varying(255)
);
    DROP TABLE public.slf;
       public         postgres    false            ?
          0    66766    slf 
   TABLE DATA               S  COPY public.slf (gid, no_sk_slf, tgl_slf, jenis_slf, nama_bangunan, no_persetujuan_teknis, nama_pemohon_slf, peruntukan, kelurahan, kecamatan, no_imb, tgl_imb, atas_nama, nama_pemohon_imb, alamat_persil_imb, penggunaan_bangunan, luas_bangunan, jumlah_lantai, file_sk_slf, file_surat_pernyataan, file_imb, file_gambar_as_build) FROM stdin;
    public       postgres    false    196   	       u
           2606    66773    slf slf_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY public.slf
    ADD CONSTRAINT slf_pkey PRIMARY KEY (gid);
 6   ALTER TABLE ONLY public.slf DROP CONSTRAINT slf_pkey;
       public         postgres    false    196            ?
   ,   x?3?,I-?4202?54?50s?a?????a??
ҹb???? G#?     