<?php
namespace ProcessWire;

$limit = ($page->int_value) ? ', limit=' . $page->int_value : '';

$category_string = '';
$category = '';
$subcategory_string = '';
$subcategory = '';

$category_key = 0;
$subcategory_key = 0;

if ($page->dynamic_categories_news) {
    foreach ($page->dynamic_categories_news as $string) {
        if ($category_key == 0) {
            $category_string .= $string;
        }

        if (count($page->dynamic_categories_news) > 1 && $category_key > 0) {
            $category_string .= '|' . $string;
        }

        $category_key++;
    }

    $category = ', dynamic_categories_news=' . $category_string;
}

if ($page->dynamic_subcategories_news) {
    foreach ($page->dynamic_subcategories_news as $string) {
        if ($subcategory_key == 0) {
            $subcategory_string .= $string;
        }

        if (count($page->dynamic_subcategories_news) > 1 && $subcategory_key > 0) {
            $subcategory_string .= '|' . $string;
        }

        $subcategory_key++;
    }

    $subcategory = ', dynamic_subcategories_news=' . $subcategory_string;
}

$news_pages_view = wire()->pages->find('template=template_news,sort=date_news' . $limit . $category . $subcategory);

$news_pages = wire()->pages->find('template=template_news,sort=date_news');

if (count($news_pages_view) != 0) : ?>
    <div class="container">
        <?php if (!$page->checkbox_slider_option) : ?>
            <div>
                <div class="position-relative">
                    <div id="loading-teaser" class="position-absolute">
                        <div class="loader"></div>
                    </div>
                    <div id="show-news-teaser" class="row">
                        <?php foreach ($news_pages_view as $news) : ?>
                                <?php wire()->include('basic_teaser_news/config/render_teaser_news_box.php'); ?>
                        <?php endforeach; ?>
                    </div>

                    <?php if ( count($news_pages) > $page->int_value ) : ?>
                        <div class="d-flex justify-content-center mt-3">
                            <div>
                                <div id="show-more-news-teaser" class="btn btn-primary" value="<?php echo $page->int_value; ?>" data-limit="<?php echo $page->int_value; ?>" data-category="<?php echo $category_string; ?>" data-subcategory="<?php echo $subcategory_string; ?>">
                                    mehr anzeigen
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="swiper basic_teaser_career_swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($news_pages_view as $news) : ?>
                        <a class="swiper-slide text-black border p-4" href="<?php echo $news->url; ?>" aria-label="Jetzt mehr erfahren über - <?php echo $news->title; ?>">
                            <div class="fs-3 fw-normal py-2">
                                <?php echo $news->title; ?>
                            </div>
                            <small><?php echo $news->date_news; ?> | <?php echo $news->dynamic_categories_news[0]; ?></small>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination-career d-block text-center mt-5"></div>
            </div>
        <?php endif; ?>
    </div>
<?php else : ?>
    <div class="h2 text-center">Keine passenden News mit den vorgegebenen Parametern gefunden</div>
<?php endif;