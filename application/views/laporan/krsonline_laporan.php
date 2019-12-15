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
            <th>Kelas</th>
            <th>Semester</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php

    function konvsemester($hasil)
    {
        $hasil = "";
        switch ($hasil) {
            case "1": echo "I"; break;
            case "2": echo "II"; break;
            case "3": echo "III"; break;
            case "4": echo "IV"; break;
            case "5": echo "V"; break;
            case "6": echo "VI"; break;
            case "7": echo "VII"; break;
            case "8": echo "VIII"; break;
        }
    }
    foreach($krsonline as  $item):
        echo "<tr>
                <td>{$item->nim}</td>
                <td>{$item->namamhs}</td>
                <td>{$item->kelas}</td>
                <td>{$item->semester}</td>
                <td>{$item->status}</td>
            </tr>";
        
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");