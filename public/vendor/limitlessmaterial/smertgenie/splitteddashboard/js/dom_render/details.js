////////////Example Base Skeleton///////////
const BASE_SKELETON = {
  //for section ***1***
  section: 0,
  crud: [0, 0, 0, 0],
  data: [
    {
      content: {},
      attachments: [{}, {}],
    },
    {
      content: {},
      attachments: [{}, {}],
    },
  ],

  //for section ***2*** and ***3***
  sections: 1,
  crud: [0, 0, 0, 0],
  section_list: {
    section_one: "Section One",
    section_two: "Section Two",
    section_three: "Section Three",
  },
  section_two: {
    data: [
      {
        content: {
          test: "fd",
        },
        attachments: [{}, {}],
      },
      {
        content: {},
        attachments: [{}, {}],
      },
    ],
  },
};

////////////////////////////////////

//Use Case One
var details_one = {
  sections: 0,
  crud: [0, 1, 1, 0],
  data: [
    {
      content: {
        text: "RKB",
        text1: "Hossain",
        data: {
          test2: "Data 2",
          test1: "Data 1",
          test3: [
            {
              content: "test Data",
            },
            {
              content: "test Data t444wo",
            },
          ],
        },
        info: [
          {
            test1: [
              {
                content: "text content4444",
              },
              {
                content: "demo content222224444",
              },
            ],
          },
          {
            test12: [
              {
                content: "text content24444222",
              },
              {
                content: "demo content2444422",
              },
            ],
          },
        ],
      },
      attachments: [{}, {}],
    },
    {
      content: {
        text: "sdfdsfsdf",
        text1: "Hofsdfdsfsdfdsfdfssain",
        data: {
          test2: "Data 2",
          test1: "Data 1",
          test3: [
            {
              content: "test Data",
            },
            {
              content: "test Data t444wo",
            },
          ],
        },
        info: [
          {
            test1: [
              {
                content: "text content4444",
              },
              {
                content: "demo content222224444",
              },
            ],
          },
          {
            test12: [
              {
                content: "text content24444222",
              },
              {
                content: "demo content2444422",
              },
            ],
          },
        ],
      },
      attachments: [{}, {}],
    },
  ],
};
//Use Case two

var details_two = {
  sections: 1,
  section_list: {
    section_one: "Section One",
    section_two: "Section Two",
    section_three: "Section Three",
  },
  section_one: {
    data: {
      content: {
        testKey: "Data",
      },
      attachments: [{}, {}],
    },
  },
  section_three: {
    data: {
      content: {
        name: "Void",
      },
      attachments: [{}, {}],
    },
  },
};
//Use Case three

var details_three = {
  sections: 2,
  section_list: {
    section_one: "Section One",
    section_two: "Section Two",
    section_three: "Section Three",
  },
  section_one: {
    data: [
      {
        content: {
          name: "first content first",
          checkArray: ["text info", "dummy daa"],
          checkObject: {},
        },
        attachments: [{}, {}],
      },
    ],
  },
  section_two: {
    data: [
      {
        content: {
          name: "first content second",
          checkArray: [
            {
              data_1: [
                "test_1",
                {
                  test_2: ["p", "q", "r"],
                },
              ],
            },
          ],
          checkObject: {},
        },
        attachments: [{}, {}],
      },
      {
        content: {
          name: "first content second two",
          info: {
            login_type: "email",
            login: "info@gmial.com",
            name: "Mohammad Abu Sadek",
            avatar:
              "http://103.120.161.54/storage/profile-photos/2020-12-09_20211_8972.jpg",
          },
          checkArray: [],
          checkObject: {},
        },
        attachments: [{}, {}],
      },
    ],
  },
  section_three: {
    data: {
      content: {
        name: "ki vai",
      },
      attachments: [{}, {}],
    },
  },
};

var notesheet_data = [
  {
    id: "1",
    name: "notesheet one",
    body_section: [
      {
        section_one: "section one",
        reference_section: [
          {
            reference_one: "text",
            atttachemnt_one: [],
          },
        ],
      },
      {
        section_two: "section two",
        reference_section: [
          {
            reference_one: "text",
            atttachemnt_one: [],
          },
          {
            reference_one: "text",
            atttachemnt_one: [],
          },
        ],
      },
      {
        section_three: "section three",
      },
    ],
  },
];

var objectLength = (objectData) => {
  return Object.keys(objectData).length;
};

