<?php
//获取文章元信息
function GetPostMetaData($post) {
    $output = "";
    if (Gate::allows('CheckAdmin')) {
        $output = array(
            'id' => $post['id'],
            'slug' => $post['slug'],
            'title' => $post['title'],
            'created' => $post['created'],
            'modified' => $post['modified'],
            'content' => $post['content'],
            'type' => $post['type'],
            'status' => $post['status'],
            'views' => $post['views'],
            'likes' => $post['likes']
        );
    } else {
        if ($post['status'] == 'publish') {
            $output = array(
                'id' => $post['id'],
                'slug' => $post['slug'],
                'title' => $post['title'],
                'created' => $post['created'],
                'modified' => $post['modified'],
                'content' => $post['content'],
                'type' => $post['type'],
                'status' => $post['status'],
                'views' => $post['views'],
                'likes' => $post['likes']
            );
        }
    };
    return $output;
}
// 生成文章列表
function GetPostsLists($posts) {
    $html = "";
    foreach ($posts['data'] as $post){
        $post = GetPostMetaData($post);
        if ($post != "") {
            $html .= '<div class="card">';
            if (GetPostCover($post['content']) !== ''){
                $html .= '<img src="' . GetPostCover($post['content']) .'" class="card-img-top" alt="cover">';
            }
            $html .= '<div class="card-body">';
            // Title
            $html .= '<h5 class="card-title">';
            if (Gate::allows('CheckAdmin') && url() -> current() != route('home')) {
                $html .= '<a href=' . url("admin/edit" . "?id=" . $post['id']) . '>' . $post['title'];;
            } else {
                $html .= '<a href=' . url("posts" . "/" . $post['slug']) . '>' . $post['title'];;
            }
            $html .= '</a>';
            if ($post['status'] == 'secret') {
                $html .= ' | <i class="fas fa-user-lock"></i>';
            }
            if ($post['status'] == 'unpublish') {
                $html .= ' | <i class="fas fa-pencil-ruler"></i>';
            }
            $html .= '</h5>';
            // Title End
            $html .= '<i class="fas fa-edit" aria-hidden="true"></i>&nbsp;';
            $html .= $post['created'];
            $html .= ' | ';
            $html .= '<i class="fas fa-history" aria-hidden="true"></i>&nbsp;';
            $html .= $post['modified'];
            $html .= '<hr />';

            $preview = mb_substr($post['content'],0,config('blog.SummaryNum'),'utf-8');
            $preview = preg_replace('~<~', "(", $preview);
            $preview = preg_replace('~>~', ")", $preview);
            if ($preview != "") {
                $html .= '<p class="card-text">' . $preview . '</p>';
            }
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</br>';
        }
    }
    //生成新页码
    $html .= '<nav><ul class="justify-content-center pagination">';
    $for_num = -1;
	if ($posts['from'] > 1){
		$html .= '<li class="page-item"><a aria-label="首页" class="page-link" href="' . $posts['first_page_url'] . '"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
	}
    foreach ($posts['links'] as $link) {
        $for_num = $for_num + 1;
        if ($link['url'] !="" && $link['active'] == 1) {
            $html .= '<li class="page-item active"><span class="page-link" style="cursor: default;">' . $link['label'] . '</span></li>';
        } elseif ($link['url'] !="" && $link['active'] == "") {
            if ($for_num == 0){
                $html .= '<li class="page-item"><a class="page-link" href="' . $link['url'] . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
            } elseif ($for_num == $posts['last_page']+1) {
                $html .= '<li class="page-item"><a class="page-link" href="' . $link['url'] . '"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="' . $link['url'] . '">' . $link['label'] . '</a></li>';
            }
        }
    }
    if ($posts['current_page'] < $posts['last_page']){
		$html .= '<li class="page-item"><a aria-label="尾页" class="page-link" href="' . $posts['last_page_url'] . '"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
    }
	$html .= '</ul></nav>';
    return $html;
}
//查找文章默认封面
function GetPostCover($post) {
    $reg_match = '~' . env('APP_URL') . '/storage' . '.*?(jpg|png|jpeg)' . '~';
    preg_match($reg_match, $post, $match);
    if (!empty($match)) {
        return $match[0];  
    } else {
        return '';
    }
}
?>