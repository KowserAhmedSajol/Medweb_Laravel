const dialogConfig = {
  title: "Dialog Title",
  body: {
    type: "panel",
    items: [
      {
        type: "htmlpanel",
        html: "Panel content goes here.",
      },
      {
        type: "input", // component type
        name: "inputA", // identifier
        inputMode: "text",
        label: "Input Label", // text for the label
        placeholder: "example", // placeholder text for the input
        disabled: false, // disabled state
        maximized: false, // grow width to take as much space as possible
      },
    ],
  },
  buttons: [
    {
      type: "submit",
      text: "submit",
      primary: true,
    },
  ],
  onSubmit: function (api) {
    var data = api.getData();
    tinymce.activeEditor.execCommand("mceInsertContent", false, data.inputA);
    api.close();
  },
};
tinymce.init({
  selector: "#text",
  height: 300,
  menubar: "file edit format help",
  plugins:
    "fullpage paste lists link image autolink autosave code preview emoticons imagetools table wordcount searchreplace media mediaembed",
  toolbar:
    "undo redo |fontselect| bold italic underline | alignleft aligncenter alignright alignjustify | pastetext | bullist numlist outdent indent | link image media | forecolor backcolor emotions | searchreplace code preview | CustomToolbarButton",
  paste_word_valid_elements:
    "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
  paste_retain_style_properties: "all",
  font_formats:
    " Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
  fullpage_default_font_family: "Arial",
  images_upload_url: "/",
  images_upload_handler: function (blobinfo, success, failure) {
    // console.log(blobinfo);
    // success(url);
  },
  relative_urls: false,
  // automatics_uploads: false,
  setup: function (editor) {
    editor.ui.registry.addButton("CustomToolbarButton", {
      text: "Custom Button",
      tooltip: "Custom btn tooltip",
      onAction: function () {
        tinymce.activeEditor.windowManager.open(dialogConfig);
      },
    });
  },

  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
  images_upload_url: 'postAcceptor.php',
  here we add custom filepicker only to Image dialog
*/
  file_picker_types: "file image media",
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement("input");
    input.setAttribute("type", "file");
    input.setAttribute("accept", "image/*");

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        /*
        Note: Now we need to register the blob in TinyMCEs image blob
        registry. In the next release this part hopefully won't be
        necessary, as we are looking to handle it internally.
      */
        var id = "blobid" + new Date().getTime();
        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(",")[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});
