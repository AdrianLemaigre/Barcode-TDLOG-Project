<div class="Ticket Result">
    <h2><?php echo $name; ?>
    <div class="Subtitle">(Barcode : <?php echo $barcode; ?>)</div></h2>
    <div class="Ticket">
        <h3>Description : </h3>
        <br>
        <div><?php echo $description; ?></div>
    </div>
    <div class="Ticket">
        <h3>Data : </h3>
        <br>
        <div><?php echo $data; ?></div>
    </div>

    <table class="Table">
        <tr>
            <td width="50%" align="center"><span class="Bold">Price</span> : <?php echo $price; ?></td>
            <td width="50%" align="center"><span class="Bold">Number of articles left</span> : <?php echo $disponibility; ?></td>
        </tr>
    </table>
</div>
