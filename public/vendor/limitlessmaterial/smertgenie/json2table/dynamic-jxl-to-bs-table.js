import jxlToTableJson from './jxlToTableJson.module.js';
import jsonToTable from './jsonToTable.module.js';

const showJxlModal = (event)=>{
    document.querySelector('#col-input-area').innerHTML = ``;
    document.querySelector('#jxl-area').innerHTML = ``;
    document.querySelector('#jxl-save-btn').setAttribute('disabled', 'disabled');
    $('#jxl-modal').modal('show');
}

const columnInputFieldGen = ()=>{
    const colNoInput = document.querySelector('#col-no-input');
    let html = ``;
    for (let index = 0; index < colNoInput.value; index++) {
        html += `<label for="" class="m-0">Column ${index+1}</label><input type="text" class="form-control column-name">`;
    }

    html += `<div class="text-center"><button type="button" class="btn btn-sm my-2 bg-primary" id="jxl-gen-btn">Generate</button></div>`;
    document.querySelector('#col-input-area').innerHTML = html;
    colNoInput.value = null;
    document.querySelector('#jxl-gen-btn').addEventListener('click', genJxl);
}

const genJxl = ()=>{
    const tableStructure = [];
    for (const column of document.querySelectorAll('.column-name')) {
        tableStructure.push({
            type : 'text',
            title: column.value,
            width: 150
        })
    }
    tableStructure.push({
        type : 'hidden',
        title: 'hidden',
    })
    const modalId = document.querySelector('#jxl-modal');
    jexcel(modalId.querySelector('#jxl-area'), {
        contextMenu       : false,
        data              : [[]],
        columns           : tableStructure,
    });

    document.querySelector('#jxl-save-btn').removeAttribute('disabled');
}

const jxlSave = ()=>{
    const json = jxlToTableJson(document.querySelector('#jxl-area').jexcel);
    document.querySelector('#generate-bs-table').dataset.json = JSON.stringify(json);
    document.querySelector('#generate-bs-table').removeAttribute('disabled');
    $('#jxl-modal').modal('hide');
}

const genBSTable = ()=>{

    const json = JSON.parse(document.querySelector('#generate-bs-table').dataset.json);
    json.decorationClass = 'table table-sm table-bordered'
    document.querySelector('#bs-table').innerHTML= jsonToTable(json);
    document.querySelector('#content_descriptionInput').value = JSON.stringify(json);
    document.querySelector('#content_descriptionInput').setAttribute("readonly", true)
}

document.querySelector('#jxl-modal-btn').addEventListener('click', showJxlModal);
document.querySelector('#col-no-add-btn').addEventListener('click', columnInputFieldGen);
document.querySelector('#jxl-save-btn').addEventListener('click', jxlSave);
document.querySelector('#generate-bs-table').addEventListener('click', genBSTable);
