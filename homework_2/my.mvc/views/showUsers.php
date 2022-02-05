<div>
    <p>list of users:</p>
    <ul>
        <?php 
            foreach ($data['query'] as $user) : 
            $link = '\users\\' . $user['id'];
        ?>
        <li> <a href=" <?php echo $link; ?>"> <?php  echo $user['name']?> </a> </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>