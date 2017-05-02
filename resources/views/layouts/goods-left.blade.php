
      <div class="goods-list">
        <h4>Наши товары</h4>
        <ul>
          <?php $traverse = function ($nodes, $prefix = null) use (&$traverse, $page) { ?>
            <?php foreach ($nodes as $node) : ?>
              <?php if (Request::is($page->slug.'/'.$node->slug, $page->slug.'/'.$node->slug.'/*')) : ?>
                <li class="active"><a href="/{{ $page->slug.'/'.$node->slug }}">{{ PHP_EOL.$prefix.' '.$node->title }}</a></li>
              <?php else : ?>
                <li><a href="/{{ $page->slug.'/'.$node->slug }}">{{ PHP_EOL.$prefix.' '.$node->title }}</a></li>
              <?php endif; ?>
              <?php $traverse($node->children, $prefix.'&nbsp;&nbsp;'); ?>
            <?php endforeach; ?>
          <?php }; ?>
          <?php $traverse($categories); ?>
        </ul>
      </div>
      <div class="goods-list">
        <h4>Бренды</h4>
        <ul>
          <?php foreach ($companies as $company) : ?>
            <?php if (Request::is($page->slug.'/brand/'.$company->slug, $page->slug.'/brand/'.$company->slug.'/*')) : ?>
              <li class="active"><a href="/{{ $page->slug.'/brand/'.$company->slug }}">{{ $company->title }}</a></li>
            <?php else : ?>
              <li><a href="/{{ $page->slug.'/brand/'.$company->slug }}">{{ $company->title }}</a></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>