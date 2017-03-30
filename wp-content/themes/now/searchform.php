<form role="search" method="get" id="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="search-form">
    	<span id="search-form-close">&times;</span>
        <input placeholder="Search for" type="text" value="<?php get_search_query();?>" name="s" id="search-input-s" />
        <input type="submit" class="webFont" id="searchsubmit" value="<?php esc_attr__('Search');?>" />
    </div>
</form>