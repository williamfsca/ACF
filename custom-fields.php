<?php
// ... código existente ...

    public function init() {
        $this->registerPostType();
        
        // Adicionar suporte para taxonomias
        add_action('category_add_form_fields', [$this, 'addCategoryFields']);
        add_action('category_edit_form_fields', [$this, 'editCategoryFields']);
        add_action('created_category', [$this, 'saveCategoryFields']);
        add_action('edited_category', [$this, 'saveCategoryFields']);
    }

    public function addCategoryFields() {
        $field_groups = $this->getFieldGroups();
        foreach ($field_groups as $group) {
            $fields = $this->getFieldsForGroup($group->ID);
            include plugin_dir_path(__FILE__) . 'views/category-fields.php';
        }
    }

    public function editCategoryFields($term) {
        $field_groups = $this->getFieldGroups();
        foreach ($field_groups as $group) {
            $fields = $this->getFieldsForGroup($group->ID);
            include plugin_dir_path(__FILE__) . 'views/category-fields-edit.php';
        }
    }

    public function saveCategoryFields($term_id) {
        $field_groups = $this->getFieldGroups();
        foreach ($field_groups as $group) {
            $fields = $this->getFieldsForGroup($group->ID);
            foreach ($fields as $field) {
                if (isset($_POST[$field['name']])) {
                    update_term_meta(
                        $term_id,
                        $field['name'],
                        sanitize_text_field($_POST[$field['name']])
                    );
                }
            }
        }
    }

// ... resto do código existente ...