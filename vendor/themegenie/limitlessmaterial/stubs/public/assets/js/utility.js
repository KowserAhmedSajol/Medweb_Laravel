var BASE_URL = window.location.origin + '/';
var csrf_token = $(document).find('[name="_token"]').val(); 


const INDENT_COVERING_LETTER_SIGN = 4;
const POL_INDENT_COVERING_LETTER_SIGN = 3;
const PRIORITY_COVERING_LETTER_SIGN = 2;
const SPS_INI_DTE_SUP_COVERING_LETTER_SIGN_COUNT = 1;
const PROCUREMENT_TYPE_INDENT = "indent";
const PROCUREMENT_TYPE_PRIORITY = "priority";
const PROCUREMENT_TYPE_CAPITAL_PURCHASE = "capital_purchase";
const PROCUREMENT_TYPE_LOCAL_PURCHASE = "local";
const PROCUREMENT_TYPE_G_2_G = "g_2_g";
const PROCUREMENT_TYPE_SPS = "sps";
const DTE_SUP_OFFICE_ID = 15;
const DTE_CNE_OFFICE_ID = 13;
const ACAS_OFFICE_ID = 10;
const ACT_BACK = "back";
const ACT_FWD = "fwd";
const ACK = "ack";
const CONCERN_GROUP = "Concern Group";
const APPOINTMENT = "Appointment";
const CHECKER = "Checker";
const PROCUREMENT_TYPE_LIST_FOR_INDENT_PREP = ["indent", "sps"];
const SIGNATURE_WIDTH = "50";
const SIGNATURE_HEIGHT = "80";
const DEFAULT_PAGINATE_ITEM = 5;
const DEFAULT_PAGINATE_ITEM_START_CAL = DEFAULT_PAGINATE_ITEM - 1;
const STORAGE_AUTH_USER = sessionStorage.getItem("authUser");
const PARSE_STORAGE_AUTH_USER = JSON.parse(STORAGE_AUTH_USER);


