<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID matakuliah</th>
            <th>Nama</th>
            <th>Sks</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($dosen as  $item):
        echo "<tr>
                <td>{$item->idmatakuliah}</td>
                <td>{$item->namamk}</td>
                <td>{$item->sks}</td>
                <td>{$item->semester}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");