<?php

require 'config.php';
if(isset($_POST['action'])){
    $sql = "SELECT * FROM laptopok WHERE Márka !=''";


        if(isset($_POST['Márka'])){
            $Márka= implode("','", $_POST['Márka']); 
            $sql .="AND Márka IN('".$Márka."')";
        }

        $result = $conn->query($sql);
        $output='';


        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $output .='<div class="col-md-3 mbb-2">
                                                    <div class="cars-deck">
                                                        <div class="card border-secondary">
                                                            <img src="'.= $image_path ?>" class="card-img-top">
                                                            <div class="card-img-overlay">
                                                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1 "><?= $row['Név'].'></h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title text-danger">Ár : <?= number_format($row['Ár']); ?>/-</h4>
                                                                <p>
                                                                    RAM : <?= $row['RAM_mérete']; ?> Gb<br>
                                                                    Processzor : <?= $row['Processzor']; ?><br>
                                                                    Merevlemez_mérete : <?= $row['Merevlemez_mérete']; ?><br>
                                                                </p>
                                                                <a href="#" class="btn btn-success btn-block">Kosárba</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
            }
        }
    }

?>