<!-- iitem-social-sharing.php -->
<style>
	.social-buttons {
		margin-left: -2rem;
	}
	.social-buttons a { margin-top: 1rem; }
</style>
    <div class="social-buttons">
        <a class="btn btn-sm btn-outline-primary" href="http://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>&via=krisnelson&related=krisnelson">
          <svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>
          <span class="sr-only">Twitter</span>
        </a>
        <a class="btn btn-sm btn-outline-primary" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&p[title]=<?php echo urlencode( get_the_title() ); ?>">
          <svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg>
          <span class="sr-only">Facebook</span>
        </a>
    </div>