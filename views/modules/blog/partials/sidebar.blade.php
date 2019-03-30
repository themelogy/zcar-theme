<div class="sidebar-right">
    @blogCategories(20, 'sidebar.categories')
    @blogLatestPosts(3, 'sidebar.latest-posts')
    @isset($post)
        @blogTags($post, 10, 'sidebar.tags')
    @endisset
    @isset($posts)
        @blogTags($posts, 2, 'sidebar.tags')
    @endisset
</div>
