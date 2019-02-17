<h3><a href="<?php echo site_url('news/create'); ?>"> create</a> </h3>

<?php foreach ($news as $news_item) { ?>
    <h1><a href="<?php echo site_url('news/'.$news_item['slug']); ?>"> <?php echo $news_item['title']; ?></a> </h1>
    <p><?php echo $news_item['text']; ?> </p>
    <h3><a href="<?php echo site_url('news/update/'.$news_item['id']); ?>"> edit</a> </h3>
    <h3><a href="<?php echo site_url('news/delete/'.$news_item['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" > delete</a> </h3>
    
    
<?php } ?>