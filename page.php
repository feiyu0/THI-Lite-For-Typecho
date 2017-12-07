<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>
<div class="post">
    <div class="grid grid-fluid">
        <?php 
            $fields = unserialize ($this->___fields ());
            if (!empty($fields['thumb'])) {
                $postImageRET = Content::randomThumb ($this->fields->thumb);
            } else {
                $postImage = THI::randomBanner($this->options->banner);
            }
            if (is_array($postImageRET)) {
                $postImage = 'style="background-image:url(' . $postImageRET['img'] . ');background-position: ' . $postImageRET['position'] . ';"';
            } else {
                $postImage = 'style="background-image:url(' . $postImageRET . ')"';
            }
        ?>
        <div class="siteHeaderBG" <?php echo $postImage ?>></div>
    </div>
    <div class="">
        <div class="">
            <div id="post-<?php $this->cid(); ?>">
                <nav class="postNav detail animated fadeIn noselect">
                    <div class="postNavInner animated fadeInDown">
                        <h2><?php $this->title(); ?></h2>
                        <div class="menu">
                            <ul class="menu-items" id="toc"></ul>
                        </div>
                        <div class="header-cta"><a class="btn-factory-link is-right" href="#postComment">Comment</a></div>
                    </div>
                </nav>
                <div class="postBody" id="postBody">
                    <div id="postContent">
                        <section class="chapterSpecs material detail">
                            <div class="postContent" id="postContent">
                                <?php $this->content(); ?>
                            </div>
                        </section>
                    </div>
                    <section class="chapterSpecs material detail postCommentDom">
                        <div class="postContent" id="postComment">
                            <?php $this->need('component/comments.php'); ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('component/footer.php'); ?>
