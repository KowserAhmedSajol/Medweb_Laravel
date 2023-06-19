export default (jxlTable) => {
    const tableJson = {
        thead: { child : [] },
        tbody: { child : [] }
    };

    const headers   = jxlTable.getHeaders();
    const trs       = jxlTable.getJson();
    const headerArr = headers.split(',');

    const trObj = [];
    for (let i = 0; i < headerArr.length -1; i++) {
        trObj.push({ "label" : headerArr[i] });
    }   
    tableJson.thead.child.push({ "child" : trObj });

    for (const tr of trs) {
        const trObj = [];
        for (let j = 0; j < Object.values(tr).length -1; j++) {
            trObj.push({ "label" : tr[j] });
        } 
        tableJson.tbody.child.push({ "child" : trObj });
    }

    return tableJson;
}