//////////////Recursive Programming //////////////
let globalReturnforParseArrayObject = {};
var parseArrayObject = (newData) => {
  let testLength;
  if (Array.isArray(newData)) {
    newData.forEach((eachArrayElem) => {
      if (typeof eachArrayElem == "object") {
        if (Array.isArray(eachArrayElem)) {
          parseArrayObject(eachArrayElem);
        } else {
          parseArrayObject(eachArrayElem);
        }
      }

      if (
        eachArrayElem &&
        typeof eachArrayElem == "string" &&
        eachArrayElem.length > 0
      ) {
        testLength = objectLength(globalReturnforParseArrayObject);
        globalReturnforParseArrayObject[testLength] = eachArrayElem;
      }
    });
  }
  if (typeof newData == "object") {
    if (!Array.isArray(newData)) {
      for (let objectKey in newData) {
        let objectValue = newData[objectKey];
        if (typeof objectValue == "object") {
          parseArrayObject(objectValue);
        }
        if (
          objectValue &&
          typeof objectValue == "string" &&
          objectValue.length > 0
        ) {
          testLength = objectLength(globalReturnforParseArrayObject);
          globalReturnforParseArrayObject[testLength] = objectValue;
        }
      }
    }
  }
  return globalReturnforParseArrayObject;
};
//////// END RECURSIVE PROGRAMMING ///////////////

// all functions
var makeTextNode = (itemString = null) => {
  return document.createTextNode(itemString);
};
var makeIcon = (iconClass = null) => {
  var icon = document.createElement("i");
  icon.setAttribute("class", `${iconClass}`);
  return icon;
};
var makeA = (aclass = null, aId = null, alink = null, action = null) => {
  var a = document.createElement("a");
  a.setAttribute("href", `#${alink}`);
  a.setAttribute("class", `${aclass}`);
  a.setAttribute("data-toggle", "tab");
  return a;
};
var makeLi = (itemObject = null, liId = null, liClass = null) => {
  var li = document.createElement("li");
  li.setAttribute("class", `${liClass}`);
  return li;
};
var makeDiv = (itemObject = null, divId = null, divClass = null) => {
  var div = document.createElement("div");
  div.setAttribute("id", `${divId}`);
  div.setAttribute("class", `${divClass}`);
  return div;
};

var makeUl = (itemObject = null, uId = null, uClass = null) => {
  var ul = document.createElement("ul");
  ul.setAttribute("id", `${uId}`);
  ul.setAttribute("class", `${uClass}`);
  return ul;
};

var makeSubNavHeading = (parentNavCount = null, subNavCount = null) => {
  let navLi = makeLi(null, null, "nav-item");
  let navA = makeA(
    "nav-link",
    null,
    parentNavCount + "-" + parseInt(subNavCount),
    null
  );
  let navTextNode = makeTextNode(parseInt(subNavCount) + 1);
  navA.append(navTextNode);
  navLi.append(navA);
  return navLi;
};

var makeSubNavContentSectionArrayofObject = (
  navTabContent,
  parentNavCount = null,
  subNavCount = null,
  singleLength
) => {
  var eachNavContentDiv = makeDiv(
    null,
    parentNavCount + "-" + parseInt(subNavCount),
    singleLength ? null : "tab-pane fade"
  );

  if (navTabContent["content"] && typeof navTabContent["content"] == "object") {
    for (let navTabContentKey in navTabContent["content"]) {
      let elementTabContentValue = navTabContent["content"][navTabContentKey];
      if (typeof elementTabContentValue == "string") {
        let navTextNode = makeTextNode(elementTabContentValue);
        let div = makeDiv(null, null, null);
        div.appendChild(navTextNode);
        eachNavContentDiv.appendChild(div);
      }
      if (
        typeof elementTabContentValue == "object" &&
        Object.keys(elementTabContentValue).length > 0
      ) {
        globalReturnforParseArrayObject = {};
        let returnObject = parseArrayObject(elementTabContentValue);
        var returnObjectKey = Object.keys(returnObject);
        if (Array.isArray(returnObjectKey) && returnObjectKey.length > 0) {
          returnObjectKey.forEach((returnKeyElem) => {
            let navTextNodeObj = makeTextNode(returnObject[returnKeyElem]);
            let divObj = makeDiv(null, null, null);
            divObj.appendChild(navTextNodeObj);
            eachNavContentDiv.appendChild(divObj);
          });
        }
      }
    }
  } else {
    // content not object
  }
  return eachNavContentDiv;
};

