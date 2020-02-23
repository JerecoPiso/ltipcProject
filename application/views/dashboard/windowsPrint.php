<?php $ret = $this->dashboard_model->getSpotsToPrint("spots"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    p{
        font-size: 200%;
        text-align: center;
        font-weight: bold;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    thead, tr,  th{
        border: 1px solid rgb(0, 0,0);
    }
    td{
        border: 1px solid rgb(0, 0,0);
        padding: 0.5%;
    }
    .spot-photo{
        min-height: 60px;
        max-height: 60px;
        min-width: 160px;
        display: block;
        margin: auto;
    }
    .btn-print{
        width: 10%;
        padding: 0.8%;
        border: none;
        background-color: rgb(0,200,0);
        color: rgb(255,255,255);
        margin-bottom: 1%;
    }
    @media print{
        .btn-print{
            display: none;
        }
    }
</style>
<body>
    <p>Leyte Cultural Property Inventory/Registry</p>
    <button class="btn-print" onclick="window.print()">Print</button>
    <table cell-spacing="0">
        <thead>
            <tr>
                <th>Multimedia File</th>
                <th>Municipality/City</th>
                <th>Name of Property</th>
                <th>Significance</th>
                <th>Type</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach($ret as $value){?>

             <tr>
                <td><img class="spot-photo" src="<?php echo base_url();?>assets/images/<?= $value->photo ?>">  </td>
                <td><?= $value->municipality ?></td>
                <td><?= $value->name ?></td>
                <td>asdasd</td>
                <td><?= $value->category ?></td>
             
            </tr>


          <?php  } ?>
            
        </tbody>
    </table>

</body>
</html>