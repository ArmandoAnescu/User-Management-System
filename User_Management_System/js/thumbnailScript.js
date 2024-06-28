function previewFile() {
    const preview = document.querySelector("img");
    const file = document.querySelector("input[type=file]").files[0];
    const reader = new FileReader();
  
    reader.addEventListener(
      "load",
      () => {
        // convert image file to base64 string
        preview.src = reader.result;
      },
      false,
    );
  
    if (file) {
      reader.readAsDataURL(file);
    }
  }
/*

https://developer.mozilla.org/en-US/docs/Web/API/FileReader/readAsDataURL
*/  