var list = {
  data: [
    {
      crud: [0, 1, 1, 0],
      content_title:
        "Lorem ipsum dolor, sit amet consectetur adipisicing elit.Illum ipsa ipsam, quasi ipsum eveniet quam eligendi ratione",
      timeline: {
        timeline_section: {
          section_one: "Section One",
          section_two: "Section Two",
          section_three: "Section Three",
        },
        //section_one=DTE A&W
        section_one: {
          content: {
            total: 50,
            data: [
              {
                title: "sit amet consectetur one",
              },
              {
                title: "sit amet consectetur two",
              },
            ],
          },
        },
        //section_two=Dte C&E
        section_two: {
          content: {
            total: 20,
            data: [
              {
                title: "sit amet consectetur three",
              },
              {
                title: "sit amet consectetur four",
              },
            ],
          },
        },
        section_three: {
          content: {
           
          },
        },
      },
    },
    {
      crud: [0, 1, 1, 1],
      content_title:
        "Lorem ipsum dolor, sit amet consectetur adipisicing elit.Illum ipsa ipsam, quasi ipsum eveniet quam eligendi ratione",
    },
  ],
};

splitter = {};
splitter.messageList = {
  displayTimeline:function(timelineData){
    let timelineDiv =document.createElement('div')
let inputContainer=document.createElement('div')
inputContainer.setAttribute('id', 'inputContainer')
inputContainer.setAttribute('class', 'input-flex-container')

let textContainer=document.createElement('div')
textContainer.setAttribute('class', 'card')

let timelineSection=timelineData.timeline_section
if(timelineSection){
  for(let timelineSectionKey in timelineSection){
   
    inputElement=document.createElement("div");
    inputElement.classList.add("input");
    inputElement.setAttribute("data-toggle","tooltip");
    inputElement.setAttribute("data-placement","right");
    inputElement.setAttribute("title",timelineSectionKey);

    let descriptionData=timelineData[timelineSectionKey].content.data
    if(descriptionData !=undefined){  
      inputElement.addEventListener("click",function () {
        inputClicked(descriptionData);   
        
      });   
    }
    inputElement.addEventListener("click",function () {
      const bg = document.querySelector('.bg');
        if(bg){
          bg.classList.remove('bg');
        }
        this.classList.add('bg');
      
    });
    

  inputContainer.appendChild(inputElement)
        
    spanElement=document.createElement("span");
    spanElement.setAttribute("data-info", timelineSection[timelineSectionKey]);
    if(timelineData[timelineSectionKey].content.total){

      spanElement.setAttribute("data-ts",timelineData[timelineSectionKey].content.total);    
      
      inputElement.appendChild(spanElement);
    }else{
      spanElement.setAttribute("data-ts",0);    
      
      inputElement.appendChild(spanElement);
    }

  }
}


function inputClicked(descriptionData) {

  let description = descriptionData.map(each => each.title);
  description=description.join(" <br><br>")  
  textElement=document.createElement("p");
  textElement.innerHTML=description;
  
  if(textContainer.childNodes.length===0) {
    textContainer.appendChild(textElement);    
} else if(textContainer.childNodes.length===1) {
    textElement.innerHTML="";
    textContainer.removeChild(textContainer.childNodes[0]);
    textElement.innerHTML=description;
    textContainer.appendChild(textElement);
}

}


timelineDiv.appendChild(inputContainer)
timelineDiv.appendChild(textContainer)

return timelineDiv


},

  displayCheckbox: function () {
    let checkboxDiv = document.createElement("div");
    checkboxDiv.setAttribute("class", "form-check");

    let checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("name", "checkbox");
    checkbox.setAttribute("class", "form-input-styled");

    checkboxDiv.appendChild(checkbox);
    return checkboxDiv;
  },
  displayMessage: function (msg) {
    let message = document.createTextNode(msg);
    let span = document.createElement("span");
    span.appendChild(message);

    let messageDiv = document.createElement("div");
    messageDiv.setAttribute("class", "text_box text-truncate");

    messageDiv.appendChild(span);

    return messageDiv;
  },
  displayTime: function () {
    let time = document.createTextNode("10 AM");
    let timeDiv = document.createElement("div");

    timeDiv.setAttribute("class", "time");
    timeDiv.appendChild(time);

    return timeDiv;
  },
  displayDropdown: function () {
    let dropdownDiv = document.createElement("div");
    dropdownDiv.setAttribute("class", "dropdown");

    let button = document.createElement("button");
    button.setAttribute("class", "btn");
    button.setAttribute("type", "button");
    button.setAttribute("id", "dropdownMenu1");
    button.setAttribute("data-toggle", "dropdown");
    button.setAttribute("aria-haspopup", "true");
    button.setAttribute("aria-expanded", "false");

    let icon = document.createElement("i");
    icon.setAttribute("class", "fas fa-ellipsis-h");

    let dropdownMenu = document.createElement("div");
    dropdownMenu.setAttribute("class", "dropdown-menu");
    dropdownMenu.setAttribute("aria-labelledby", "dropdownMenu1");

    let dropdownItem = document.createElement("a");
    dropdownItem.setAttribute("class", "dropdown-item");
    dropdownItem.setAttribute("href", "#");

    let dropdownText = document.createTextNode("Move");

    dropdownItem.appendChild(dropdownText);
    dropdownMenu.appendChild(dropdownItem);
    button.appendChild(icon);
    dropdownDiv.appendChild(button);
    dropdownDiv.appendChild(dropdownMenu);
    return dropdownDiv;
  },
  displayCollapseButton: function (id) {
    let button = document.createElement("button");
    button.setAttribute("class", "btn btn-link btn-sm");
    button.setAttribute("data-toggle", "collapse");
    button.setAttribute("data-target", `#collapse-${id}`);
    button.setAttribute("aria-expanded", "true");
    button.setAttribute("aria-controls", id);

    let icon = document.createElement("i");
    icon.setAttribute("class", "fas fa-arrow-circle-down fa-lg");

    button.appendChild(icon);
    return button;
  },
  displayCollapseContent: function (item,id) {
    let collapseContent = document.createElement("div");
    collapseContent.setAttribute("class", "collapse");
    collapseContent.setAttribute("id", `collapse-${id}`);
    collapseContent.setAttribute("aria-labelledby", `heading-${id}`);
    collapseContent.setAttribute("data-parent", "#accordion");

    let collapseCardBody = document.createElement("div");
    collapseCardBody.setAttribute("class", "card-body border-top");
    if(item.timeline){
      let timelineDiv = document.createElement("div");
      timelineDiv.setAttribute("class", "timeline scrollbar");
  
      let timeline =this.displayTimeline(item.timeline);
  
      timelineDiv.appendChild(timeline);
      collapseCardBody.appendChild(timelineDiv);
    }else{
      text=document.createTextNode("no data found")
      collapseCardBody.appendChild(text)
    }
    
    collapseContent.appendChild(collapseCardBody);
    return collapseContent;
  },
  displayAction: function (id) {
 
    let time = "";
    let dropdown = "";
    let collapse = "";

    let actions = document.createElement("span");
    actions.setAttribute("class", "single_action flex");

    time=this.displayTime()
    collapse=this.displayCollapseButton(id)
    dropdown=this.displayDropdown()
 
  

    actions.appendChild(time)
    actions.appendChild(dropdown)
    actions.appendChild(collapse)

    return actions


  },
  displayList: function (item,count) {
    
    let checkbox = "";
    let message = "";
    let action = "";
    let collapseContent = "";

    let card = document.createElement("div");
    card.setAttribute("class", "card m-2");

    let mailItem = document.createElement("div");
    mailItem.setAttribute("class", "mail_item py-1 px-2");
    mailItem.setAttribute("id", `heading-${count}`);
    checkbox = this.displayCheckbox();
    message = this.displayMessage(item.content_title);
    action = this.displayAction(count);
      collapseContent = this.displayCollapseContent(item,count);

      mailItem.appendChild(checkbox);
      mailItem.appendChild(message);
      mailItem.appendChild(action);

    card.appendChild(mailItem);
      card.appendChild(collapseContent);
    return card;
  },
  displayMessageList: function (data) {
    let messageListContainer = document.querySelector("#accordion");
    let count=1;
    for (let item of data) {
      let messageList = this.displayList(item,count);

      messageListContainer.appendChild(messageList);
      count++
    }
    return messageListContainer;
  },
};

function loadData(list) {
  splitter.messageList.displayMessageList(list.data)
}

loadData(list);
