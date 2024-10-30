jQuery(document).ready(function($) {
    let fieldCount = 0;

    $('.add-field').on('click', function() {
        const fieldHtml = `
            <div class="field-row" data-field="${fieldCount}">
                <h3>Field ${fieldCount + 1}</h3>
                <p>
                    <label>Label</label>
                    <input type="text" name="fields[${fieldCount}][label]" required>
                </p>
                <p>
                    <label>Name</label>
                    <input type="text" name="fields[${fieldCount}][name]" required>
                </p>
                <p>
                    <label>Type</label>
                    <select name="fields[${fieldCount}][type]">
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="select">Select</option>
                        <option value="number">Number</option>
                        <option value="email">Email</option>
                    </select>
                </p>
                <button type="button" class="button remove-field">Remove Field</button>
            </div>
        `;

        $('.fields-list').append(fieldHtml);
        fieldCount++;
    });

    $(document).on('click', '.remove-field', function() {
        $(this).closest('.field-row').remove();
    });
});