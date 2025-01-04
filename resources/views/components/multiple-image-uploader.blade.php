@props(['images'])

@php
    $imagesArray = json_decode($images, true); 
@endphp

<style>
  .img-container {
    position: relative;
    display: inline-block;
    margin: 5px;
  }

  .img-container img {
    width: 100px; /* Adjust the size as needed */
  }

  .img-container .btn-danger {
    position: absolute;
    top: 5px;
    right: 5px;
  }
</style>

<div id="image-uploader" data-default-photos='@json($imagesArray)'>
  <label for="image-input" class='btn main-btn-color text-light mb-2'>{{__('messages.uploadImage')}}</label>
  <input type="file" class="d-none" multiple id="image-input" accept="image/*">
  <div class="w-100 mb-3" id="image-container"></div>
</div>
<input type="hidden" id="hidden-existing-images" name="existing_images" value='@json($imagesArray)' />
<input type="hidden" id="hidden-new-images" name="new_images" value='[]' />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const imageUploader = document.getElementById('image-uploader');
  const imageInput = document.getElementById('image-input');
  const imageContainer = document.getElementById('image-container');
  const hiddenExistingImages = document.getElementById('hidden-existing-images');
  const hiddenNewImages = document.getElementById('hidden-new-images');

  let existingImages = JSON.parse(hiddenExistingImages.value);
  let newImages = JSON.parse(hiddenNewImages.value);

  console.log('Initial existing images:', existingImages);
  console.log('Initial new images:', newImages);

  // Display existing images
  if (existingImages && existingImages.length > 0) {
    existingImages.forEach(photo => {
      console.log('Displaying existing image:', photo);
      createImageElement("{{ asset('storage') }}/" + photo, photo, true);
    });
  }

  // Handle file input change
  imageInput.addEventListener('change', function() {
    const files = Array.from(this.files);
    files.forEach(file => {
      if (file && file.type.startsWith('image/')) {
        let reader = new FileReader();
        reader.onload = function(event) {
          console.log('File read:', event.target.result);
          newImages.push(event.target.result);
          createImageElement(event.target.result, event.target.result, false);
          updateHiddenFields();
        };
        reader.readAsDataURL(file);
      } else {
        alert("Only image files are allowed");
      }
    });
  });

  // Create image element
  function createImageElement(src, photo, isExisting) {
    const imgContainer = document.createElement('div');
    imgContainer.classList.add('img-container', 'mb-2');

    const img = document.createElement('img');
    img.classList.add('w-100');
    img.src = src;

    const removeBtn = document.createElement('button');
    removeBtn.classList.add('btn', 'btn-danger', 'btn-sm');
    removeBtn.innerText = '{{__("messages.delete")}}';
    removeBtn.dataset.photo = photo;

    removeBtn.addEventListener('click', function() {
      console.log('Removing photo:', photo);
      if (isExisting) {
        existingImages = existingImages.filter(img => img !== photo);
      } else {
        newImages = newImages.filter(img => img !== photo);
      }
      imgContainer.remove();
      updateHiddenFields();
    });

    imgContainer.appendChild(img);
    imgContainer.appendChild(removeBtn);
    imageContainer.appendChild(imgContainer);

    console.log('Image element created:', imgContainer);
  }

  // Update hidden input fields
  function updateHiddenFields() {
    hiddenExistingImages.value = JSON.stringify(existingImages);
    hiddenNewImages.value = JSON.stringify(newImages);
    console.log('Updated existing images:', existingImages);
    console.log('Updated new images:', newImages);
  }
});
</script>
