<aside class="main-sidebar">
  <?php if (is_active_sidebar('custom-sidebar')): ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar('custom-sidebar'); ?>
    </div>
  <?php endif; ?>
</aside>