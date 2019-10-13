<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>運費計算</title>
</head>
<body>
<form action="/ShippingFee/Action.php" method="post">
    <fieldset>
        <legend>商品資訊</legend>
        <table style="width: 100%;">
            <tr>
                <td>
                    重量
                </td>
                <td>
                    <input name="weight" id="productWeight" type="number" step="0.01"
                           value="<?php echo isset($_GET['weight']) ? $_GET['weight'] : ''; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>
                    長
                </td>
                <td>
                    <input name="length" id="productLength" type="number" step="0.01"
                           value="<?php echo isset($_GET['length']) ? $_GET['length'] : ''; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>
                    寬
                </td>
                <td>
                    <input name="width" id="productWidth" type="number" step="0.01"
                           value="<?php echo isset($_GET['width']) ? $_GET['width'] : ''; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>
                    高
                </td>
                <td>
                    <input name="height" id="productHeight" type="number" step="0.01"
                           value="<?php echo isset($_GET['height']) ? $_GET['height'] : ''; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>
                    物流商
                </td>
                <td>
                    <select name="shippingCompanyId">
                        <option value="1">黑貓</option>
                        <option value="2">新竹貨運</option>
                        <option value="3">郵局</option>
                    </select>
                </td>
            </tr>
        </table>
        <input name="submit" type="submit" value="計算運費">
    </fieldset>
</form>
<div>
    <fieldset>
        <legend>結果</legend>
        物流商：
        <span id="companyNam"> <?php echo $_GET['name']; ?></span>
        <br/>
        運費：
        <span id="fee"><?php echo $_GET['fee']; ?></span>
    </fieldset>
</div>
</body>
</html>