<div>
    <p>list of products:</p>
    <ul>
        <?php 
            foreach ($data['query'] as $product) :
            $link = '\products\\' . $product['id'];
        ?>
        <li> <a href=" <?php echo $link; ?>"> <?php  echo $product['product_name']?> </a> </li>
        <?php
            endforeach;
        ?>
    </ul>
</div>