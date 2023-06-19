var initButton = document.getElementById("addBtn"),
  inputArea = document.getElementById("inputAria"),
  inputNode = document.getElementById("text"),
  cardContainer = document.getElementById("cardContainer"),
  counter = 1;

const Pondit = {};
Pondit.Baf = {};
Pondit.Baf.editableNode = {
  init: function () {
    inputArea.classList.remove("hidden");
    initButton.classList.add("d-none");
    var createButton = document.createElement("button");
    createButton.classList.add("btn", "bg-success", "ml-auto");
    createButton.innerHTML = "Save";
    createButton.setAttribute("onclick", "saveNode(this)");

    inputArea.appendChild(createButton);
    initButton.classList.add("d-none");
  },
  create: function (text) {
    createCardItem(text);
  },
  store: [],
  update: function (text, id) {
    const updateStore = Pondit.Baf.editableNode.store?.map((item) => {
      if (item.id === id) {
        item.childNodes[0].innerHTML = text;
        return item;
      }
    });
  },
  delete: function (removeId) {
    const filteredStore = this.store.filter((item) => item.id !== removeId);
    const removeItem = this.store.filter((item) => item.id === removeId)?.[0];
    cardContainer.removeChild(removeItem);

    this.store = filteredStore;
  },
};

initButton.onclick = Pondit.Baf.editableNode.init;
// save
function saveNode(saveBtn) {
  var tinyContent = tinyMCE.activeEditor.getContent();

  if (tinyContent.length === 0) {
    alert("There is no input");
    return false;
  }
  // const perseContent = parser(tinyContent);

  var parent = saveBtn.parentElement;
  parent.removeChild(saveBtn);

  inputArea.classList.add("hidden");
  initButton.classList.remove("d-none");

  //   initButton.classList.remove("hidden");
  Pondit.Baf.editableNode.create(tinyContent);
  tinyMCE.activeEditor.setContent("");
}

function createCardItem(content) {
  var cardItem = document.createElement("div"),
    deleteItemButton = document.createElement("i"),
    editButton = document.createElement("i"),
    spanElement = document.createElement("span"),
    contentArea = document.createElement("div");

  contentArea.setAttribute("id", "editable-content");
  deleteItemButton.classList.add(
    "fa",
    "fa-trash",
    "btn",
    "btn-sm",
    "btn-danger"
  );
  spanElement.classList.add("flex", "justify-content-end");
  editButton.classList.add("fas", "fa-edit", "btn", "btn-sm", "btn-primary");
  deleteItemButton.setAttribute("onclick", "deleteItem(this)");
  editButton.setAttribute("ondblclick", "editItem(this)");
  cardItem.classList.add("card", "card-body", "editable-content-parent");
  cardItem.setAttribute("id", counter++);

  spanElement.appendChild(editButton);
  spanElement.appendChild(deleteItemButton);

  contentArea.innerHTML = content;
  cardItem.appendChild(contentArea);
  cardItem.appendChild(spanElement);

  Pondit.Baf.editableNode.store.push(cardItem);
  Pondit.Baf.editableNode.store.map((item, i) =>
    cardContainer.appendChild(item)
  );
}

function deleteItem(deleteBtn) {
  var parentId = deleteBtn.parentElement.parentElement.id;

  Pondit.Baf.editableNode.delete(parentId);
}
function editItem(editBtn) {
  var parentElement = editBtn.parentElement.parentElement;
  initButton.classList.add("d-none");
  // editBtn.classList.add("hidden");
  inputArea.classList.remove("hidden");
  parentElement.classList.add("hidden");

  var updateButton = document.createElement("button");
  updateButton.classList.add("btn", "btn-info", "ml-auto");

  updateButton.innerHTML = "Update";
  updateButton.setAttribute("id", "updateBtn");
  initButton.classList.add("hidden");
  updateButton.addEventListener("click", function (event) {
    update(editBtn, parentElement);
    event.preventDefault();
  });
  inputArea.appendChild(updateButton);

  tinyMCE.activeEditor.setContent(parentElement.firstChild.innerHTML);
}

// update button action

function update(editBtn, parentElement) {
  var tinyContent = tinyMCE.activeEditor.getContent();

  if (tinyContent.length === 0) {
    alert("There is no input");
    return false;
  }
  parentElement.classList.remove("hidden");
  initButton.classList.remove("d-none");
  inputArea.removeChild(document.getElementById("updateBtn"));
  inputArea.classList.add("hidden");

  initButton.classList.remove("hidden");

  Pondit.Baf.editableNode.update(tinyContent, parentElement.id);
  tinyMCE.activeEditor.setContent("");
}
