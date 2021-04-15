<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <style>
        
        #addproducttext {
            max-width: 700px;
            padding-top: 40px;
            padding-left: 15px;
            padding-right: 15px;
            text-align: center;
            margin: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

    </style>
</head>



<body>

    <div id="addproducttext">
        <form action="addproduct_verification.php" method="post">
            <h1>Add a Product</h1>
            <label style=" padding:5px" id="ItemID">Item Name: </label><input type="text" id="ItemID" name="ItemID" /><br/>
            <label style=" padding:5px" id="Quantity">Quantity: </label><input type="Quantity" id="Quantity" name="Quantity" /><br/>
			<label style=" padding:5px" id="ItemPrice">Item Price: </label><input type="number" min="0" max="999999" id="ItemPrice" name="ItemPrice" />
            <div style="text-align:center; padding:5px;" id="Confirm">
                <input type="submit" name="AddProduct" value="Confirm">
            </div>
        </form>
    </div>
</body>

</html>