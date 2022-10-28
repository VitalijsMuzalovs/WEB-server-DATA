<section class="popular-products">
  <div class="container">
    <h2 class="visually-hidden">Популярные товары</h2>
    <ul class="products-list">
      <?php foreach($random_ids as $id): ?>
        <li>
          <a class="product-card" href="product.php?product_id=<?= $id ?>">
            <h3><?= get_product_title($id)?></h3>
            <div class="product-options">
              <span class="price"><?= get_product_price($id) ?></span>
            </div>
            <img src="<?= get_img_url($id) ?>" width="156" height="120" alt="<?= get_product_title($id) ?>">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
