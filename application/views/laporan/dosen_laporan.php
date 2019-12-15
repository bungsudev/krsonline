<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID Dosen</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($dosen as  $item):
        echo "<tr>
                <td>{$item->iddosen}</td>
                <td>{$item->nama}</td>
                <td>{$item->alamat}</td>
                <td>{$item->telepon}</td>
                <td>{$item->email}</td>
                <td>{$item->password}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");