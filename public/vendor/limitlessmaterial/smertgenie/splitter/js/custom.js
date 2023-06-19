// let scroll_content = new PerfectScrollbar("#scroll_content", {
//   wheelSpeed: 2,
//   wheelPropagation: true,
//   minScrollbarLength: 20,
//   useBothWheelAxes: true,
// });

var aside = new PerfectScrollbar("#sidebar", {
  wheelSpeed: 1,
  wheelPropagation: true,
  minScrollbarLength: 10,
  // useBothWheelAxes: true,
  // suppressScrollX: true, 
  // suppressScrollY: true
});
var cWrapper = new PerfectScrollbar(".c-wrapper", {
  wheelSpeed: 1,
  wheelPropagation: true,
  minScrollbarLength: 20,
  // useBothWheelAxes: true, 
  // suppressScrollX: true, 
  // suppressScrollY: false
});
var middleAccordion = new PerfectScrollbar("#accordion", {
  wheelSpeed: 1,
  wheelPropagation: true,
  minScrollbarLength: 20,
});

//
var splitter = Split(["#a", "#b", "#c"], {
  sizes: [20, 40, 40],
  minSize: [0, 0, 3],
  gutterSize: 5,

  gutterStyle: (dimension, gutterSize) => ({
    "flex-basis": `${gutterSize}px`,
  }),
  onDragEnd: function (sizes) {
    console.log(sizes);
  },
});




// Split(["#c1", "#c2"], {
//   direction: "vertical",
//   sizes: [45, 55],
//   minSize: [110, 100],
//   gutterSize: 8,
//   cursor: "row-resize",
// });
// window.onload = function () {
//   splitter.setSizes([20, 40, 40]);
// };


//work of id=a
var sidebarCollapsed = false;
var collapseButton = document.getElementById("collapseButton");

collapseButton.addEventListener("click", buttonCollpsed);


//button collapsing 

function buttonCollpsed() {
  sidebarCollapsed = !sidebarCollapsed;
  if (sidebarCollapsed) {
    splitter.setSizes([.5, 59.5, 40]);
  } else if (!sidebarCollapsed) {
    splitter.setSizes([20, 40, 40]);
  }
}



//work of id=b
var expandButton = document.getElementById("expandButton");
var bwrapperexpanded = false;


expandButton.addEventListener("click", buttonExpanded);
//button expansion/shrinking
function buttonExpanded() {
 
  bwrapperexpanded = !bwrapperexpanded;
  if (!bwrapperexpanded) {
    splitter.setSizes([20, 40, 40]);
    collapseButton.classList.add("d-block");
    expandButton.removeChild(expandButton.childNodes[0]);
    expandButton.innerHTML=`<i class="fas fa-expand"></i>`;
   
  }else if (bwrapperexpanded) {
    collapseButton.classList.remove("d-block");
    collapseButton.classList.add("d-none");
    splitter.setSizes([.5, 99, .5]);
    expandButton.removeChild(expandButton.childNodes[0]);
    expandButton.innerHTML=`<i class="fas fa-compress-arrows-alt"></i>`;
  } 
  
}


//work of id=C

var cwrapperexpanded = true;
var tabExpandButton = document.getElementById("tabExpandButton");
tabExpandButton.addEventListener("click", tabExpanded);


//button expansion/shrinking

function tabExpanded() {
  cwrapperexpanded = !cwrapperexpanded;
  if (!cwrapperexpanded) {
    collapseButton.classList.remove("d-block");
    collapseButton.classList.add("d-none");
    splitter.setSizes([0, 0, 100]);
    tabExpandButton.removeChild(tabExpandButton.childNodes[0]);
    tabExpandButton.innerHTML=`<i class="fas fa-compress-arrows-alt"></i>`;
    
  }else if (cwrapperexpanded) {
    splitter.setSizes([20, 40, 40]);
    collapseButton.classList.add("d-block");
    tabExpandButton.removeChild(tabExpandButton.childNodes[0]);
    tabExpandButton.innerHTML=`<i class="fas fa-expand"></i>`;
  } 
  
}

