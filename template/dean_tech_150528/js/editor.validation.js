/**
 * Created by ran on 14-7-22.
 */
yii.validation.editor = function (attribute, value, messages, options) {
    var id = $(attribute.input).parents('form').attr('id');
    if (hasEditor(id)) {
        var UEContainer = UE.getEditor(id);
        var value = UEContainer.getContentTxt();
    }
    var valid = false;
    if (options.requiredValue === undefined) {
        var isString = typeof value == 'string' || value instanceof String;
        if (options.strict && value !== undefined || !options.strict && !this.isEmpty(isString ? $.trim(value) : value)) {
            valid = true;
        }
    } else if (!options.strict && value == options.requiredValue || options.strict && value === options.requiredValue) {
        valid = true;
    }
    if (!valid) {
        this.addMessage(messages, options.message, value);
    }
}
function hasEditor(id) {
    var valid = false;
    $.each(UE.instants, function (index, obj) {
        if (obj.key == id) {
            valid = true;
            return true;
        }
    });
    return valid;
}
