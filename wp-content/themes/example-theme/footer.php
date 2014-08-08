</main>

<footer class="large-12 columns">
    <div class="row">
        <div class="large-12 columns">
            <p class='copyright'>
                <?php bloginfo('name') ?> &copy;<?php echo date('Y'); ?>. 
                <span class="license">All rights reserved.</span>
            </p>
            <?php if(WP_DEBUG === true && is_user_logged_in()): ?>
                <p><?php echo get_num_queries(); ?> queries in <?php timer_stop(1,3); ?> seconds.</p>
            <?php endif; ?>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
	
<script>
	jQuery(document).foundation();
</script>

</body>
</html>