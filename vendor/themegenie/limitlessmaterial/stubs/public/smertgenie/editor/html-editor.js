const selectFormGroup = ({
    target: element
}) => {
    document.querySelector('#editor').querySelector('.editable-area')?.classList.remove('editable-area');
    element.classList.add('table-success');
    element.classList.add('editable-group');
    const editables = element.querySelectorAll("[class*='editable-']");
    let inputs = ``;
    for (const [key, editable] of Object.entries(editables)) {
        if (editable.classList.contains('editable-text')) inputs += editableTextField();
        else if (editable.classList.contains('editable-input')) inputs += editableInputField();
        else if (editable.classList.contains('editable-select')) inputs += editableSelectField();
        else if (editable.classList.contains('editable-radio')) inputs += blankTr();
        else if (editable.classList.contains('editable-checkbox')) inputs += blankTr();
    }
    // inputs += ;

    // labelInput.removeAttribute('disabled');
    // formTextInput.removeAttribute('disabled');
    // labelInput.value 	= label?.innerText ?? '';
    // formTextInput.value = formText != null ? formText.innerText : '';

    // formElementValue(editor);
}

const editableTextField = () => `<div class="form-group"><label for="">Value</label><input type="text" class="form-control" id="input-default-value"></div>`;
const editableInputField = () => `<div class="form-group"><label for="">Value</label><input type="text" class="form-control" id="input-default-value"></div>`;
const editableSelectField = (element) => {
    const options = element.querySelectorAll('option');
    if (options.length > 0) {
        let optionHtml = ``;
        for (const option of options) {
            optionHtml += `<tr>
                                                <td><input type="text" class="form-control value-option" value="${option.value}"></td>
                                                <td><i class="icon-cross2 cursor-pointer text-danger font-weight-bold value-remove"></i></td>
                                                <td><i class="icon-plus3 cursor-pointer text-success font-weight-bold value-add"></i></td>
                                            </tr>`;
        }
        return `<label for="">Options</label>
                                <table>
                                    <tbody>${optionHtml}</tbody>
                                </table>`;
    } else {
        return blankTr();
    }
};

const blankTr = () => (
    `<tr>
                        <td><input type="text" class="form-control value-option"></td>
                        <td><i class="icon-cross2 cursor-pointer text-danger font-weight-bold value-remove"></i></td>
                        <td><i class="icon-plus3 cursor-pointer text-success font-weight-bold value-add"></i></td>
                    </tr>`
)

document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("regional-area")) {
        selectFormGroup(event);
    }
    if (event.target.classList.contains("value-remove")) {
        removeTrElement(event);
    }
    if (event.target.classList.contains("value-add")) {
        addTrElement(event);
    }
});