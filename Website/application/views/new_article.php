<form action="<?php echo base_url('Upload/upload_article'); ?>" method="post" class="Ticket">
    <table class="Table">
        <tr>
            <td width="25%">Name</td>
            <td width="25%"><input type="text" name="name" required maxlength="100" size="24%"></td>

            <td width="25%">Barcode</td>
            <td width="25%"><input type="text" name="barcode" value="<?php echo $code; ?>" pattern="^([0-9]{13})$" required placeholder="13 digits" size="24%"></td>
        </tr>
        <tr>
            <td width="25%">Description</td>
        </tr>
        <tr>
            <td colspan="4"><textarea name="description" class="Textbox"></textarea></td>
        </tr>
        <tr class="Blank_Row">
            <td colspan="4"></td>
        </tr>
        <tr>
            <td width="25%">Data</td>
        </tr>
        <tr>
            <td colspan="4"><textarea name="data" class="Textbox"></textarea></td>
        </tr>
        <tr class="Blank_Row">
            <td colspan="4"></td>
        </tr>
        <tr>
            <td width="25%">Price</td>
            <td width="25%"><input type="number" name="price" required size="24%"></td>

            <td width="25%">Disponibility</td>
            <td width="25%"><input type="number" name="disponibility" required size="24%"></td>
        </tr>
        <tr class="Blank_Row">
            <td colspan="4"></td>
        </tr>
        <tr>
            <td width="25%"></td>
            <td width="25%"></td>
            <td width="25%"></td>
            <td width="25%" align="right"><input type="submit" value="Upload article..."></td>
        </tr>
    </table>
</form>
