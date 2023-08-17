<?php
require_once'../../model/dbconn.php';
$sql="SELECT * FROM users.inventory WHERE category='men'";
$all_product=$conn->query($sql);

?>



<html>
<head>
<style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }
        </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.add-to-cart').click(function (e) {
                e.preventDefault();

                var name = $(this).data('name');
                var price = $(this).data('price');

                $.ajax({
                    type: 'POST',
                    url: '../../controller/Product/addToCart.php',
                    data: { name: name, price: price },
                    success: function (response) {
                        alert(response); // You can customize this alert
                    }
                });
            });
        });
    </script>
</head>
<body>
   





    <?php
    while($row = mysqli_fetch_assoc($all_product))
    {
        

        ?>
        
        <div class="card">
            <form action="productDetails.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row["Price"]; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="product_category" value="<?php echo $row["category"]; ?>">
                <button type="submit" class="product-image-button">
                    <img src="../../data/product/<?php echo $row["image"];?>"  alt=""></a>
                </button>
            </form>
        <p class="product-name"><?php echo $row["name"];?></p>
        <p class="product-price"><?php echo $row["Price"];?></p>
        <button class="add-to-cart" data-name="<?php echo $row["name"]; ?>" data-price="<?php echo $row["Price"]; ?>">Add To Cart</button>
        </div>
      
       
    
     <?php

    }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productImageButtons = document.querySelectorAll(".product-image-button");
            productImageButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    this.querySelector("form").submit();
                });
            });
        });
    </script>
    </body>
</html>

