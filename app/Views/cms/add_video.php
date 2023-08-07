<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
  .img-thumbs {
  background: #eee;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  margin: 1.5rem 0;
  padding: 0.75rem;
}
.img-thumbs-hidden {
  display: none;
}

.wrapper-thumb {
  position: relative;
  display:inline-block;
  margin: 1rem 0;
  justify-content: space-around;
}

.img-preview-thumb {
  background: #fff;
  border: 1px solid none;
  border-radius: 0.25rem;
  box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
  margin-right: 1rem;
  padding: 0.25rem;
}


@media screen and (min-width: 769px) and (max-width: 1600px) {
  
  .img-preview-thumb {
  max-width: 140px;
  }
}

@media screen and (max-width: 769px) {
  
  .img-preview-thumb {
  max-width: 250px;
  }
}



.remove-btn{
  position:absolute;
  display:flex;
  justify-content:center;
  align-items:center;
  font-size:.7rem;
  top:-5px;
  right:10px;
  width:20px;
  height:20px;
  background:white;
  border-radius:10px;
  font-weight:bold;
  cursor:pointer;
}

.remove-btn:hover{
  box-shadow: 0px 0px 3px grey;
  transition:all .3s ease-in-out;
}


div {
  line-height: 200px;
}

img {
  max-width: 200px;
  max-height: 200px;
  padding: 5px;
  vertical-align: middle;
  text-align: center;
}

@supports (object-fit: cover) {
  img {
    width: 200px;
    height: 200px;
    object-fit: cover;
  }
}


</style>




<form action="<?= base_url(); ?>save_video/<?=$id;?>" method="post" enctype="multipart/form-data">
<?php echo  csrf_field(); ?>

<div class="container my-5">
  
  <div class="row">
    <div class="col">
      <form action="" method="post" enctype="multipart/form-data" id="form-upload">
        <div class="form-group mt-5">
        <h4 class="text-center my-5">Upload multiple Video </h4>
          <input type="file" class="form-control fileuploader" name="videos[]" multiple id="upload-img" type="file" accept="video/*"/>
              <?php if (session()->has('error')) : ?>
                  <div class="alert alert-danger mt-2">
                      <ul>
                          <?php foreach (session('error') as $error) : ?>
                              <li><?= $error ?></li>
                          <?php endforeach ?>
                      </ul>
                  </div>
              <?php endif ?>
        </div>
        <div class="img-thumbs img-thumbs-hidden " id="img-preview"></div>
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary col-lg-2 col-12">Upload</button>
        </div>
        
      </form>
     </div>
   </div>
    
</div>

</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
  var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, true);

function previewImgs(event) {
  totalFiles = imgUpload.files.length;
  
     if(!!totalFiles) {
    imgPreview.classList.remove('img-thumbs-hidden');
  }
  
  for(var i = 0; i < totalFiles; i++) {
    wrapper = document.createElement('div');
    wrapper.classList.add('wrapper-thumb');
    removeBtn = document.createElement("span");
    nodeRemove= document.createTextNode('x');
    removeBtn.classList.add('remove-btn');
    removeBtn.appendChild(nodeRemove);
    video = document.createElement('video');
    video.classList.add('controls');
    video.src = URL.createObjectURL(event.target.files[i]);
    video.classList.add('img-preview-thumb');
    wrapper.appendChild(video);
    wrapper.appendChild(removeBtn);
    imgPreview.appendChild(wrapper);
   
    $('.remove-btn').click(function(){
      $(this).parent('.wrapper-thumb').remove();
    });    

  }
  
  
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<?php $this->endSection(); ?>