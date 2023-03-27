$(window).on("load",()=>{


  let dropArea = document.getElementById('upload_dropZone2');

  ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false)
  })
  
  function preventDefaults (e) {
    e.preventDefault()
    e.stopPropagation()
  }

  ;['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false)
  })
  
  ;['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false)
  })
  
  function highlight(e) {
    dropArea.classList.add('highlight')
  }
  
  function unhighlight(e) {
    dropArea.classList.remove('highlight')
  }

  dropArea.addEventListener('drop', handleDrop, false)

  function handleDrop(e) {
    let dt = e.dataTransfer
    let files = dt.files

    handleFiles(files)
  }
  const isImageFile = file => 
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);

  function handleFiles(_files) {
    // files = [...files]

    let files = [..._files];

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
        showToast({
            type:"error",
            autoDismiss: true,
            message:"Cette type "+item.type+" unacceptable"
        });
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) {
      return;
    }
    // dataRefs.files = files;

    initializeProgress(files.length) 
    files.forEach(uploadFile)
    files.forEach(previewFile)
  }
  let filesDone = 0
  let filesToDo = 0
  let progressBar = document.getElementById('progress-bar2')
  let selectBrowser = document.getElementById('upload_image_background2')
  let uploadProgress = []

  function initializeProgress(numFiles) {
    progressBar.value = 0
    uploadProgress = []
  
    for(let i = numFiles; i > 0; i--) {
      uploadProgress.push(0)
    }
  }
  
  function updateProgress(fileNumber, percent) {
    uploadProgress[fileNumber] = percent
    let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
    progressBar.value = total
  }
  
  // function progressDone() {
  //   filesDone++
  //   progressBar.value = filesDone / filesToDo * 100
  // }
  $('#upload_image_background2').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    console.log(input.files);
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
      //   var reader = new FileReader();

      //   reader.onload = function (e) {
      //      $('#img').attr('src', e.target.result);
      //   }
      //  reader.readAsDataURL(input.files[0]);
        handleFiles(input.files);
    }
    else
    {
      // $('#img').attr('src', '/assets/no_preview.png');
    }
  });
  
  
  progressBar.style.display = "none";

  function uploadFile(file ,i) {
    var url = '/inc/upload.inc.php'
    var xhr = new XMLHttpRequest()
    var formData = new FormData()
    xhr.open('POST', url, true)
    $("#upload_image_file2")[0].value = "";
    $("#upload_dropZone2").removeClass("filled");
    
    // Add following event listener
    progressBar.style.display = "";
    xhr.upload.addEventListener("progress", function(e) {
      updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
    })

    xhr.addEventListener('readystatechange', function(e) {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Done. Inform the user
        // progressDone();
        console.log('URL: ', url, '  name: ', xhr.response);
        $("#upload_image_file2")[0].value = JSON.parse(xhr.response).url;
      }
      else if (xhr.readyState == 4 && xhr.status != 200) {
        // Error. Inform the user
        console.log('  name: ', xhr.response);
      }
      progressBar.style.display = "none";
      // document.write(xhr.response);
    })

    formData.append('file', file)
    xhr.send(formData)
  }

  function previewFile(file) {
    let reader = new FileReader()
    reader.readAsDataURL(file)
    reader.onloadend = function() {
      // $("#upload_image_background")[0].value = reader.result
      // console.log(reader.result);
      dropArea.style.backgroundImage = "url('"+reader.result+"')";
      $("#upload_dropZone2").addClass("filled");
      // let img = document.createElement('img')
      // img.src = reader.result
      // document.getElementById('gallery').appendChild(img)
    }
  }
  
  
});
  

  

/* Bootstrap 5 JS included */




