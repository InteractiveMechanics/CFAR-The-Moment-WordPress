<div id="sidebar">
<?php
    if ($post->post_parent) {
        $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
        $titlenamer = get_the_title($post->post_parent);
    } else {
        $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
        $titlenamer = get_the_title($post->ID);
    }
    if ($children) { 
?>
    <ul class="sidebar-menu">
        <li><?php echo $titlenamer; ?></li>
        <?php echo $children; ?>
    </ul>
<?php } ?>

<div id="twitter-feed" class="hidden-xs"></div>

<script src="<?php echo get_template_directory_uri(); ?>/js/twitter-fetcher.js"></script>
<script type="text/javascript"> 
    twitterFetcher.fetch('431562288693121024', 'twitter-feed', 3, true, true, true, '', false, handleTweets, false);

    function handleTweets(tweets){
        var x = tweets.length;
        var n = 0;
        var container = document.getElementById('twitter-feed');
        var pager = '';

        var html = '<div class="tweets tab-content">';
        while(n < x) {
            if (n == 0){
                html += '<div class="tweet-wrapper tab-pane fade active in" id="tweet-' + n + '">' + tweets[n] + '</div>';
                pager += '<li class="active"><a href="#tweet-' + n + '" data-toggle="tab">' + n + '</a></li>';
            } else {
                html += '<div class="tweet-wrapper tab-pane fade" id="tweet-' + n + '">' + tweets[n] + '</div>';
                pager += '<li><a href="#tweet-' + n + '" data-toggle="tab">' + n + '</a></li>';
            }
            n++;
        }
        html += '</div>';
        html += '<ul class="tweet-pager nav nav-pills">' + pager + '</ul>';
        html += '<div class="tweet-bird"><i class="icon-twitter"></i></div>';
        container.innerHTML = html;
    }
</script>
</div>