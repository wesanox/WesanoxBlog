<?php
namespace ProcessWire;

$count = 0;
?>
<div id="content" class="template-news">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <nav class="breadcrumbs container my-3" aria-labelledby="breadcrumblist">
                    <ul class="nav d-flex gap-2" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <?php foreach($page->parents() as $item) : $count++; ?>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" class="pe-2" href="<?php echo $item->url; ?>">
                                    <span itemprop="name">
                                        <?php echo $item->title; ?>
                                    </span>
                                </a>>
                                <meta itemprop="position" content="<?php echo $count; ?>">
                            </li>
                        <?php
                        endforeach;

                        // output the current page as the last item
                        $count = $count + 1;
                        ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <link itemprop="item" href="<?php echo $page->url; ?>">
                            <span itemprop="name" aria-current="page">
                                <?php echo $page->title; ?>
                            </span>
                            <meta itemprop="position" content="<?php echo $count; ?>">
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-12 col-lg-8 col-xxl-7">
                <h1><?php echo $page->title; ?></h1>

                <?php echo $modules->get('WesanoxHelperClasses')->renderMatrix('content', $page->matrix_content, 'div'); ?>

                <div class="py-4 d-flex justify-content-end gap-2 btn-template-control">
                    <?php if($page->prev->id != 0) : ?>
                        <a href="<?php echo $page->prev->url; ?>" class="news-template-prev" aria-label="<?php echo $page->prev->title; ?>" title="<?php echo $page->prev->title; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if($page->next->id != 0) : ?>
                        <a href="<?php echo $page->next->url; ?>" class="news-template-next" aria-label="<?php echo $page->next->title; ?>" title="<?php echo $page->next->title; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 offset-lg-0 offset-xxl-2">

            </div>
        </div>

        <?php echo $pages->findOne("template=options_news,status=hidden")->render('matrix_basic'); ?>
    </div>
</div>