var makeSubNavContentSectionSingleObject = (navTabContent) => {
  var eachNavContentDiv = makeDiv(null, null, null);
  var objectKeys = Object.keys(navTabContent);
  if (Array.isArray(objectKeys) && objectKeys.length > 0) {
    objectKeys.forEach((element) => {
      if (typeof navTabContent[element] == "string") {
        let navTextNode = makeTextNode(navTabContent[element]);
        let div = makeDiv(null, null, null);
        div.appendChild(navTextNode);
        eachNavContentDiv.appendChild(div);
      }
      if (typeof navTabContent[element] == "object") {
        globalReturnforParseArrayObject = {};
        let returnObject = parseArrayObject(navTabContent[element]);
        var returnObjectKey = Object.keys(returnObject);
        if (Array.isArray(returnObjectKey) && returnObjectKey.length > 0) {
          returnObjectKey.forEach((returnKeyElem) => {
            let navTextNodeObj = makeTextNode(returnObject[returnKeyElem]);
            let divObj = makeDiv(null, null, null);
            divObj.appendChild(navTextNodeObj);
            eachNavContentDiv.appendChild(divObj);
          });
        }
      }
    });
  }
  return eachNavContentDiv;
};
var loadNavOndetailsPortion = (detailsData, navNode) => {
  if (detailsData.sections) {
    if (
      detailsData.section_list &&
      typeof detailsData.section_list == "object" &&
      Object.keys(detailsData.section_list).length > 0
    ) {
      var navUl = makeUl(
        null,
        null,
        "nav mr-0 nav-tabs nav-tabs-vertical flex-column mb-md-0 border-bottom-0"
      );
      for (let navKey in detailsData.section_list) {
        let navValue = detailsData.section_list[navKey];
        let navLi = makeLi(null, null, "nav-item");
        let navA = makeA("nav-link", null, navKey, null);
        let navIcon = makeIcon("icon-menu7 mr-2");
        let navTextNode = makeTextNode(navValue);
        navA.append(navIcon, navTextNode);
        navLi.append(navA);
        //insert each li into ul;
        navUl.appendChild(navLi);
      }
      navNode.appendChild(navUl);
      //insert ul into div end;
    }
    //is navBar menu available or not end;
  }
  //section check end
};
var loadDetailsPortion = (detailsData, navContentNode) => {
  if (detailsData.sections) {
    if (
      detailsData.section_list &&
      typeof detailsData.section_list == "object" &&
      Object.keys(detailsData.section_list).length > 0
    ) {
      for (let navKey in detailsData.section_list) {
        let navContentDiv = makeDiv(null, navKey, "tab-pane fade");
        let navContentFormGroupDiv = makeDiv(
          null,
          null,
          "form-group row m-0 card border-0"
        );
        let navTextNode = makeTextNode(navKey);
        if (detailsData[navKey] && typeof detailsData[navKey] == "object") {
          if (detailsData[navKey]["data"]) {
            if (
              Array.isArray(detailsData[navKey]["data"]) &&
              parseInt(detailsData[navKey]["data"].length) > 1
            ) {
              //multiple
              var navContentHeading = makeUl(
                null,
                null,
                "nav nav-tabs nav-tabs-highlight nav-justified"
              );
              var navContentSection = makeDiv(
                null,
                "scroll_content",
                "tab-content px-2"
              );
              detailsData[navKey]["data"].forEach(
                (navTabContent, navTabindex) => {
                  let subNavHeading = makeSubNavHeading(navKey, navTabindex);
                  navContentHeading.appendChild(subNavHeading);
                  //heading end for sub content
                  var subContentSection = makeSubNavContentSectionArrayofObject(
                    navTabContent,
                    navKey,
                    navTabindex
                  );
                  navContentSection.appendChild(subContentSection);
                }
              );

              navContentFormGroupDiv.append(
                navContentHeading,
                navContentSection
              );
            }
            if (
              Array.isArray(detailsData[navKey]["data"]) &&
              parseInt(detailsData[navKey]["data"].length) == 1
            ) {
              //single

              var navContentSection = makeDiv(
                null,
                "scroll_content",
                "tab-content px-2"
              );
              detailsData[navKey]["data"].forEach(
                (navTabContent, navTabindex) => {
                  var subContentSection = makeSubNavContentSectionArrayofObject(
                    navTabContent,
                    navKey,
                    navTabindex,
                    1
                  );
                  navContentSection.appendChild(subContentSection);
                }
              );
              navContentFormGroupDiv.append(navContentSection);
            }
            if (
              typeof detailsData[navKey]["data"] === "object" &&
              detailsData[navKey]["data"].hasOwnProperty("content") &&
              Object.keys(detailsData[navKey]["data"]["content"]).length > 0
            ) {
              //object value is available
              var navContentSection = makeDiv(
                null,
                "scroll_content",
                "tab-content px-2"
              );
              var subContentSection = makeSubNavContentSectionSingleObject(
                detailsData[navKey]["data"]["content"]
              );
              navContentSection.appendChild(subContentSection);
              navContentFormGroupDiv.append(navContentSection);
            }
            if (
              typeof detailsData[navKey]["data"] === "object" &&
              detailsData[navKey]["data"].hasOwnProperty("content") &&
              Object.keys(detailsData[navKey]["data"]["content"]).length == 0
            ) {
              //empty object
              console.log(detailsData[navKey]["data"]);
            }
          }
        }
        navContentDiv.appendChild(navContentFormGroupDiv);
        navContentNode.appendChild(navContentDiv);
      }
    }
  }
  //section check end
};
var loadDetailsPortionSectionOne = (detailsData, navContentNode) => {
  if (parseInt(detailsData.sections) == 0) {
    let navContentDiv = makeDiv(null, null, "");
    let navContentFormGroupDiv = makeDiv(
      null,
      null,
      "form-group row m-0 card border-0"
    );
    if (detailsData["data"]) {
      if (
        Array.isArray(detailsData["data"]) &&
        parseInt(detailsData["data"].length) > 1
      ) {
        //multiple
        var navContentHeading = makeUl(
          null,
          null,
          "nav nav-tabs nav-tabs-highlight nav-justified"
        );
        var navContentSection = makeDiv(
          null,
          "scroll_content",
          "tab-content px-2"
        );
        detailsData["data"].forEach((navTabContent, navTabindex) => {
          let subNavHeading = makeSubNavHeading(null, navTabindex);
          navContentHeading.appendChild(subNavHeading);
          var subContentSection = makeSubNavContentSectionArrayofObject(
            navTabContent,
            null,
            navTabindex,
            0
          );
          navContentSection.appendChild(subContentSection);
        });

        navContentFormGroupDiv.append(navContentHeading, navContentSection);
      }
      if (
        Array.isArray(detailsData["data"]) &&
        parseInt(detailsData["data"].length) == 1
      ) {
        //single
        var navContentSection = makeDiv(
          null,
          "scroll_content",
          "tab-content px-2"
        );
        detailsData["data"].forEach((navTabContent, navTabindex) => {
          var subContentSection = makeSubNavContentSectionArrayofObject(
            navTabContent,
            null,
            navTabindex,
            1
          );
          navContentSection.appendChild(subContentSection);
        });
        navContentFormGroupDiv.append(navContentSection);
      }
      if (
        typeof detailsData["data"] === "object" &&
        detailsData["data"].hasOwnProperty("content") &&
        Object.keys(detailsData["data"]["content"]).length > 0
      ) {
        //object value is available
        var navContentSection = makeDiv(
          null,
          "scroll_content",
          "tab-content px-2"
        );
        var subContentSection = makeSubNavContentSectionSingleObject(
          detailsData["data"]["content"]
        );
        // console.log(subContentSection)
        navContentSection.appendChild(subContentSection);
        navContentFormGroupDiv.append(navContentSection);
      }
      if (
        typeof detailsData["data"] === "object" &&
        detailsData["data"].hasOwnProperty("content") &&
        Object.keys(detailsData["data"]["content"]).length == 0
      ) {
        //empty object
        console.log(detailsData["data"]);
      }
    }
    navContentDiv.appendChild(navContentFormGroupDiv);
    navContentNode.appendChild(navContentDiv);
  }
  //section check end
};

var removeAllChild = (node) => {
  while (node.firstChild) {
    node.removeChild(node.firstChild);
  }
};

var details_tab_nav = document.querySelector(".details_tab_nav");
var details_tab_content = document.querySelector(".details_tab_content");
removeAllChild(details_tab_nav);
loadNavOndetailsPortion(details_three, details_tab_nav);
removeAllChild(details_tab_content);
loadDetailsPortion(details_three, details_tab_content);
// loadDetailsPortionSectionOne(details_one, details_tab_content);

// for section one no parent nav key
