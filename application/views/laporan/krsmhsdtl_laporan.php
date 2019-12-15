<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <!-- <th>Nim</th> -->
            <th>Nim</th>
            <th>Nama</th>
            <th>Kode MK</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
    <?php

    // function konvsemester($hasil)
    // {
    //     $hasil = "";
    //     switch ($hasil) {
    //         case "1": echo "I"; break;
    //         case "2": echo "II"; break;
    //         case "3": echo "III"; break;
    //         case "4": echo "IV"; break;
    //         case "5": echo "V"; break;
    //         case "6": echo "VI"; break;
    //         case "7": echo "VII"; break;
    //         case "8": echo "VIII"; break;
    //     }
    // }
    foreach($krsmhsdtl as  $item):
        echo "<tr>
                <td>{$item->nim}</td>
                <td>{$item->namamhs}</td>
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