function MAKE_TABLE_FOR_MYDESK(
  heading_property,
  data,
  actions_property,
  start = null,
  donLink = true,
  bulkSelect = false
) {
  let htmlOutput = "";
  //body
  let count = 1;
  for (let element in data) {
    htmlOutput += `<tr>`;
    for (let key in heading_property) {
      if (key == "iteration") {
        if (bulkSelect) {
          htmlOutput += !start
            ? `<td>
            <input type="checkbox" class="singleitem" value='${
              data[element]["id"]
            }'>
          ${count++}
          </td>`
            : `<td>
            <input type="checkbox" class="singleitem" value='${
              data[element]["id"]
            }'>
          ${start++}
          </td>`;
        } else {
          htmlOutput += !start ? `<td>${count++}</td>` : `<td>${start++}</td>`;
        }
      } else if (key == "action") {
        htmlOutput += `<td>`;
        for (let each_action in actions_property) {
          if (each_action == "show") {
            htmlOutput += `<a title="Show" class="btn btn-outline bg-success btn-icon text-success btn-sm border-success border-2 rounded-round legitRipple mr-1"
            href="${actions_property[each_action].replace(
              "replaceable",
              data[element]["id"]
            )}">
            <i class="fas fa-eye"></i>
            </a>`;
          }
          if (each_action == "movable_show") {
            htmlOutput += `<a title="Show" class="btn btn-outline bg-success btn-icon text-success btn-sm border-success border-2 rounded-round legitRipple mr-1"
            href="${actions_property[each_action].replace(
              "replaceable",
              data[element]["document_url"]
            )}">
            <i class="fas fa-eye"></i>
            </a>`;
          }
          if (each_action == "edit") {
            if (!data[element]["is_tender_floated"]) {
              htmlOutput += `<a title="Show" class="btn btn-outline bg-primary btn-icon text-primary btn-sm border-primary border-2 rounded-round legitRipple mr-1"
            href="${actions_property[each_action].replace(
              "replaceable",
              data[element]["id"]
            )}">
            <i class="fas fa-pen"></i>
            </a>`;
            }
          }
          if (each_action == "delete") {
            if (!data[element]["is_tender_floated"]) {
              htmlOutput += `<a title="Delete" style='cursor:pointer' class="btn btn-outline bg-danger btn-icon text-danger btn-sm border-danger border-2 rounded-round legitRipple mr-1"
             data-hit_url='${actions_property[each_action].replace(
               "replaceable",
               data[element]["id"]
             )}' onclick="deleteTableData(this)">
            <i class="fas fa-trash"></i>
            </a>`;
            }
          }
        }
        htmlOutput += `</td>`;
      } else if (key == "title" && donLink) {
        htmlOutput += `<td>
        <span data-popup="tooltip" title="${data[element][key]}"
        data-placement="right"> <span
            class="badge badge-sm">${
              data[element]["procurement_type"] != undefined
                ? data[element]["procurement_type"]
                : ""
            }</span>
        <span data-popup="tooltip" title="${data[element][key]}"
        data-placement="right"> <span
            class="badge badge-sm">${
              data[element]["is_retender"] != undefined &&
              data[element]["is_retender"] == "1"
                ? "[Re-Tender]"
                : ""
            }</span>
        <a class="description-link"
            href="${actions_property["show"].replace(
              "replaceable",
              data[element]["id"]
            )}">
            ${
              data[element][key] && data[element][key].length > 25
                ? data[element][key].substring(0, 25) + `...`
                : data[element][key]
            }
        </a>
        ${
          data[element]["is_checking"]
            ? `<span class="badge bg-indigo">Checking</span>`
            : ""
        }
        ${
          data[element]["is_status_approved"]
            ? `<span class="badge bg-indigo">Approved</span>`
            : ""
        }
        ${
          data[element]["is_sent_to_dgdp"]
            ? `<span class="badge bg-indigo">Sent to DGDP</span>`
            : ""
        }
        ${
          data[element]["is_tender_floated"]
            ? ` <span class="badge bg-indigo">Tender floated</span>`
            : ""
        }
    </span>
        </td>`;
      } else if (key == "current_act_entity") {
        htmlOutput += `<td> 
        ${data[element][key]}
         ${
           data[element]["action"]
             ? ` <span class="badge bg-primary">Action</span>`
             : ""
         }  
         ${
           data[element]["acknowledge"]
             ? ` <span class="badge bg-success">Ack</span>`
             : ""
         }  
       
        </td>`;
      } else if (key == "desk_info_designation") {
        htmlOutput += `<td> 
    ${data[element]["desk_info"]["designation"]}
     ${
       data[element]["action"]
         ? ` <span class="badge bg-primary">Action</span>`
         : ""
     }  
     ${
       data[element]["ack"] ? ` <span class="badge bg-success">Ack</span>` : ""
     }  
    </td>`;
      } else if (key == "desk_info_on_desk") {
        htmlOutput += `<td> 
    ${data[element]["desk_info"]["on_desk"]}
    </td>`;
      } else {
        htmlOutput += `<td>
        ${
          data[element][key] && data[element][key].length > 25
            ? data[element][key].substring(0, 25) + `...`
            : data[element][key]
            ? data[element][key]
            : ""
        }
        </td>`;
      }
    }
    htmlOutput += `</tr>`;
  }
  //If no data is there;
  if (Object.keys(data).length == 0) {
    let colspan = Object.keys(heading_property).length;
    htmlOutput += `<tr>`;
    htmlOutput += `<td class='text-center' colspan='${colspan}'>No record found</td>`;
    htmlOutput += `</tr>`;
  }
  return htmlOutput;
}
function deleteTableData(input) {
  let trashUrl = input.dataset.hit_url;
  let isV1Procurement = false;
  if (trashUrl.includes("v1del")) {
    isV1Procurement = true;
  }
  let url = trashUrl;
  let urlsplit = trashUrl.split("##");
  if (urlsplit[0]) {
    url = urlsplit[0];
  }
  if (!confirm("Are you sure to delete?")) {
    return true;
  }
  sendHttpRequest("POST", url, null, isV1Procurement)
    .then((responseData) => {
      if (responseData.status) {
        if (responseData.status == "access_denied") {
          window.location.href = BASE_URL + "unauthorized";
          return true;
        }
        if (responseData.status == "ok") {
          alert(responseData.message);
          location.reload();
          return true;
        }
      }
    })
    .catch((err) => {
      console.log(err, err.data);
    });
}
function tinymce_info(selectorInfo) {
  return tinymce.init({
    selector: `textarea${selectorInfo}`,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor spellchecker",
    ],
    toolbar:
      "insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons,table ",
    fontsize_formats: "8px 10px 13px 14px 18px 24px 36px",
    font_formats: " Arial=arial,helvetica,sans-serif;",
    table_default_attributes: {
      border: "1",
      width: "100%",
    },
    browser_spellcheck: true,
    force_br_newlines: false,
    force_p_newlines: false,
    mode: "exact",
    setup: function (ed) {
      ed.on("init", function (ed) {
        this.getBody().style.fontSize = "13px";
        this.getBody().style.fontFamily = "Arial";
      });
    },
    paste_postprocess: function (plugin, args) {
      args.node.marginLeft = "0px";
    },
  });
}
var sendHttpRequest = (method, url, data = null, isProcurementV1 = false) => {
  let headers = null;
  if (isProcurementV1) {
    headers = {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer " + authtoken,
    };
  } else {
    headers = {
      "X-CSRF-TOKEN": csrf_token,
      Accept: "application/json",
      "Content-Type": "application/json",
    };
  }
  return fetch(url, {
    method: method,
    body: data ? JSON.stringify(data) : null,
    headers: headers,
  }).then((response) => {
    if (response.status >= 400) {
      return response.json().then((errResData) => {
        var error = new Error("Something went wrong!");
        error.data = errResData;
        throw error;
      });
    }
    return response.json();
  });
};

var sendHttpRequestFile = (method, url, data, isProcurementV1 = false) => {
  let headers = null;
  if (isProcurementV1) {
    headers = {
      Accept: "application/json",
      Authorization: "Bearer " + authtoken,
    };
  } else {
    headers = {
      "X-CSRF-TOKEN": csrf_token,
      Accept: "application/json",
    };
  }
  return fetch(url, {
    method: method,
    body: data,
    headers: data ? headers : {},
  }).then((response) => {
    if (response.status >= 400) {
      // !response.ok
      return response.json().then((errResData) => {
        var error = new Error("Something went wrong!");
        error.data = errResData;
        throw error;
      });
    }
    return response.json();
  });
};