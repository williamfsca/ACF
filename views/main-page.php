<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Custom Fields</h1>
    <a href="<?php echo admin_url('admin.php?page=custom-fields-new'); ?>" class="page-title-action">Add New</a>

    <hr class="wp-header-end">

    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>Field Group</th>
                <th>Post Types</th>
                <th>Fields</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $field_groups = get_posts([
                'post_type' => 'custom_field_group',
                'posts_per_page' => -1,
            ]);

            foreach ($field_groups as $group) :
                $post_types = get_post_meta($group->ID, '_post_types', true);
                $fields = get_post_meta($group->ID, '_fields', true);
            ?>
                <tr>
                    <td>
                        <strong>
                            <a href="<?php echo get_edit_post_link($group->ID); ?>">
                                <?php echo esc_html($group->post_title); ?>
                            </a>
                        </strong>
                    </td>
                    <td><?php echo esc_html(implode(', ', $post_types ?: [])); ?></td>
                    <td><?php echo count($fields ?: []); ?> fields</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>