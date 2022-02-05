<div>
    <p>list of pages:</p>
    <ul>
        <?php 
            foreach ($data['query'] as $page) :
            $link = '\page\\' . $page['id'];
        ?>
        <li> 
            <a href=" <?php echo $link; ?>"> <?php  echo $page['title']?> </a> 
        </li>
        <?php
            endforeach;
        ?>
    </ul>
</div>
