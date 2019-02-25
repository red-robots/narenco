<?php
//generate_sitemap($menuName='top-menu',$pageWithCats=null,$orderByNavi=null)
$pageWithCats[] = array(
            'id'=>40,
            'taxonomy'=>'project_categories'
        );
$links = generate_sitemap('Main Menu',null);
if($links) { ?>
    <div class="page-link-list">
        <ul class="linklist">
        <?php foreach($links as $a) {
            $parent_id = $a['parent_id'];
            $parent_title = $a['parent_title'];
            $parent_url = $a['parent_url'];
            $children  = ( isset($a['children']) ) ? $a['children'] : '';
            $categories  = ( isset($a['categories']) ) ? $a['categories'] : '';
            if($parent_title!=='Sitemap') {  ?>
            <li>
                <a class="parentlink"  href="<?php echo $parent_url; ?>"><?php echo $parent_title;?></a>
                <?php if($children) { ?>
                <ul class="children-links">
                    <?php foreach($children as $c) { ?>
                    <li>
                        <a class="childlink"  href="<?php echo $c['url']; ?>"><?php echo $c['title']; ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if($categories) { ?>
                <ul class="children-links">
                    <?php foreach($categories as $cat) { 
                    $term_link = get_term_link($cat->term_id); ?>
                    <li>
                        <a class="childlink cat" href="<?php echo $term_link; ?>"><?php echo $cat->name; ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </li>
            <?php } ?>
        <?php } ?>
        </ul>    
    </div>
<?php } ?>