var sendHttpRequest = (method, url, data = null) => {
    return fetch(url, {
    method: method,
    body: data ? JSON.stringify(data) : null,

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
sendHttpRequest(
    "POST",
    'http://aims-admin.pondit.com/api/procurement-reports/dte-wise'
    )
    .then((responseData) => {
      
      console.log(responseData);
      inputContainer=document.getElementById("inputContainer");
      textContainer=document.getElementsByClassName("textContainer")[0];
      textContainer.classList.add("card")
      var data=responseData;
      // console.log(y);
      data.forEach((each,key)=>{
  // var arr=[];
  // arr.push(Object.values(each)[0]);

  var objValue=Object.values(each)[0];
 
  var description=objValue.map(item=>item.title);

  description=description.join(" <br><br>")  
  for(let objKey in each){
  
    if(objKey != "total"){
      
        
      lines=objKey.split(" ");
      console.log(lines);     
    //creating timeline inputs and tooltip elements      
    inputElement=document.createElement("div");
    inputElement.classList.add("input");
    inputElement.setAttribute("data-toggle","tooltip");
    inputElement.setAttribute("data-placement","right");
    inputElement.setAttribute("title",lines[0]);
    
    // if (inputContainer.childNodes.length<5) {
    //     inputContainer.style.justifyContent='center'            
    // }else{
    //     inputContainer.style.margin='0 auto'
    //   inputContainer.style.justifyContent='flex-start'
    // }

    
    inputElement.addEventListener("click",function () {
        inputClicked(description);
             
    });

    
    inputContainer.appendChild(inputElement)
    
    
    
    spanElement=document.createElement("span");
    spanElement.setAttribute("data-info",objKey);
    spanElement.setAttribute("data-ts",objKey);    

    inputElement.appendChild(spanElement);
  }

    if (objKey == "total") {  
    spanElement.setAttribute("data-ts",each[objKey]);
    inputElement.appendChild(spanElement);
    }
    
  }
  
  

})

function inputClicked(text) {
    console.log(textContainer.childNodes.length);
    console.log(textContainer.children.length);
    

    textElement=document.createElement("p");
    textElement.innerHTML=text;
        
    if(textContainer.childNodes.length===1) {
        textContainer.appendChild(textElement);    
    
    } else if(textContainer.childNodes.length===2) {
        textElement.innerHTML="";
        textContainer.removeChild(textContainer.childNodes[1]);
        textElement.innerHTML=text;
        textContainer.appendChild(textElement);
    }
    
  
}
var inputs=document.getElementsByClassName("input");
    for (const input in inputs) {
      inputs[input].onclick=function () {
        for (let i = 0; i < inputs.length; i++) {
          const btn = inputs[i];
          btn.classList.remove("bg")
        }
        this.classList.add("bg")  
      }    
    }

//tooltip init
$('[data-toggle="tooltip"]').tooltip();    
  
    })
    .catch((err) => {
      console.log(err, err.data);
    });

    
