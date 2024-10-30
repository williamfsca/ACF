<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">
    <h1>Add New Field Group</h1>

    <form method="post" action="">
        <?php wp_nonce_field('save_field_group', 'field_group_nonce'); ?>
        
        <div class="field-group-settings">
            <div class="field-group-title">
                <label for="field-group-title">Field Group Title</label>
                <input type="text" id="field-group-title" name="title" required>
            </div>

            <div class="field-group-location">
                <h2>Location</h2>
                <label>Show this field group if:</label>
                <select name="post_types[]" multiple>
                    <?php
                    $post_types = get_post_types(['public' => true], 'objects');
                    foreach ($post_types as $post_type) :
                    ?>
                        <option value="<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html($post_type->label); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="fields-container">
                <h2>Fields</h2>
                <div class="fields-list"></div>
                <button type="button" class="button add-field">Add Field</button>
            </div>
        </div>

        <div class="submit-container">
            <input type="submit" class="button button-primary" value="Save Field Group">
        </div>
    </form>
</div>