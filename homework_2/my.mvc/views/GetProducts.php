<div>
    <list>
        <p>list of products:</p>
        <?php 
            foreach ($contents as $product) { 
            $link = '\products\\' . $product['id'];
        ?>
        <li> <a href=" <?php echo $link; ?>"> <?php  echo $product['product_name']?> </a> </li>;
        <?
            }
        ?>
    </list>
</div>