// Drag and drop - single or multiple image files
// https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/
// https://codepen.io/joezimjs/pen/yPWQbd?editors=1000
/* (function () {

  'use strict';
  
  // Four objects of interest: drop zones, input elements, gallery elements, and the files.
  // dataRefs = {files: [image files], input: element ref, gallery: element ref}
  



  const preventDefaults = event => {
    event.preventDefault();
    event.stopPropagation();
  };

  const highlight = event =>
    event.target.classList.add('highlight');
  
  const unhighlight = event =>
    event.target.classList.remove('highlight');

  const getInputAndGalleryRefs = element => {
    const zone = element.closest('.upload_dropZone') || false;
    const gallery = zone.querySelector('.upload_gallery') || false;
    const input = zone.querySelector('input[type="file"]') || false;
    return {zone:zone,input: input, gallery: gallery};
  }

  const handleDrop = event => {
    const dataRefs = getInputAndGalleryRefs(event.target);
    dataRefs.files = event.dataTransfer.files;
    handleFiles(dataRefs);
  }


  const eventHandlers = zone => {

    const dataRefs = getInputAndGalleryRefs(zone);
    if (!dataRefs.input) return;

    // Prevent default drag behaviors
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, preventDefaults, false);
      document.body.addEventListener(event, preventDefaults, false);
    });

    // Highlighting drop area when item is dragged over it
    ;['dragenter', 'dragover'].forEach(event => {
      zone.addEventListener(event, highlight, false);
    });
    ;['dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, unhighlight, false);
    });

    // Handle dropped files
    zone.addEventListener('drop', handleDrop, false);

    // Handle browse selected files
    dataRefs.input.addEventListener('change', event => {
      dataRefs.files = event.target.files;
      handleFiles(dataRefs);
    }, false);

  }
  function readfiles(input,files) {
    for (var i = 0; i < files.length; i++) {
      // document.getElementById('fileDragName').value = files[i].name
      // document.getElementById('fileDragSize').value = files[i].size
      // document.getElementById('fileDragType').value = files[i].type
      let reader = new FileReader();
      reader.readAsDataURL(files[i]);
      reader.onloadend = function() {
        input.value = reader.result;
        // dataRefs.zone.style.backgroundImage = "url('"+reader.result+"')";
        // let img = document.createElement('img');
        // img.className = 'upload_img mt-2';
        // img.setAttribute('alt', file.name);
        // img.src = reader.result;
        // dataRefs.gallery.appendChild(img);
      }
      // reader.readAsDataURL(files[i]);
    }
  }


  // Initialise ALL dropzones
  const dropZones = document.querySelectorAll('.upload_dropZone');
  for (const zone of dropZones) {
    eventHandlers(zone);
  }


  // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
  // Double checks the input "accept" attribute
  const isImageFile = file => 
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);


  function previewFiles(dataRefs) {
    if (!dataRefs.gallery) return;
    // console.log(dataRefs.files);
    // dataRefs.input.files = dataRefs.files;
    for (const file of dataRefs.files) {
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = function() {
        read($("#upload_image_background")[0],reader);
        dataRefs.zone.style.backgroundImage = "url('"+reader.result+"')";
        // let img = document.createElement('img');
        // img.className = 'upload_img mt-2';
        // img.setAttribute('alt', file.name);
        // img.src = reader.result;
        // dataRefs.gallery.appendChild(img);
      }
    }
    
  }
  async function read(input,reader){
    input.value = await reader.result; 
  }

  // Based on: https://flaviocopes.com/how-to-upload-files-fetch/
  const imageUpload = dataRefs => {

    // Multiple source routes, so double check validity
    if (!dataRefs.files || !dataRefs.input) return;

    const url = dataRefs.input.getAttribute('data-post-url');
    if (!url) return;

    const name = dataRefs.input.getAttribute('data-post-name');
    if (!name) return;

    const formData = new FormData();
    formData.append(name, dataRefs.files);

    fetch(url, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log('posted: ', data);
      if (data.success === true) {
        previewFiles(dataRefs);
      } else {
        console.log('URL: ', url, '  name: ', name)
      }
    })
    .catch(error => {
      console.error('errored: ', error);
    });
  }


  // Handle both selected and dropped files
  const handleFiles = dataRefs => {

    let files = [...dataRefs.files];

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
        showToast({
            type:"error",
            autoDismiss: true,
            message:"Cette type "+item.type+" unacceptable"
        });
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) {
      return;
    }
    dataRefs.files = files;

    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

})(); */