<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="custom-fields-meta-box">
    <?php foreach ($fields as $field) : ?>
        <div class="custom-field">
            <label for="<?php echo esc_attr($field['name']); ?>">
                <?php echo esc_html($field['label']); ?>
            </label>

            <?php
            $value = get_post_meta($post->ID, $field['name'], true);
            switch ($field['type']) :
                case 'text':
                    ?>
                    <input type="text"
                           id="<?php echo esc_attr($field['name']); ?>"
                           name="<?php echo esc_attr($field['name']); ?>"
                           value="<?php echo esc_attr($value); ?>">
                    <?php
                    break;

                case 'textarea':
                    ?>
                    <textarea id="<?php echo esc_attr($field['name']); ?>"
                              name="<?php echo esc_attr($field['name']); ?>"><?php echo esc_textarea($value); ?></textarea>
                    <?php
                    break;

                case 'select':
                    ?>
                    <select id="<?php echo esc_attr($field['name']); ?>"
                            name="<?php echo esc_attr($field['name']); ?>">
                        <?php foreach ($field['options'] as $option) : ?>
                            <option value="<?php echo esc_attr($option['value']); ?>"
                                    <?php selected($value, $option['value']); ?>>
                                <?php echo esc_html($option['label']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php
                    break;
            endswitch;
            ?>
        </div>
    <?php endforeach; ?>
</div>