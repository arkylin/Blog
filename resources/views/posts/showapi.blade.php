<?php 
// header('Content-Disposition =>  attachment; filename=' . $post->title . '.md');
header('Content-Type: Application/Json');
echo json_encode($post);
?>