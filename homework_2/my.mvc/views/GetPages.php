<div>
    <list>
        <p>list of pages:</p>
        <?php 
            foreach ($contents as $page) { 
            $link = '\page\\' . $page['id'];
        ?>
        <li> <a href=" <?php echo $link; ?>"> <?php  echo $page['title']?> </a> </li>;
        <?
            }
        ?>
    </list>
</div>
