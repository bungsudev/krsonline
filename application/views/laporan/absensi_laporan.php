<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Pertemuan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($absensi as  $item):
        echo "<tr>
                <td>{$item->nim}</td>
                <td>{$item->nama}</td>
                <td>{$item->matakuliah}</td>
                <td>{$item->pertemuan}</td>
                <td>{$item->status}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");