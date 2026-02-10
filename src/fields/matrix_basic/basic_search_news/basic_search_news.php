<?php
namespace ProcessWire;

$limit = ($page->int_value) ? ', limit=' . $page->int_value : '';

$options_news = wire()->pages->get('template=options_news');

$news_pages_view = wire()->pages->find('template=template_news,sort=date_news' . $limit);

$news_pages = wire()->pages->find('template=template_news,sort=date_news');

if (count($news_pages) != 0) : ?>
    <div class="container">
        <div>
            <div class="d-flex justify-content-center mb-2">
                <?php if ($options_news->repeater_categories_news) : ?>
                    <div class="col-lg-3 offset-lg-3 p-3">
                        <label for="dropdown-category" class="visually-hidden">Newskategorie auswählen</label>
                        <select class="btn btn-primary rounded-0 dropdown-toggle w-100 px-0" name="dropdown-category" id="dropdown-category" data-toggle="dropdown" aria-expanded="false">
                            <option value="">Newskategorie auswählen</option>
                            <?php foreach ($options_news->repeater_categories_news as $category) : ?>
                                <option value="<?php echo $category->headline; ?>"><?php echo $category->headline; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <?php if ($options_news->repeater_subcategories_news->count() != 0) : ?>
                    <div class="col-lg-3 p-3">
                        <label for="dropdown-subcategory" class="visually-hidden">Newsunterkategorie auswählen</label>
                        <select class="btn btn-primary rounded-0 dropdown-toggle w-100 px-0" name="dropdown-subcategory" id="dropdown-subcategory" data-toggle="dropdown" aria-expanded="false">
                            <option value="">Newsunterkategorie auswählen</option>
                            <?php foreach ($options_news->repeater_subcategories_news as $subcategory) : ?>
                                <option value="<?php echo $subcategory->headline; ?>"><?php echo $subcategory->headline; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
            <div class="position-relative">
                <div id="loading" class="position-absolute">
                    <div class="loader"></div>
                </div>
                <div id="show-news" class="row">
                    <?php foreach ($news_pages_view as $news) : ?>
                        <div class="col-md-6 col-lg-4 p-3">
                            <a class="text-black h-100" href="<?php echo $news->url; ?>"
                               aria-label="Jetzt mehr erfahren über - <?php echo $news->title; ?>">
                                <div class="border h-100 p-3">
                                    <div class="fs-3 fw-normal py-2">
                                        <?php echo $news->title; ?>
                                    </div>
                                    <small><?php echo $news->date_news; ?><?php echo ($news->dynamic_categories_news) ? ' | ' . $news->dynamic_categories_news[0] : ''; ?></small>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if (count($news_pages) > $page->int_value) : ?>
                <div class="d-flex justify-content-center mt-3">
                    <div>
                        <div id="show-more-news" class="btn btn-primary" value="<?php echo $page->int_value; ?>" data-limit="<?php echo $page->int_value; ?>">
                            mehr anzeigen
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif;