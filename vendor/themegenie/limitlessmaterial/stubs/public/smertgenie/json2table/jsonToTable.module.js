export default (tableJson) => {

    const addDecorationClass = (dClass) => dClass?.length > 0 ? ` class="${dClass}"` : ``;
    const buildCell = (tag, cell)=>{
        const cellHtml = document.createElement(tag);
        cellHtml.colSpan     = cell.colspan ?? 1;
        cellHtml.rowSpan     = cell.rowspan ?? 1;
        cellHtml.textContent = cell.label;
        if(cell.decorationClass?.length > 0) cellHtml.classList.add(cell.decorationClass);
        return  cellHtml.outerHTML;
    }

    const table = `
    <table${ addDecorationClass(tableJson.decorationClass) }>
        <thead${ addDecorationClass(tableJson?.thead?.decorationClass) }>
            ${tableJson.thead.child.map(tr=>(
                `<tr${ addDecorationClass(tr.decorationClass) }>
                    ${tr.child.map(th=>buildCell('th', th)).join("")}
                </tr>`
            )).join("")}
        </thead>
        <tbody${ addDecorationClass(tableJson?.tbody?.decorationClass) }>
            ${tableJson.tbody.child.map(tr=>(
                `<tr${ addDecorationClass(tr.decorationClass) }>
                    ${tr.child.map(td=>buildCell('td', td)).join("")}
                </tr>`
            )).join("")}
        </tbody>
        ${tableJson.hasOwnProperty('tfoot') 
            ? (`<tfoot${ addDecorationClass(tableJson?.tfoot?.decorationClass) }>
                    ${tableJson.tfoot?.child?.map(tr=>(
                        `<tr${ addDecorationClass(tr.decorationClass) }>
                            ${tr.child.map(td=>buildCell('td', td)).join("")}
                        </tr>`
                    ))?.join("")}
                </tfoot>`) 
            : ''}
    </table>`;

    return table.trim();
}