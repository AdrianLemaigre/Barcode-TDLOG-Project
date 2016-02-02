<div>
    <h3>L'article recherché n'a pas été trouvé.</h3>
    <div>Merci de remplir le formulaire suivant.</div>

    <form action="<?php echo base_url('Upload/upload_article'); ?>" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="name" required maxlength="100"></td>
            </tr>
            <tr>
                <td>Barcode</td>
                <td>:</td>
                <td><input type="text" name="barcode" value="<?php echo $code; ?>" pattern="^([0-9]{13})$" required></td>
                <td>It must contain 13 digits</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td>Data</td>
                <td>:</td>
                <td><input type="text" name="data"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type="number" name="price" required></td>
            </tr>
            <tr>
                <td>Disponibility</td>
                <td>:</td>
                <td><input type="number" name="disponibility" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Upload article..."></td>
            </tr>
        </table>
    </form>
</div>
