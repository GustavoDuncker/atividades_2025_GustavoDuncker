<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $um_numero = floatval ($_POST['um_numero']);
    if($um_numero>0)
        echo 'Positivo<br>';
    if($um_numero<0)
        echo 'Negativo<br>';
    if($um_numero==0)
        echo 'Neutro<br>';
    }
 
?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="um_numero">Digite o valor do um numero:</label>
                        </td>
                        <td>
                            <input name="um_numero" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" rowspan="1">
                            <input value="Processo" type="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

</body>
</html>