<?php
$Start = $_POST['Start'];
$Stop = $_POST['Stop'];
$Perkalian = $_POST['Perkalian'];
$Total_Perkalian = 0;
$Total_Perjumlah = 2;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AKUMULASI PERKALIAN</title>
    </head>
    <body>
        <form method="POST">
            <table>
                <tr>
                    <td>Input Bilangan Awal</td>
                    <td>=</td>
                    <td><input name="Start" type="text" value="<?php echo $Start; ?>"/></td>
                </tr>
                <tr>
                    <td>Input Bilangan Akhir</td>
                    <td>=</td>
                    <td><input name="Stop" type="text" value="<?php echo $Stop; ?>"/></td>
                </tr>
                <tr>
                    <td>Input Bilangan Pengali (Yang Akan Dikalikan)</td>
                    <td>=</td>
                    <td><input name="Perkalian" type="text" value="<?php echo $Perkalian; ?>"/></td>
                </tr>
                <tr>
                    <td><input name="submit" type="submit" value="SUBMIT"/></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        while ($Start <= $Stop) {
                            echo $Start . " x " . $Perkalian." = ";
                            echo $Total_Perkalian = $Start * $Perkalian."<br/>";
                            $Start++;
                            $Total_Perjumlah = $Total_Perjumlah + $Total_Perkalian;
                        }
                            echo "========+<br/>". $Total_Perjumlah;
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>