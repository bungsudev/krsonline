<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($mahasiswa as  $item):
        echo "<tr>
                <td>{$item->nim}</td>
                <td>{$item->namamhs}</td>
                <td>{$item->alamat}</td>
                <td>{$item->telepon}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");