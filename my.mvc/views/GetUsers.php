<div>
    <list>
        <p>list of users:</p>
        <?php 
            foreach ($contents as $user) { 
            $link = '\users\\' . $user['id'];
        ?>
        <li> <a href=" <?php echo $link; ?>"> <?php  echo $user['name']?> </a> </li>;
        <?
            }
        ?>
    </list>
</div>