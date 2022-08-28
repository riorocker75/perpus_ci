<?php

$config=array(
    'diterima' => array(
        array(
            'field' => 'surat_id',
            'label' => 'Surat Id wajib ada',
            'rules' => 'required'
        ),
        array(
            'field' => 'no_surat',
            'label' => 'Nomor surat Wajib ada!!',
            'rules' => 'required'
        )
    ),
    'ditolak' => array(
            'field' => 'ket_surat',
            'label' => 'Keterangan diisi dengan alasan mengapa menolak permohonan',
            'rules' => 'required'
    )
);