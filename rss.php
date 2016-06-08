<?php include "/includes/db.php";

header("Content-Type: application/xml; charset=UTF-8");

echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>" ."\n";

?>
<rss version="2.0">
	<channel>
	     <title>Colegiul National "Andrei Saguna"</title>
	     <link>http://"linkuletz"</link>
	     <description>Insert Descriere</description>
	     <language>ro</language>
	     <?php 
        $query = "SELECT * FROM posts ORDER BY post_date DESC ";
        $select_all_query = mysqli_query($connection,$query);

        if(!$select_all_query){
           	die("QUERY FAILED ".mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_all_query) ) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'] ,0,100);
            $post_tags = $row['post_tags'];
            echo "{$post_title}";
        ?>
		<item>
			<title><?php echo $post_title; ?></title>
			<link><?php echo "http://localhost:8080/techz/admin/post.php?p_id={$post_id}"; ?></link>
			<pubDate><?php echo $post_date; ?></pubDate>
			<description><?php echo $post_content;?></description>
			<language>ro</language>
		</item>		
        <?php } ?>
	</channel>
</rss>